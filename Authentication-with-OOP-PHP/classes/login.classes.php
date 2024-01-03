<?php

class Login extends Dbh
{

    protected function getUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = :uid OR users_email = :email');
        $stmt->bindParam(':uid', $uid);
        $stmt->bindParam(':email', $email);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            $stmt = null;
            header("location:../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($pwd, $user['users_pwd']);

        if ($checkPwd === false) {
            $stmt = null;
            header("location:../index.php?error=user");
            exit();
        } elseif ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            $_SESSION["useremail"] = $user["users_email"];

            header("location:../index.php?login=success");
            exit();
        }
    }
}
