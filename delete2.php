<?php
session_start();

$URL = 'A_table.php';
if($_SESSION['id']!='admin'){
  ?>
  <script>
    alert("<?php echo "Your not admin"?>");
    location.replace("<?php echo $URL?>");
  </script> <?php
}
?>

<?php
                $idx=$_GET['idx'];
                $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");

                $query = "DELETE FROM user where idx=$idx";
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
