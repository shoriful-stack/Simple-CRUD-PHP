<?php 
include("function.php");
$objCrudAdmin = new MyCrud();

if(isset($_POST['btn'])){
    $return_msg = $objCrudAdmin->add_data($_POST);
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
        <?php if(isset($del_msg)){echo $del_msg;} ?>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <?php if(isset($return_msg)){echo $return_msg;} ?>
            <input class="form-control mb-2" type="text" name="emp_name" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="number" name="emp_Id" placeholder="Enter Your ID">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-4" type="file" name="emp_img">
            <input class="form-control bg-warning" type="submit" name="btn" value="Add Information">
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($emp= mysqli_fetch_assoc($employee)){ ?>
                    <tr>
                        <td><?php echo $emp['Id']; ?></td>
                        <td><?php echo $emp['emp_name']; ?></td>
                        <td><?php echo $emp['emp_Id']; ?></td>
                        <td><img style="height: 50px; width: 50px" src="upload/<?php echo $emp['emp_img']; ?>" alt=""></td>
                        <td>
                            <a class="btn btn-success" href="edit.php?status=edit&&Id=<?php echo $emp['Id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="?status=delete&&Id=<?php echo $emp['Id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
            </tbody>
        </table>
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