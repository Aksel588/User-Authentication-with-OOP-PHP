<?php
class LoginContr extends Login
{
    private $uid;
    private $pwd;
    private $email;

    public function __construct($uid, $pwd,$email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->email = $email;
    }




    public  function loginUser()
    {
        if ($this->emptyInput() === false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd,$this->email);
    }

    private function emptyInput()
    {
        $result = "";

        if (empty($this->uid) || empty($this->pwd) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
