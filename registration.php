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
   $email = $_POST['email'];

   if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
       echo "<script> alert('모든 양식을 채워주세요!')</script>";
   } else {
       $query = "SELECT * FROM users WHERE name='$username' OR email='$email' ";
       $result = mysqli_query($conn,$query);
       if (mysqli_num_rows($result) > 0) {
           header("Location: registration.php?MSG=Username:$username or E-mail:$email is already exist, please use another one!");
            } else {
                $query = "INSERT INTO users (name, pass, email) VALUES ('$username','$password','$email')";
                if (mysqli_query($conn,$query)) {
                    $_SESSION['login']=$username;
                    header("Location: content.php");
                }
            }
        }
        }
   if (isset($_POST['backsubmit'])) {
           header("Location: login.php");
        }     

mysqli_close($conn);

?>
<html>
<head>
   <title> 회원가입 신청서 </title>
   <style type="text/css">
     body{
       background-color: lightpink;
     }
     table{
      background-color: lightgray;
     }
     .box1{
      background-color: lightyellow;
     }
     .box2{
      background-color: lightblue;
     }
     .box3{
      background-color: lightgreen;
     }
   </style>
</head>
<body style="text-align:center; ">
<?php
if(isset($_GET['MSG'])) {
    echo $_GET['MSG'];
}
?>
   <form method="post" action="registration.php">
   <table border="2" align="center" width="800px" height="400px">
       <tr>
           <th colspan="2" align="center" class="box1"> 회원가입 양식 </th>
        </tr>
            <td width="100" class="box2"> 아이디 설정</td>
            <td> 입력: <input type="text" name="username" > </td>
       </tr>
       <tr>
            <td width="100" class="box2"> 비밀번호 설정</td>
            <td> 입력: <input type="password" name="password" > </td>
       </tr>
       <tr>
            <td width="100" class="box2"> 이메일 설정 </td>
            <td> 입력: <input type="text" name="email" > </td>
       </tr>
       <tr>
            <td colspan="2" class="box3"> <input type="submit" name="backsubmit" value="뒤로가기">
                 <input type="submit" name="submit" value="회원등록" > </td>
       </tr>
       
           
       
   </table>
   <form>
</body>
</html>
