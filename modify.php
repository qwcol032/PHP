
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
              <th style="background:#734a4a;"><a href="board.php">Board</a></th>
              <th><a href="admin.php">For admin</a></th>
              <th><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></th>
              <th><a href="https://opentutorials.org/" target="_blank">Opentutorials</a></th>
            </tr>
          </table>

          <!--옆면-->
          <div id="grid">
            <ul style="background:#9e8b8b;">
               <li><a href="board.php">Board</a></li>

            </ul>

            <!-- 내용 -->
            <div id="article">
              <?php    $connect = mysqli_connect("localhost", "root", "@dlfjs3837", "study_db") or die("connect fail");
                            $id = $_GET['id'];
                            $number = $_GET['number'];
                            $query = "select title, content, writer from board where number=$number";
                            $result = $connect->query($query);
                            $rows = mysqli_fetch_assoc($result);

                            $title = $rows['title'];
                            $content = $rows['content'];
                            $writer = $rows['writer'];

                            session_start();


                            $URL = "./login.php";
                            $URL2 = "./view.php?number=$number";

                            if(!isset($_SESSION['id'])) {
                    ?>              <script>
                                            alert("권한이 없습니다.");
                                            location.replace("<?php echo $URL?>");
                                    </script>
                    <?php   }
                            else if($_SESSION['id']==$writer) {
                    ?>




                    <form action = "modify_action.php" method="post" enctype="multipart/form-data">
                    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                            <tr>
                            <td height=20 align= center bgcolor=#9e8b8b><font color=white> 글수정</font></td>
                            </tr>
                            <tr>
                            <td bgcolor=white>
                            <table class = "table2">
                                    <tr>
                                    <td>작성자</td>
                                    <td><input type="hidden" name="id" value="<?=$_SESSION['id']?>"><?=$_SESSION['id']?></td>
                                    </tr>

                                    <tr>
                                    <td>제목</td>
                                    <td><input type = text name = title size=60 value="<?=$title?>"></td>
                                    </tr>

                                    <tr>
                                    <td>내용</td>
                                    <td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
                                    </tr>
                                    <tr>
                                    <td>첨부파일</td>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000000000000000"/>
                                    <td><input type="file" name="b_file"></input></td>
                                    </tr>

                                    </table>

                                    <center>
                                    <input type="hidden" name="number" value="<?=$number?>">
                                    <input type = "submit" value="작성">
                                    <input type="button" value="취소" onClick="location.href='./board.php'">
                                    </center>
                            </td>
                            </tr>
                    </table>




                    <?php   }
                            else {
                    ?>              <script>
                                            alert("권한이 없습니다.");
                                            location.replace("<?php echo $URL2?>");
                                    </script>
                    <?php   }
                    ?>

          </div>
        </body>
      </html>
