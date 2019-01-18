<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','test');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bulma.css">
<meta http-equiv="refresh" content="3; URL=first.php">
<body background="1.jpg">
<p>
  <?php
	$username=$_SESSION['user'];
	$seat = $_POST['seat'];
	$sql = "Insert into booked (username,seat) values ('$username','$seat')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
	
     echo "<h1 class='title is-4' style='color:#fff'>";
     
     echo "Ticket Booked";
    	
     echo "</h1>";
    

	}
?>
</p>
</body>
</head>
</html>