<?php 
include("function.php");
$objCrudAdmin = new MyCrud();

$employee = $objCrudAdmin->display_data();

if($_GET['status']){
    if($_GET['status']=='edit'){
        $Id = $_GET['Id'];
        $return_data= $objCrudAdmin->display_data_by_Id($Id);
    }
}

if(isset($_POST['u_btn'])){
    $return_msg = $objCrudAdmin->update_data($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>CRUD APP</title>
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">HS Engineering Employees database</a></h2>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <?php if(isset($return_msg)){echo $return_msg;} ?>
            <input class="form-control mb-2" type="text" name="u_emp_name" value="<?php echo $return_data['emp_name']; ?>">
            <input class="form-control mb-2" type="number" name="u_emp_id" value="<?php echo $return_data['emp_Id'];?>">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-4" type="file" name="u_emp_img">
            <input type="hidden" name="emp_id" value="<?php echo $return_data['Id']; ?>">
            <input class="form-control bg-warning" type="submit" name="u_btn" value="Update Information">
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>