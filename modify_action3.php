<?php
session_start();

$URL = 'index.php';
if($_SESSION['id']!='admin'){
  ?>
  <script>
    alert("<?php echo "Your not admin"?>");
    location.replace("<?php echo $URL?>");
  </script> <?php
}



$id=$_SESSION['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$number = $_POST['number'];
$writer = $_POST['writer'];
$URL2 = 'B_table.php';

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = $uploaddir.basename($_FILES['b_file']['name']);
$folder = "./upload/".$filename;
move_uploaded_file($tmpfile, $folder);

$connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");
$query = "UPDATE board SET title = '$title', content = '$content', writer='$writer', file='$o_name' WHERE number = $number";
if(mysqli_query($connect, $query))
{ ?>
  <script>
    alert("수정 성공");
    location.replace("<?php echo $URL2?>");
  </script> <?php
}
else{ ?>
  <script>
    alert("수정 실패");
    location.replace("<?php echo $URL2?>");
  </script> <?php
}
mysqli_close($connect);
?>
