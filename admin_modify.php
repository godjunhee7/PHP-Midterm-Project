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
if ( isset($_GET['name']) ) {
	$name = $_GET['name'];
	$_SESSION['name'] = $_GET['name'];
  }
if ( isset($_GET['email']) ) {
   $email = $_GET['email'];
   $_SESSION['email'] = $_GET['email'];
  } 
 if ( isset($_GET['id']) ) {
   $id = $_GET['id'];
   $_SESSION['id'] = $_GET['id'];
  } 
  
?>

<html>
<head>
	<title></title>
	<style type="text/css">
    body{
      background-color: lightgray;
    }
	</style>
</head>
<body>
     <form action="admin_modify_ok.php" method="post">
        <fieldset>
           <legend><?php echo $name; ?>님의 개인정보</legend>
             <table border="2" align="center" width="350px" height="400px">
                   <tr>
						<td>아이디(변경불가)</td>
						<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="35" name="name" value="<?php echo $name;?>" disabled></td>
				   </tr>
                   <tr>
						<td>비밀번호(변경가능)</td>
						<td> 입력: <input type="password" size="35" name="pass" placeholder="비밀번호"></td>
				   </tr>
                   <tr>
						<td>이메일(변경가능)</td>
						<td> 입력: <input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $email;?>"></td>
				   </tr>
             </table>
             <input type="submit" name="submit" value="정보변경" />
        </fieldset>
     </form>
</body>
</html>
