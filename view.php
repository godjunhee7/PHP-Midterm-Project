<?php
   include "lib.php";
   session_start();
if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }

   $idx = $_GET['idx'];
   $idx = mysqli_real_escape_string($connect, $idx);

   $query = "SELECT * FROM board WHERE idx='$idx' ";
   $result = mysqli_query($connect, $query);
   $data = mysqli_fetch_array($result);
   
?>
<style type="text/css">
   body{
   	background-color: lightgray;
   }
   span{
   	background-color: lightpink;
   }
</style>
<div align="center">
  <form action="writePost.php" method="post">
  	<h2><span>&lt; <?=$data['name']?>님의 게시글 &gt;</span></h2>
	<table width="800px" border="1" cellpadding="5">
	   <tr>
	      <th> 이름 </th>
	      <td> <?=$data['name']?>  </td>
	   </tr>
	   <tr>
	      <th> 제목 </th>
	      <td> <?=$data['subject']?> </td>
	   </tr>
	   <tr>
	      <th> 본문 내용 </th>
	      <td> <?=nl2br($data['memo'])?> </td>
	   </tr>
       <tr>
	      <th> 사진 </th>     
	      <td> <?php  echo "<img src='data:image/jpeg;base64," . base64_encode($data['image']) . "' width=250 height=200 />" ; ?> </td>
	   </tr>
	    <tr>
	       <td colspan="2">
	       	<div style="float:right; ">
	       	   <a href="confirmDel.php?idx=<?=$idx?>">삭제</a>
               <a href="write.php?idx=<?=$idx?>">수정</a>
            </div>
	       	   <a href="content.php">홈으로</a>
	       </td>
	    </tr>
	</table>
  </form>
</div>
  <br>
  <br>
  <br>
 <div align="center">
  <form action="reply.php" method="post">
  	<table width="800px" border="1" cellpadding="5">
  		<tr>
	      <th colspan="2">&lt; 댓글 달기 &gt;</th>		      
		 </tr>
		   <tr>
		      <th> 댓글 내용 </th>
		      <td>
		      	 <textarea name="reply" style="width:100%; height:150px;"></textarea>
		      </td>
		   </tr>
     </table>
     <input type="submit" name="submit" value="등록"> 
  </form>
</div>

  
