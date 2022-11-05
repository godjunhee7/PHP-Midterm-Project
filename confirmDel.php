<?php
   include "lib.php";
   session_start();
if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }

   $idx = $_GET['idx'];
   $idx = mysqli_real_escape_string($connect, $idx);

?>
<style type="text/css">
  body{
  	background-color: lightgray;
  }
</style>

  <form action="del.php" method="post">
  	<input type="hidden" name="idx" value="<?=$idx?>">
	<table width="800px" border="1" cellpadding="5">

       <tr>
	      <th colspan="2"> <?=$idx?>번 게시물을 정말 삭제할까요? </th>
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