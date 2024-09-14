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
    
    public function add_data($data)
    {
        $emp_name = $data['emp_name'];
        $emp_Id = $data['emp_Id'];
        $emp_img = $_FILES['emp_img']['name'];
        $tmp_name = $_FILES['emp_img']['tmp_name'];

        $query = "INSERT into employee(emp_name, emp_Id, emp_img) VALUES('$emp_name', '$emp_Id', '$emp_img' )";
        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_name, "upload/" . $emp_img);
            return "Information added successfully!!";
        }
    }
}
?>    