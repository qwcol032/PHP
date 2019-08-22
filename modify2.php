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
?>

      <!doctype html>
      <html>
        <head>
          <title>Gom's web page</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="style.css">
          <style>
          #article table{
                  border-top: 1px solid #444444;
                  border-collapse: collapse;
          }
          #article tr{
                  border-bottom: 1px solid #444444;
                  padding: 10px;
          }
          #article td{
                  border-bottom: 1px solid #efefef;
                  padding: 10px;
          }
          #article table .even{
                  background: #efefef;
          }
          #article .text{

                  padding-top:20px;
                  color:#000000
          }
          #article .text:hover{
                  text-decoration: underline;
          }
          #article a:hover { text-decoration : underline;}
          </style>
        </head>

        <!--상단바-->
        <body>
          <h1><a href="index.php" style="color:#674040;">곰돌이의 웹 페이지</a></h1>
          <table style="border-collapse: collapse; width:100%; background:#9e8b8b;">
            <tr style="display:grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
              <th><a href="index.php">Account</a></th>
              <th ><a href="board.php">Board</a></th>
              <th style="background:#734a4a;"><a href="admin.php">For admin</a></th>
              <th><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></th>
              <th><a href="https://opentutorials.org/" target="_blank">Opentutorials</a></th>
            </tr>
          </table>

          <!--옆면-->
          <div id="grid">
            <ul style="background:#9e8b8b;">
              <li><a href="admin.php">Main</a></li>
              <li><a href="A_table.php">Account Table</a></li>
              <li><a href="B_table.php">Borad Table</a></li>

            </ul>

            <!-- 내용 -->
            <div id="article">
              <?php    $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("connect fail");
                            $idx=$_GET['idx'];
                            $query = "select id, pw from user where idx=$idx";
                            $result = $connect->query($query);
                            $rows = mysqli_fetch_assoc($result);

                            session_start();


                            $URL = "./login.php";
                            $URL2 = "./view.php?number=$number";

                            ?>

                    <form action = "modify_action2.php" method="post">
                    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                            <tr>
                            <td height=20 align= center bgcolor=#9e8b8b><font color=white> 계정 수정</font></td>
                            </tr>
                            <tr>
                            <td bgcolor=white>
                            <table class = "table2">
                            <tr>
                                    <td>ID</td>
                                    <td><input type="text" name='id' value="<?php echo $rows['id']?>"></td>
                                    </tr>

                                    <tr>
                                    <td>PW</td>
                                    <td><input type = paasword name = 'pw' size=60 value="<?php echo $rows['pw']?>"></td>
                                    </tr>
                                    <input type="hidden" name="idx" value="<?php echo $idx ?>">
                            </table>
                              <center>
                                <input type = "submit" value="작성">
                                <input type="button" value="취소" onClick="location.href='./A_table.php'">
                              </center>
                            </td>
                            </tr>
                    </table>

          </div>
        </body>
      </html>
