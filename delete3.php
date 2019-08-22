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

$number = $_GET["number"];
$URL = "./B_table.php";

$connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");

$query = "DELETE FROM board where number=$number";
if(mysqli_query($connect, $query))
{ ?>
  <script>
    alert("삭제 성공");
    location.replace("<?php echo $URL?>");
  </script> <?php
}
else{ ?>
  <script>
    alert("삭제 실패");
    location.replace("<?php echo $URL?>");
  </script> <?php
}
mysqli_close($connect);
?>
