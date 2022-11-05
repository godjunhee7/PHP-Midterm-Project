<!DOCTYPE html>
<?php
include "lib.php";
session_start();
if (!isset($_SESSION['login'])) {
	    $msg = "error";
        header("Location: login.php?MSG=$msg");
    }
if (isset($_GET['MSG'])) {
     echo "<script>alert('변경이 완료 되었습니다.');</script>";
    }    
?>
<html>
<head>
    <title> 사진 블로그 </title>
    <style type="text/css">
      body{
      	background-color: lightblue;
      }
      span {
        background-color: lightpink;
      }
    </style>
</head>
<body>
<h1> &lt;사진에 진심인 사람들만의 공간&gt; </h1>
<h2> <mark><?=$_SESSION['login']?>님 환영합니다.</mark> </h2>
<hr>
<b> <a href="logout.php" align="right"> 로그아웃 </a> </b>
&nbsp;&nbsp;&nbsp;
<b> <a href="mypage.php" align="right"> 내 정보 변경 </a> </b>
 <div style="float:right">
    <b><a href="admin_login.php" align="right"> 관리자 접근 </a></b>
 </div>
<br>
<br>
<br>
<br>
<br>

<div align="center">
<h3><span>&lt; 사진 공유 및 소통 게시판 &gt;</span></h3>	
<table width="800px" border="1">
   <tr>
     <th width="50"> No </th>
     <th> 제목 </th>
     <th width="100"> 작성자 </th>
     <th width="90"> 작성일자 </th>
   </tr>
<?php
   $query = "SELECT * FROM board ORDER BY idx DESC ";
   $result = mysqli_query($connect, $query);

   while ($data = mysqli_fetch_array($result)) {
?>
    <tr>
       <td><?=$data['idx']?></td>
       <td><a href="view.php?idx=<?=$data['idx']?>"><?=$data['subject']?></a></td>
       <td><?=$data['name']?></td>
       <td><?=substr($data['regdate'],0,16)?></td>
    </tr>
<?php } ?>
</table>

<form action="search_result.php" method="get">

  <table>
    <tr>
      <td>Search
        <select name="category">
            <option value="subject">제목</option>
            <option value="name">글쓴이</option>
            <option value="memo">내용</option>
        </select>
        <input type="text" name="search" size="30" required="required">
        <input type="submit" name="submit" value="검색">
      </td>
    </tr>
  </table>
</form>


  <b><a href="write.php">글쓰기</a></b>
</div>


</body>
</html>
