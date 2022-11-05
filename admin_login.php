<!DOCTYPE html>
<?php
include "lib.php";
session_start();

if (!isset($_SESSION['login'])) {
      $msg = "error";
        header("Location: login.php?MSG=$msg");
    }

$conn = mysqli_connect('localhost', 'root', '', 'users_db');
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
	$adminname = $_POST['name'];
	$adminpass = $_POST['pass'];
	$one = mysqli_query($conn, "SELECT name, pass FROM admin WHERE name='$adminname' AND pass='$adminpass' ");
    
    if(mysqli_num_rows($one) > 0){
       $_SESSION['admin_login'] = $adminname;
       header("Location: admin_users.php");
    } else {
       echo "<script>alert('아이디와 비밀번호를 다시 확인해주세요.');</script>";
    	 header("Location: admin_login.php");
    }
   
    mysqli_close($conn);
}  
?>
<html>
   <head>
<meta name='viewport' content='width=device-width' />
<style type="text/css">
@-ms-viewport{width: device-width;}
@-o-viewport{width: device-width;}
@viewport{width: device-width;}
      body{
        background-color: lightyellow;
      }
      .box1 {
        background-color: lightpink;
      }
      .box2 {
        background-color: lightgreen;
      }
      .box3{
        background-color: lightgray;
      }
      #box4{
        background-color: orange;
      }
</style>
   </head>
   <body style="text-align: center;">
       <form action="admin_login.php" method="post">
           <table border="2" align="center" width="350px" height="400px">
                <tr><th colspan="2" class="box1">관리자 전용 로그인</th></tr>
                <tr><td class="box2">관리자 아이디</td>
                	<td class="box3"><input type="text" name="name" placeholder="ex)Hong"/></td></tr>
            	<tr><td class="box2">관리자 비밀번호</td>
            	    <td class="box3"><input type="password" name="pass" placeholder="ex)Kil Dong"/></td></tr>
            	<tr align="center"><td colspan="2" id="box4"><input type="submit" name="submit" value="관리자 로그인"/></td></tr>    
           </table>             
       </form>
   </body>
</html>
