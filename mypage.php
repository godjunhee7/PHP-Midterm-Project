<!DOCTYPE html>
<?php
include "lib.php";
session_start();
if (!isset($_SESSION['login'])) {
        $msg = "error";	    
        header("Location: login.php?MSG=$msg");
    }  
    $name = $_SESSION['login'];
    $conn = mysqli_connect('localhost', 'root', '', 'users_db');
    $one = "SELECT * FROM users WHERE name='$name' ";
    $all = mysqli_query($conn,$one);
    $user = mysqli_fetch_array($all);
    $email = $user['email'];
?>

<html>
<head>
	<title> 정보 변경 </title>
  <style type="text/css">
     body{
      background-color: lightgray;
     }
  </style>
</head>
<body>
   <form action="mypage_change.php" method="post">
      <h1>&lt;내 정보&gt;</h1>
      <p><a href="content.php">홈으로</a></p>
        <fieldset>
            <legend>마이 페이지</legend>
               <table>
                   <tr>
						<td>아이디(변경불가)</td>
						<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="35" name="name" value="<?=$_SESSION['login']?>" disabled></td>
				   </tr>
                   <tr>
						<td>비밀번호(변경가능)</td>
						<td> 입력: <input type="password" size="35" name="pass" placeholder="비밀번호"></td>
				   </tr>
                   <tr>
						<td>이메일(변경가능)</td>
						<td> 입력: <input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $email; ?>"></td>
				   </tr>
               </table>
               <input type="submit" name="submit" value="정보변경" /> 
        </fieldset>
   </form>
</body>
</html>