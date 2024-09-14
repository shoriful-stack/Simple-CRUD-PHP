<?php
class MyCrud
{
    private $conn;

    public function __construct()
    {
        $dbHost = "localhost:3307";
        $dbUser = "root";
        $dbPass = "";;
        $dbName = "crud";

        $this->conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
        if (!$this->conn) {
            die("database connection failed");
        }
    }
}
?>    