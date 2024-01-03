<?php
class SignupContr extends Signup
{
    private $uid;
    private $pwd;
    private $email;

    public function __construct($uid, $pwd, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->email = $email;
    }




    public  function signupUser()
    {
        if ($this->emptyInput() === false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() === false) {
            header("location:../index.php?error=username");
            exit();
        }

        if ($this->invalidEmail() === false) {
            header("location:../index.php?error=email");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function invalidUid()
    {
        $result = "";

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
    
    
    
    
    
    private function invalidEmail()
    {
        $result = "";
        
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
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
