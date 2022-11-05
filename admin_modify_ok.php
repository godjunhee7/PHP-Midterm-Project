<!DOCTYPE html>
<?php
include "lib.php";
session_start();
if (!isset($_SESSION['admin_login'])) {
        header("Location: admin_login.php");
    }
if (!isset($_SESSION['login'])) {
	    $msg="error";
        header("Location: login.php?MSG=$msg");
    }

$conn = mysqli_connect('localhost', 'root', '', 'users_db');

  if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$email2 = $_SESSION['email'];
	$id = $_SESSION['id'];

    $sql = "UPDATE users SET pass='$pass', email='$email' WHERE id='$id' AND email='$email2' ";
   	if (mysqli_query($conn, $sql)) {
	header("Location: admin_users.php");
	} else {
	echo "Error updating record: " . mysqli_error($conn);
	header("Location: admin_login.php");
	}
}

?>
<html>
<head>
	<title></title>
</head>
<body>


</body>
</html>
