<?php
session_start();
if(!(isset($_SESSION['myusername'])){
header("location:main.php");
}
?>

<html>
<body>
<?php
$username = $_SESSION['myusername'];
echo "Welcome $username";
?>

<a href="logout.php">Logout</a>
</body>
</html>