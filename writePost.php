<?php
   include "lib.php";
   session_start();
if (!isset($_SESSION['login'])) {
      $msg="error";
        header("Location: login.php?MSG=$msg");
    }
   
   $name = $_POST['name'];
   $idx = $_POST['idx'];
   $subject = $_POST['subject'];
   $memo = $_POST['memo'];
   $pwd = $_POST['pwd'];
   $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
   $image_name = addslashes($_FILES['image']['name']);
   $image_size = getimagesize($_FILES['image']['tmp_name']);
   
   $idx = mysqli_real_escape_string($connect, $idx);
   $name = mysqli_real_escape_string($connect, $name);
   $subject = mysqli_real_escape_string($connect, $subject);
   $memo = mysqli_real_escape_string($connect, $memo);
   $pwd = mysqli_real_escape_string($connect, $pwd);

   //암호화
   if ($idx) {  //수정
   
    $query = "SELECT * FROM board WHERE idx='$idx' AND pwd=password('$pwd') ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if (!$data['idx']) {
     	echo "
     	<script>
     	alert('비밀번호가 달라 수정이 불가능합니다.');
        history.back(1);
        </script>
     	";
     	exit;
     } 

   	 $query = "UPDATE board SET name='$name', subject='$subject',
   	 memo='$memo', image='$image_data' WHERE idx='$idx' ";

     mysqli_query($connect, $query);
     }

   else{  //새 글

   $regdate = date("Y-m-d H:i:s");
   $ip = $_SERVER['REMOTE_ADDR'];

   $query = "INSERT INTO board(name,subject,memo,regdate,ip,pwd,image)
             VALUES('$name','$subject','$memo','$regdate','$ip', password('$pwd'), '$image_data' )";

   mysqli_query($connect, $query);
  }
?>
<script>
   location.href='content.php';
</script>

