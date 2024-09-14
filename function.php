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
    public function display_data()
    {
        $query = "SELECT * FROM employee";
        if (mysqli_query($this->conn, $query)) {
            $return_data = mysqli_query($this->conn, $query);
            return $return_data;
        }
    }

    public function display_data_by_Id($Id)
    {
        $query = "SELECT * FROM employee WHERE Id=$Id";
        if (mysqli_query($this->conn, $query)) {
            $return_data = mysqli_query($this->conn, $query);
            $employeeData = mysqli_fetch_assoc($return_data);
            return $employeeData;
        }
    }

    public function update_data($data)
    {
        $emp_name = $data['u_emp_name'];
        $emp_Id = $data['u_emp_id'];
        $idNo = $data['emp_id'];
        $emp_img = $_FILES['u_emp_img']['name'];
        $tmp_name = $_FILES['u_emp_img']['tmp_name'];

        $query = "UPDATE employee SET emp_name='$emp_name', emp_Id='$emp_Id', emp_img='$emp_img' WHERE Id=$idNo";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_name, "upload/" . $emp_img);
            return "Information updated successfully";
        }
    }
}
?>    