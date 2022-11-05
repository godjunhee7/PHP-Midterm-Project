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
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$all = mysqli_query($conn, "SELECT * FROM users");
  
?>
<html>
    <head>
      <style type="text/css">
        body {
          background-color: lightblue;
        }
      </style>
    </head>
    <body>
        <h1>안녕하세요 관리자님</h1>
    
        <form action="admin_users.php" method="post">
          <fieldset>
            <legend><b><mark>회원정보</mark></b></legend>
        <table border="2">
           <tr><th>id</th><th>아이디</th><th>비밀번호</th><th>이메일</th><th>&nbsp;&nbsp;삭제하시겠습니까?&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;정보 변경&nbsp;&nbsp;</th></tr>
           <?php
           
           while ($user = mysqli_fetch_array($all)) {        
           	 echo "<tr>";
           	 echo "<td style='text-align:center'>" . $user['id'] . "</td>";
           	 echo "<td style='text-align:center'>" . $user['name'] . "</td>";
           	 echo "<td style='text-align:center'>" . $user['pass'] . "</td>";
           	 echo "<td style='text-align:center'>" . $user['email'] . "</td>";
           	 echo "<td style='text-align:center'><a href='admin_delete.php?id=" . $user['id'] . "'>삭제</a></td>";
             echo "<td style='text-align:center'><a href='admin_modify.php?name=" . $user['name'] . "&email=" . $user['email'] . "&id=" . $user['id'] . "'>변경</a></td>";
           	 echo "</tr>";
           }
          // $_SESSION['name'] = $user['name']; 
           ?>
         </table>
         <a href="admin_logout.php"><b>로그아웃</b></a>
          &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="content.php"><b>돌아가기(Home)</b></a>
       </fieldset>
      </form>
        
    </body>
</html>