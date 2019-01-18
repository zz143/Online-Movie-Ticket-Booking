<?php
session_start();
?>
<?php

echo $city= $_GET["q"];
$_SESSION['city'] = $city;
$con = mysqli_connect('localhost', 'root', '', 'test');

$sql="SELECT * FROM movie WHERE city_id = '$city' group by movie_name";

$result = mysqli_query($con, $sql);

	 echo "<select name ='movie' id ='movie' onchange=\"showdate(this.value)\">";
	 echo "<option value=\"\">--Select Movie--</option>";
while($row = mysqli_fetch_array($result))
  {
	 echo "<option value=".$row['movie_id'].">".$row['movie_name']." </option> ";

  }
		echo "</select>";


mysql_close($con);
?>