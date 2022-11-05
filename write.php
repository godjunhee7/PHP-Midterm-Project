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
</style>
 <div align="center">  
  <form action="writePost.php" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="idx" value="<?=$idx?>">
	<table width="800px" border="1" cellpadding="5">
	   <tr>
	      <th> 이름 </th>
	      <td> <input type="text" name="name" value="<?=$data['name']?>"> </td>
	   </tr>
	   <tr>
	      <th> 제목 </th>
	      <td><input type="text" name="subject" style="width:100%; " value="<?=$data['subject']?>"></td>
	   </tr>
	   <tr>
	      <th> 본문 내용 </th>
	      <td>
	      	 <textarea name="memo" style="width:100%; height:300px;"><?=$data['memo']?></textarea>
	      </td>
	   </tr>
	   <tr>
	      <th> 사진(반드시 선택해주세요) </th>
	        <td> <?php  echo "<img src='data:image/jpeg;base64," . base64_encode($data['image']) . "' width=250 height=200 />" ; ?>
	        <input type="file" name="image"></td>
	   </tr>
       <tr>
	   <th> 비밀번호 </th>
	      <td><input type="password" name="pwd" placeholder="비밀번호" size="20"></td>
	   </tr>

	    <tr>
	       <td colspan="2">
	       	  <div style="text-align:center; ">
                  <a href="content.php">홈으로</a>
	              <input type="submit" value="저장">   
	       	  </div>
	       </td>
	    </tr>
	</table>
  </form>
 </div> 
