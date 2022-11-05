<?php
session_start();
include "lib.php";

if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }
   
$category = $_GET['category'];
$search = $_GET['search'];

if ($category == 'subject') {
	 $keyword = '제목';
} else if ($category == 'name') {
	 $keyword = '글쓴이';
} else {
	$keyword = '내용';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>검색결과창</title>
	<style type="text/css">
       body{
       	background-color: lightgray;
       }
       span{
       	background-color: lightpink;
       }
	</style>
</head>
<body>
<div align="center">
	<h1><span>&lt;<?=$keyword?>&gt;에서 검색한 결과</span></h1>
	<h4>는 다음과 같습니다.</h4><br>

	<table width="800px" border="1">
	   <tr>
	     <th width="50"> No </th>
	     <th> 제목 </th>
	     <th width="100"> 작성자 </th>
	     <th width="90"> 작성일자 </th>
	   </tr>
	<?php
	   $query = "SELECT * FROM board WHERE $category LIKE '%{$search}%' ORDER BY idx DESC ";
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
	<a href="content.php">홈으로</a>
</div>





</body>
</html>