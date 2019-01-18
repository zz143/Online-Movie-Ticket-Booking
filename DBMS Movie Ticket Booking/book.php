<?php
session_start();

  $tname = $_POST['tname'];
  $stime = $_POST['stime'];
  $_SESSION['tname'] = $tname;
  $_SESSION['stime'] = $stime;
  $movie = $_SESSION['movie'];
  $date = $_SESSION['date'];
  $city = $_SESSION['city'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="bulma.css">
<?php
//$q=$_GET["q"];
$con = mysqli_connect('localhost', 'root', '', 'test');
?>
<title>Book Ur Show</title>
<style type="text/css">
a:link {
	color:#ffffff;
	text-decoration: underline;
}
a:visited {
	color: #ffffff;
	text-decoration: underline;
}
html, body {height:100%; margin:0; padding:0;}

#page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
#content {position:relative; z-index:1; padding:10px;}
</style>

</head>

<body>
<div id="page-background"><img src="1.jpg" width="100%" height="100%" alt="Smile"></div>
<center>
<div class="container" style="width:800px" id="content">
  <div class="header"><img src="images/logo.png" width="177" height="61" longdesc="main.php" />                              	<!-- end .header --></div>
<center>
  <div class="content" style="background-image:url(); height:427px; color: #FFF;vertical-align:middle">
  <p align="right"><?php  
  $user = $_SESSION['user'];
  $sql= "select * from users_tbl where username='$user' and userlevel='9'"; 
  $result = mysqli_query($con,$sql);
  if($row = mysqli_fetch_array($result))
  {
    echo "[<a href=\"admin.php\">Admin Center</a>]";
  }
  ?> [<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>]</p><p align="left"><?php
$username = $_SESSION['user'];
echo "Welcome $username";
?></p>
  <p>
    <?php

  $sql= "select distinct(movie_name) from movie where movie_id='$movie'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $movie= $row['movie_name'];
  
  $sql12= "select distinct(city_name) from city where city_id='$city'";
  $result = mysqli_query($con,$sql12);
  $row = mysqli_fetch_array($result);
  $city= $row['city_name'];
  
  $sql = "Select theatre_id,showtiming from movie where movie_name='$movie' and date='$date'";
  $result = mysqli_query($con,$sql);

  $sql3 = "select * from city where city_name='$city'";
  $result3= mysqli_query($con,$sql3);
  $row = mysqli_fetch_array($result3);
  $cid= $row['city_id'];
  
  $sql4 = "select * from theatre where theatre_name='$tname'";
  $result4= mysqli_query($con,$sql4);
  $row = mysqli_fetch_array($result4);
  $tid= $row['theatre_id'];
  
  $sql2 = "select * from movie where movie_name='$movie' and theatre_id='$tid' and date='$date' and city_id='$cid' and showtiming='$stime'";
  $result2 = mysqli_query($con,$sql2);
  $row = mysqli_fetch_array($result2);
  $movieid= $row['movie_id'];
  ?>
  </p>
  <form name="form2" method="post" action="booked.php">
  <div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Seat Selection</h1></div>
  <table class="table">

<tr>
    <td><h1 class="title is-6" style="color: blue">City</h1></td>
    <td><input name="city" type="text" id="city" readonly="true" value="<?php echo $city; ?>" /></td>
  </tr>
  <tr>
    <td><h1 class="title is-6" style="color: blue">Movie</h1></td>
    <td><input name="movie" type="text" id="movie" readonly="true"  value="<?php echo $movie; ?>" /> </td>
  </tr>
  <tr>
    <td><h1 class="title is-6" style="color: blue">Theatre</h1></td>
    <td><input name="theatre" type="text" id="theatre" readonly="true" value="<?php echo $tname; ?>" /></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input name="date" type="text" id="date" readonly="true" value="<?php echo $date; ?>" /></td>
  </tr>
  <tr>
    <td><h1 class="title is-6" style="color: blue">Show Time</h1></td>
    <td><input name="stime" type="text" id="stime" readonly="true"  value="<?php echo $stime; ?>" />
    </td>
  </tr>

    
  </table>

<div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Seat Selection</h1></div>
<div class="box">
  <div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Select Seats</label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <div class="select">
      <select name ='seat' id = 'seat'>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
        </select>
    </div>
  </div>
    </div>
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label"></label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <button class="button is-link" type="submit">Book Ticket</button>
  </div>
    </div>
  </div>
</div>
</div>
</form>
</div>
</center>
</center>
</body>
</html>