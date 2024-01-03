<?php

class Dbh
{
    protected function connect()
    {
        try {
            $hostname = "???";
            $username = "????";
            $password = "????";
            $port = 0000;
            $dbname = "?????";

            $dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname", $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

}




