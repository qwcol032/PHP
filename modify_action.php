<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: ./login.php');
}
$id=$_SESSION['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$number = $_POST["number"];

$connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");
$query ="select writer from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$URL = "./board.php";
$URL2 = "./view.php?number=$number";


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
                $tmpfile =  $_FILES['b_file']['tmp_name'];
                $o_name = $_FILES['b_file']['name'];
                $filename = $uploaddir.basename($_FILES['b_file']['name']);
                $folder = "./upload/".$filename;
                move_uploaded_file($tmpfile, $folder);

                $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");
                $query = "UPDATE board SET title = '$title', content = '$content', file='$o_name' WHERE number = $number";
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
