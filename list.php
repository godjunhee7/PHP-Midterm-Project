<?php
include "lib.php";
session_start();
if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }
?>

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
       <td><?=substr($data['regdate'],0,10)?></td>
    </tr>

<?php } ?>
</table>

<a href="write.php">글쓰기</a>