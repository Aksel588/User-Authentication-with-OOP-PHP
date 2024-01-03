<?php

if (isset($_POST["submit"])) {


    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];


        // var_dump($pwd);
        // exit;
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($uid, $pwd,$email);

    $login->loginUser();


    header("location: ../index.php?error=none");
}
