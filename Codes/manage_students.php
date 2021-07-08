<?php
    include('session.php');
    if(isset($_POST['class_name'],$_POST['student_no'])) {
        $class_name=$_POST['class_name'];
        $student_no=$_POST['student_no'];
        echo $class_name;
        echo $student_no;
        $delete_sql=mysqli_query($conn,"DELETE from `students` where `rno`='$student_no' and `class_name`='$class_name' ");
        
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        } 
    }
    if(isset($_POST['class_name'])) {
        $class_name=$_POST['class_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
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
                <a href="add_students.php" class="nav-item nav-link">Add Student</a>
                <a href="add_results.php" class="nav-item nav-link">Add Result</a>
                <a href="manage_results.php" class="nav-item nav-link">Manage Result</a>
            </div>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container" style="padding: 100px;">
        <h2>Manage Students</h2>
        <?php
            include('init.php');
            $db = mysqli_select_db($conn,'srms');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo '<table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Class Name</th>
                </tr>
            </thead>
            <tbody>';

                
                  while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo '<th scope="row">' . $row[''] . '</th>';
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                  }

                echo "
                </tbody>
                </table>";
            } else {
                echo "0 Students";
            }
        ?>
        <form method="post">
            <h2>Delete Student</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Class Name</label>

                    <?php
                    include('init.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" class="form-control">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>';
                    ?>
                    </div>
                    
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
                </form>
                <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Student Roll Number</label>
                <input type="text" name="class_name" value="<?php echo $class_name; ?>" hidden></input><br>
                <label for="inputEmail4">Selected class is <?php echo $class_name; ?>.</label>
                    <?php
                    
                    
                    $student_result=mysqli_query($conn,"SELECT `rno` FROM `students` WHERE `class_name` = '$class_name' ");
                    echo '<select name="student_no" class="form-control">';
                    echo '<option selected disabled>Select Roll Number</option>';
                    while($row = mysqli_fetch_array($student_result)){
                        $display=$row['rno'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>';
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Delete</button>
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