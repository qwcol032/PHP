<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: ./login.php');
}
$id=$_SESSION['id'];
?>


<?php
              $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("fail");

              $title = $_POST['title'];                  //Title
              $content = $_POST['content'];

              $tmpfile =  $_FILES['b_file']['tmp_name'];
              $o_name = $_FILES['b_file']['name'];
              $filename = $uploaddir.basename($_FILES['b_file']['name']);
              $folder = "./upload/".$filename;

              move_uploaded_file($tmpfile, $folder);


                $URL = './board.php';                   //return URL

                $query = "insert into board (title, content, writer, file)
                        values('$title', '$content', '$id', '$o_name')";


                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
?>
                        <script>
                            alert("<?php echo "오류발생 재시도해주세요."?>");
                            location.replace("<?php echo $URL?>");
                        </script>
<?php
                }
                mysqli_close($connect);
?>
