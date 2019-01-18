<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="bulma.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$city= $_POST['city'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$_SESSION['city'] = $city;
$_SESSION['date'] = $date;
$_SESSION['movie'] = $movie;
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
  <div class="header"><img src="images/logo.png" width="177" height="61" longdesc="main.php" />                               <!-- end .header --></div> 
   <div class="content" style="background-image:url(); height:427px; color: #FFF;">
  <p align="right">
  <?php  $username = $_SESSION['user'];
  $sql = "select * from users_tbl where username='$username' and userlevel='9'"; 
  $result = mysqli_query($con,$sql);
  if($row = mysqli_fetch_array($result))
  {
    echo "[<a href=\"admin.php\">Admin Center</a>]";
  }
  ?> [<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>]</p><p align="left"><?php
$username = $_SESSION['user'];
echo "Welcome $username";
?></p>

<div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Seat Selection</h1></div>
<form name="form1" action="book.php" method="post">
<table class="table">

<tr>
    <td><h1 class="title is-6" style="color: blue">City</h1></td>
    <td><h1 class="title is-6" style="color: black"><input name="city" type="text" id="city" readonly="true" value="<?php $sql="Select * from city where city_id='$city'";$sqlresult=mysqli_query($con,$sql);$row = mysqli_fetch_array($sqlresult);
    $cityname=$row['city_name'];
    echo $cityname;?>" /></h1></td>
  </tr>
  <tr>
    <td><h1 class="title is-6" style="color: blue">Movie</h1></td>
    <td><h1 class="title is-6" style="color: black"><input name="movie" type="text" id="movie" readonly="true" value="<?php $sql="Select * from movie where movie_id='$movie'" ;$sqlresult=mysqli_query($con,$sql);$row = mysqli_fetch_array($sqlresult);$moviename=$row['movie_name'];echo $moviename;?>" /></h1> </td>
  </tr>
  <tr>
    <td><h1 class="title is-6" style="color: blue">Date</h1></td>
    <td><h1 class="title is-6" style="color: black"><input name="date" type="text" id="date" readonly="true" value="<?php $sql="Select * from movie where date='$date' and movie_id='$movie' and city_id='$city'";$sqlresult=mysqli_query($con,$sql);$row = mysqli_fetch_array($sqlresult);$date2=$row['date'];echo $date2;?>" /></h1>
    </td>
  </tr>


  <!--
    <tr>
      <td><h1 class="title is-6" style="color: blue">City</h1>
      </td>
      <td><h1 class="title is-6" style="color: black">Title 6</h1>
      </td>
    </tr>
    <tr>
      <td><h1 class="title is-6" style="color: blue">Title 6</h1>
      </td>
      <td><h1 class="title is-6" style="color: black">Title 6</h1>
      </td>
    </tr>
    <tr>
      <td><h1 class="title is-6" style="color: blue">Title 6</h1>
      </td>
      <td><h1 class="title is-6" style="color: black">Title 6</h1>
      </td>
    </tr>
  -->
  </table>
  <?php
    echo "<br><br>";
    $sql = "Select theatre_id,showtiming from movie where movie_id='$movie' and city_id='$city' and date='$date'";
  $result = mysqli_query($con,$sql);
  echo "<table>";
  echo "<tr>
    <td width=\"100px\">Theatre</td>
    <td width=\"100px\">Show Timing</td>
    <td width=\"100px\">Book Ticket</td></b>
    </tr>";
  while($row = mysqli_fetch_array($result))
  {
      echo "<form name=\"form1\" action=\"book.php\" method=\"post\">";
      $sql2 = "Select theatre_name from theatre where theatre_id=".$row['theatre_id']."";
      $result2 = mysqli_query($con,$sql2);
      $row2 = mysqli_fetch_array($result2);
      $tname = $row2['theatre_name'];
      $stime = $row['showtiming'];
      echo "<tr>
      <td><input name=\"tname\" type=\"text\" id=\"tname\" readonly=\"true\"  value='$tname'/></td>
      <td><input name=\"stime\" type=\"text\" id=\"stime\" readonly=\"true\"  value='$stime'/></td>
      <td align=\"center\"><input name=\"book\" type=\"submit\" value=\"Book\" /></td>
      </tr>";
      echo "</form>";
  }
  echo "</table>";
  ?>
</form><!--
  <div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Seat Selection</h1></div>
  <table class="table">
  <thead>
    <tr>
      <th><abbr title="Thetre">Theatre</abbr></th>
      <th><abbr title="timing">Show Timing</abbr></th>
      <th><abbr title="book">Book Ticket</abbr></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>38</td>
      <td>23</td>
    </tr>
    <tr>
      <td>1</td>
      <td>38</td>
      <td>23</td>
    </tr>
  </tbody>
</table>
  </div>
</table>-->
 </div>
</body>
</html>