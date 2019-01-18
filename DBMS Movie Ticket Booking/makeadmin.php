<?php
session_start();
?>
<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="movie_booking"; // Database name 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "test"); 
	$user = $_POST['user'];
	$sql = "select * from users_tbl where username='$user'";
	$result= mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if(	$num==0)
	{
		echo "No such user exist";
	}
	else
	{
	 $sql = "Update users_tbl set userlevel='9' where username='$user'";
	 $result = mysqli_query($con,$sql);
	 if($result)
	 {
		 echo "Selected user was made admin<br>";
	 }
	}
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>