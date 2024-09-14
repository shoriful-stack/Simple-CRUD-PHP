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

    public function delete_data($Id)
    {
        // $catch_img = "SELECT * FROM employee WHERE Id=$Id";
        // $deleted_emp_info = mysqli_query($this->conn, $catch_img);
        // Check if the query returned any result
        // if ($deleted_emp_info && mysqli_num_rows($deleted_emp_info) > 0) {
        //     $fetched_deleted_data = mysqli_fetch_assoc($deleted_emp_info);
        //     $delete_img_data = $fetched_deleted_data['emp_img'];
            
        //     // Check if image path is not empty and file exists
        //     if(!empty($delete_img_data) && file_exists('upload/'.$delete_img_data)){
        //         unlink('upload/' . $delete_img_data);
        //     }

        //     $query = "DELETE FROM employee WHERE Id=$Id";
        //     if (mysqli_query($this->conn, $query)) {
        //         return "Information deleted successfully";
        //     }
        // }

        $catch_img = "SELECT * FROM employee WHERE Id=$Id";
        $query = mysqli_query($this->conn, $catch_img);
        // check if the query returned any result
        if($query && mysqli_num_rows($query) > 0){
            $fetch_deleted_data = mysqli_fetch_assoc($query);
            $deleted_img_data = $fetch_deleted_data['emp_img'];

            // check if image path is not empty and file exists
            if(!empty($deleted_img_data) && file_exists('upload/'.$deleted_img_data)){
                unlink('upload/'.$deleted_img_data);
            }
            $query = "DELETE FROM employee WHERE Id=$Id";
            if(mysqli_query($this->conn, $query)){
                return "Information deleted successfully";
            }
        }
    }
}
?>    