<?php
session_start();
?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'test');

	$movieid = $_POST['movieid'];
	$moviename = $_POST['moviename'];
	$tid = $_POST['tid'];
	$cid = $_POST['cid'];
	$date = $_POST['date'];
	$st = $_POST['st'];	
	$price = $_POST['price'];
	$status = $_POST['st'];	

	 $sql = "Insert into movie (movie_id,movie_name,theatre_id,city_id,date,showtiming,price,status) values ('$movieid','$moviename','$tid','$cid','$date','$st','$price','$status')";
	 $result = mysqli_query($con,$sql);
	$i=1;
	while($i<13)
	{
	 $sql = "Insert into seats (seat,movie_id,theatre_id,date,time,status) values ('$i','$movieid','$tid','$date','$st','not booked')";
	 $result = mysqli_query($con,$sql);
	$i++;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bulma.css">
</head>


<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>
</html>