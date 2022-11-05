<!DOCTYPE html>
<?php
include "lib.php";
session_start();

$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'users_db';

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (empty($_POST['username'])) {
       echo "<script> alert('아이디를 확인해주세요!')</script>";
   }
   if (empty($_POST['password'])) {
        echo "<script> alert('비밀번호를 확인해주세요!')</script>";
   }

   $query = "SELECT name, pass FROM users WHERE name='$username' AND pass='$password' ";
   $result = mysqli_query($conn,$query);
   if ( mysqli_num_rows($result) > 0 ) {
       $_SESSION['login']=$username;
       header("Location: content.php");
   } else {
       echo "아이디나 비밀번호를 다시 확인해주세요!";
   }

mysqli_close($conn);

}

if ( isset($_GET['MSG']) ) {
   echo "<script>alert('잘못된 접근입니다.');</script>";
}

?>
<html>
<head>
   <title> Login Page </title>
   <style type="text/css">
     body {
      background-color: lightpink;
     }

      .box1 {
        background-color: lightyellow;
      }
      .box2 {
        background-color: lightblue;
      }
      .box3{
        background-color: lightgray;
      }
      #box4{
        background-color: lightgreen;
      }
   </style>
</head>
<body style="text-align:center; ">
    <h2><mark>&lt;사진에 진심인 사람들의 모임&gt;</mark></h2>
   <form method="post" action="login.php">
   <table border="2" align="center" width="350px" height="400px">
       <tr>
           <th colspan="2" align="center" class="box1"> 회원 로그인 </th>
        </tr>
            <td width="100" class="box2"> 아이디 </td>
            <td class="box3"> 입력: <input type="text" name="username" > </td>
       </tr>
       <tr>
            <td width="100" class="box2"> 비밀번호 </td>
            <td class="box3"> 입력: <input type="password" name="password" > </td>
       </tr>
       <tr>
            <td colspan="2" align="center" id="box4"> <input type="submit" name="submit" value="로그인" > </td>
       </tr>
   </table>
   </form>
    <br>
    <b> 아직 회원가입을 안하셨나요? <a href="registration.php"> 회원가입 </a></b>
</body>
</html>