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

   if(isset($_GET['id'])){
		
			$id = $_GET['id'];
			$conn = mysqli_connect('localhost', 'root', '', 'users_db');
			if( mysqli_query($conn, "DELETE FROM users WHERE id='$id' ") ){			
				header("Location: admin_users.php?ADMIN=$admin");
			} else {
		         header("Location: admin_login.php");		
		    }
		   mysql_close($conn);  
        }

?>