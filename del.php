<?php
   include "lib.php";
   session_start();
if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }
   
   $idx = $_POST['idx'];
   $pwd = $_POST['pwd'];

   $idx = mysqli_real_escape_string($connect, $idx);
   $pwd = mysqli_real_escape_string($connect, $pwd);

   $query = "SELECT * FROM board WHERE idx='$idx' AND pwd=password('$pwd') ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if (!$data['idx']) {
      echo "
      <script>
      alert('비밀번호가 달라 삭제가 불가능합니다.');
        history.back(1);
        </script>
      ";
      exit;
     } 

   $query = "DELETE FROM board WHERE idx='$idx' ";

   mysqli_query($connect, $query);

?>
<script>
   location.href='content.php';
</script>

