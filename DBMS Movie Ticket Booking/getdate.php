<?php
session_start();
?>
<?php
echo $movieid=$_GET["q"];
echo $cityid = $_SESSION['city'];
$con = mysqli_connect('localhost', 'root', '', 'test');
echo $cityid;
$sql="SELECT * FROM movie WHERE movie_id = '$movieid' and city_id='$cityid' group by date";

$result = mysqli_query($con, $sql);

	 echo "<select name ='date' id ='date'>";
	 echo "<option value=\"\">--Select Date--</option> ";
while($row = mysqli_fetch_array($result))
  {
	  
	 echo "<option value=".$row['date'].">".$row['date']." </option> ";
  }
		echo "</select>";


mysql_close($con);
?>