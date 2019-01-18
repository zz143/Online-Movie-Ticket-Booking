<?php
ob_start();
$host="localhost"; // Host name 
$password=""; // Mysql password 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
$conn = mysqli_connect("$host", "root", "$password", "test"); 
// Define $myusername and $mypassword 
$user=$_POST['user']; 
$mypassword=$_POST['mypassword'];
$mypassword2=$_POST['mypassword2'];
$myemail=$_POST['myemail'];

echo $mypassword2;
$sql="SELECT * FROM $tbl_name WHERE username='$user'";

$result=mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($mypassword!="" && $user!="" && $mypassword2!="" && $myemail!="")
{
if($count){echo "User already exist";}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email,userlevel) values ('$user','$mypassword','$myemail',1)";
			mysqli_query($conn,$sql);
			echo "Sing Up Succesfull<br><br>";
			$_SESSION['user'] = '$user';
			$_SESSION['mypassword'] = '$mypassword';
			
			header("location:first.php");
	}
	else
		echo "Passwords don't match";
}
}
else
{
	echo "One or more fields are empty";
}
ob_end_flush();
?>