<?php
	$servername = "localhost:3306";
	$username = "root";
	$password = "toor";
	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,'srms');
?>