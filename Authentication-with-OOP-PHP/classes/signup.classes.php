<?php

class Signup extends Dbh
{

    protected function setUser($uid, $pwd, $email)
    {
        $stmt  = $this->connect()->prepare('INSERT INTO users (users_uid,users_email,users_pwd) VALUES (?,?,?)');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashedPwd))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT user_uid FROM users WHERE users_uid = ? OR users_email = ?');
    
        try {
            $stmt->execute(['uid' => $uid, 'email' => $email]);
    
            
            if ($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            
            header("location:../index.php?error=stmtfailed");
            exit();
        }
    }
    
}
