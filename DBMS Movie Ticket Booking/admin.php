
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="bulma.css">
<?php
session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
// Connect to server and select databse.
 $con = mysqli_connect("$host", "$username", "$password", "test");

$username =$_SESSION['user'];
$sql= "select * from users_tbl where username='$username' and userlevel='9'"; 
$result = mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result))
  {
  }
  else
    header("location:logout.php");
?>
<?

if(!isset($_SESSION['user'])){
header("location:main.php");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <div class="content" style="background-image:url(); height:427px; color: #FFF;">
	<p align="right"><?php  $username = $_SESSION['user'];
  $sql= "select * from users_tbl where username='$username' and userlevel='9'"; 
  $result = mysqli_query($con,$sql);

  if($row = mysqli_fetch_array($result))
  {
    echo "[<a href=\"admin.php\">Admin Center</a>]";
  }
  ?> [<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>] </p><p align="left"> </p><p align="left"><?php
$username = $_SESSION['user'];
echo "Welcome $username";
?></p>
<!--1st column-->
<div class="column"><h1 class="title" style="color: white;">Title</h1></div>
<div class="box">
  <form name="form2" method="post" action="insertmovie.php">
  <div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Movie Id</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="movieid" type="text" placeholder="MOvieID" id = "movieid">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Moviename</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="moviename"  id="moviename"type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Theatre ID</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="tid"  id="tid" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">City Id</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input id="cid" name="cid" class="input" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Date</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input name = "date" id = "date" class="input" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Show Timing</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input class="input" name = "sd" id = "sd" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Price</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input name = "price" id = "price" class="input" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
</div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Status</label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <div class="select">
      <select name ='st' id = 'st'>
      <option value="">Status</option>
                <option> Now Showing
                </option>
                <option> Next CHange
                </option>
                <option> Coming Soon
                </option> 
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
    <button class="button is-link" type="Submit" value="Insert Movie">Insert</button>
  </div>
    </div>
  </div>
</div>
</form>
</div>


<div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Make Admin </h1></div>
<div class="box">
  <form name="form2" method="post" action="makeadmin.php">
  <div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Username</label>
  </div>
  <div class="field-body">
    <div class="field">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="user" id="user" type="text" placeholder="Name">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
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
    <button class="button is-link" type="submit" value="Make Admin">Make Admin</button>
  </div>
    </div>
  </div>
</div>
</form>
</div>

</body>
</html>