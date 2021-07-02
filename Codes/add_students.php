<?php
    include('session.php');
?>
<?php

if(isset($_POST['student_name'],$_POST['roll_no'])) {
    $name=$_POST['student_name'];
    $rno=$_POST['roll_no'];
    if(!isset($_POST['class_name']))
        $class_name=null;
    else
        $class_name=$_POST['class_name'];

    // validation
    if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
        if(empty($name))
            echo '<p class="error">Please enter name</p>';
        if(empty($class_name))
            echo '<p class="error">Please select your class</p>';
        if(empty($rno))
            echo '<p class="error">Please enter your roll number</p>';
        if(preg_match("/[a-z]/i",$rno))
            echo '<p class="error">Please enter valid roll number</p>';
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                echo '<p class="error">No numbers or symbols allowed in name</p>'; 
              }
        exit();
    }
    
    $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
    $result=mysqli_query($conn,$sql);
    
    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Successful")';
        echo '</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
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
                <a href="add_classes.php" class="nav-item nav-link">Add Class</a>
                <a href="manage_classes.php" class="nav-item nav-link">Manage Class</a>
                <a href="manage_students.php" class="nav-item nav-link">Manage Student</a>
                <a href="add_results.php" class="nav-item nav-link">Add Result</a>
                <a href="manage_results.php" class="nav-item nav-link">Manage Result</a>
            </div>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container" style="padding: 100px;">
        <form method="post">
            <h2>Add Student</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Student Name</label>
                    <input type="text" class="form-control" name="student_name" id="student_name"
                        placeholder="Student Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Roll Number</label>
                    <input type="number" class="form-control" name="roll_no" id="roll_no" placeholder="Roll No"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Class Name</label>
                    <?php
                    include('init.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" class="form-control" >';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
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