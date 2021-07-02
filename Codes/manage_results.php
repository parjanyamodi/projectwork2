<?php
    include('session.php');

    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
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

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Result</title>
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
                <a href="manage_students.php" class="nav-item nav-link">Manage Student</a>
                <a href="add_results.php" class="nav-item nav-link">Add Result</a>

            </div>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container" style="padding: 100px;">
        <form method="post">
            <h2>Delete Result</h2>
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
                    echo'</select>'
                ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Roll No</label>
                        <input type="number" class="form-control" name="rno" placeholder="Roll No" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        <br><br>
        <form action="" method="post">
            <h2>Update Result</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Class Name</label>
                    <?php
                    include("init.php");

                    $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="class" class="form-control">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Roll No</label>
                    <input type="number" class="form-control" name="rn" placeholder="Roll No" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Paper 1</label>
                    <input type="number" class="form-control" name="p1" id="" placeholder="Paper 1" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Paper 2</label>
                    <input type="number" class="form-control" name="p2" id="" placeholder="Paper 2" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Paper 3</label>
                    <input type="number" class="form-control" name="p3" id="" placeholder="Paper 3" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Paper 4</label>
                    <input type="number" class="form-control" name="p4" id="" placeholder="Paper 4" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Paper 5</label>
                    <input type="number" class="form-control" name="p5" id="" placeholder="Paper 5" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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