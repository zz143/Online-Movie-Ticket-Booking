<?php
session_start();
if(!isset($_SESSION['user'])){
header("location:main.php");
}
echo $_SESSION['user'];
?>
<?php
ob_start();
$host="localhost"; // Host name 
//$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
// Connect to server and select databse.
$con = mysqli_connect("$host", "root", "$password", "test"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bulma.css">
<script type="text/javascript">
function showmovie(str)
{
if (str=="")
  {
  document.getElementById("movie").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("movie").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmovie.php?q="+str,true);
xmlhttp.send();
}


function showdate(str)
{
  

if (str=="")
  {
  document.getElementById("date").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("date").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdate.php?q="+str,true);
xmlhttp.send();
}
</script>
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
	<p align="right">
  <?php  

  $user = $_SESSION['user'];
  $sql= "select * from users_tbl where username='$user' and userlevel='9'"; 
  $result = mysqli_query($con,$sql);
  if($row = mysqli_fetch_array($result))
  {
    echo "[<a href=\"admin.php\">Admin Center</a>]";
  }
  ?> [<a href="logout.php">Logout</a>]</p><p align="left"><?php
$user = $_SESSION['user'];
echo "Welcome $user";
?></p>
<div class="column"></div>
<div class="column"><h1 class="title" style="color: white;">Welcome (:</h1></div>
<div class="box">
  <form name="form1" action="schedule.php" method="post">
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Select City</label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <div class="select">
      <select name ='city' id = 'city' onchange="showmovie(this.value)">
      <option value="">--Select City--</option>
        <?php 
$tbl_name = "city"; // Table name ?>
<?php 

$result= mysqli_query($con, "SELECT * FROM $tbl_name"); ?> 
    <?php while($row = mysqli_fetch_assoc($result)) { ?> 
        <option value="<?php echo $row['city_id'];?>"> 
            <?php echo $row['city_name']; ?> 
        </option> 
    <?php } ?>
        </select>
    </div>
  </div>
    </div>
  </div>
</div>


<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Select Movie</label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <div class="select">
      <select name ='movie' id = 'movie' onchange="showdate(this.value)"></select>
    </div>
  </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Date</label>
  </div>
  <div class="field-body">
    <div class="field">
     <div class="control">
    <div class="select">
       <select name ='date' id = 'date'></select>
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
    <button class="button is-link" type="submit" value="See Shows">See Shows</button>
  </div>
    </div>
  </div>
</div>
</form>
</div>







	
<? /*
$city= $row['city_name'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$city = stripslashes($city);
$movie = stripslashes($movie);
$date = stripslashes($date);
session_register("city");
session_register("movie");
session_register("date");*/
?>
</form>
</tr>
</table> 

  </div>
    </center>
</body>
</html>