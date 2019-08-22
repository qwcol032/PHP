<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: ./login.php');
}
$id=$_SESSION['id'];
$number = $_GET["number"];
$URL = "./board.php";
$URL2 = "./view.php?number=$number";


$connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");
$query ="select writer from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

if($id!=$rows['writer']){
  ?>
    <script>
      alert("권한이 없습니다.");
      location.replace("<?php echo $URL2?>");
      die();
    </script>
<?php
}
?>


<?php
                $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");

                $query = "DELETE FROM board where number=$number and writer='$id'";
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
                    location.replace("<?php echo $URL2?>");
                  </script> <?php
                }
                mysqli_close($connect);
?>
