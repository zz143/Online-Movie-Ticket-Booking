<?php
session_start();
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "test"); 

// Define $myusername and $mypassword 
$myusername=$_POST['user']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)


echo $mypassword;
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result=mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count){
		$_SESSION['mypassword']=  "$mypassword";
		$_SESSION['user']=  "$myusername";
		header("location:first.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>


