<?php
    include("init.php");
    include('session.php');
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | BMSCE</title>
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
                <a href="add_classes.php" class="nav-item nav-link">Add Class</a>
                <a href="manage_classes.php" class="nav-item nav-link">Manage Class</a>
                <a href="add_students.php" class="nav-item nav-link">Add Student</a>
                <a href="manage_students.php" class="nav-item nav-link">Manage Student</a>
                <a href="add_results.php" class="nav-item nav-link">Add Result</a>
                <a href="manage_results.php" class="nav-item nav-link">Manage Result</a>
            </div>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="row" style="padding: 100px;">
        <div class="col-lg-6">
            <h1 style="padding-bottom: 15px;">Statistical Info</h1>
            <?php
            echo '<div class="alert alert-primary" role="alert">Number of classes: <a href="manage_classes.php" class="alert-link">'.$no_of_classes[0].'</a></div>';
            echo '<div class="alert alert-secondary" role="alert">Number of students: <a href="manage_students.php" class="alert-link">'.$no_of_students[0].'</a></div>';
            echo '<div class="alert alert-success" role="alert">Number of results: <a href="manage_results.php" class="alert-link">'.$no_of_result[0].'</a></div>';
        ?>
        </div>
        <div class="col-lg-6">
            <h1 style="padding-bottom: 15px;">Notification area</h1>
            <div class="alert alert-primary" role="alert">
                Protocol Event <a href="#" class="alert-link">Meet Link</a>.
            </div>
            <div class="alert alert-secondary" role="alert">
                College Convocation <a href="#" class="alert-link">Click Here</a>.
            </div>
            <div class="alert alert-success" role="alert">
                CodeIO Event <a href="#" class="alert-link">Zoom Link</a>.
            </div>
        </div>

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