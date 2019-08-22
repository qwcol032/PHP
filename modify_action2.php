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

$idx = $_POST['idx'];
$id = $_POST['id'];
$pw = $_POST['pw'];
$URL = "./A_table.php";


$connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");
$query = "UPDATE user SET id = '$id', pw = '$pw' WHERE idx=$idx";
if(mysqli_query($connect, $query))
{ ?>
  <script>
    alert("수정 성공");
    location.replace("<?php echo $URL?>");
  </script> <?php
}
else{ ?>
  <script>
    alert("수정 실패");
    location.replace("<?php echo $URL?>");
  </script> <?php
}
mysqli_close($connect);
?>
