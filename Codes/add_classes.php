<?php
    include('session.php');
?>
<?php 
	include('init.php');
    

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        // validation
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Class | BMSCE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="https://www.bmsce.ac.in" class="navbar-brand">
            <img src="assets/images/logo.png" height="80" alt="BMSCE">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">

                <a href="dashboard.php" class="nav-item nav-link">Dashboard</a>

                <a href="manage_classes.php" class="nav-item nav-link">Manage Class</a>
                <a href="add_students.php" class="nav-item nav-link">Add Student</a>
                <a href="manage_students.php" class="nav-item nav-link">Manage Student</a>
                <a href="add_results.php" class="nav-item nav-link">Add Result</a>
                <a href="manage_results.php" class="nav-item nav-link">Manage Result</a>
            </div>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container" style="padding: 100px;">
        <form method="post">
            <h2>Add Class</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Class Name</label>
                    <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Class Name"
                        required>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Class ID</label>
                    <input type="number" class="form-control" name="class_id" id="class_id" placeholder="Class ID"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="footer">
        <span></span>
    </div>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>