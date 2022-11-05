<?php
include "lib.php";
session_start();
if (!isset($_SESSION['login'])) {
	    $msg="error";
        header("Location: login.php?MSG=$msg");
    }

$name = $_SESSION['login'];
$conn = mysqli_connect('localhost', 'root', '', 'users_db');
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql = "UPDATE users SET pass='$pass', email='$email' WHERE name='$name' ";
if (mysqli_query($conn, $sql)) {
$MSG = "change";
header("Location: content.php?MSG=$MSG");
} else {
echo "Error updating record: " . mysqli_error($conn);
header("Location: mypage.php");
}

mysqli_close($conn);
?>