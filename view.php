<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: ./login.php');
}?>






        <!doctype html>
        <?php
        session_start();
        if(!isset($_SESSION['id'])){
          header('Location: ./login.php');
        }
        $id=$_SESSION['id'];
        ?>

        <html>
          <head>
            <title>Gom's web page</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="style.css">
            <style>
            .view_table {
            border: 1px solid #734a4a;
            margin-top: 30px;
            }
            .view_title {
            height: 30px;
            text-align: center;
            background-color: #734a4a;
            color: white;
            width: 1000px;
            }
            .view_id {
            text-align: center;
            background-color: #734a4a;
            width: 30px;
            }
            .view_id2 {
            background-color: white;
            width: 60px;
            }
            .view_content {
            padding-top: 20px;
            border-top: 1px solid #444444;
            height: 500px;
            }
            .view_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
            }
            .view_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            }
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

                <?php
                                $connect = mysqli_connect('localhost', 'root', '@dlfjs3837', 'study_db');
                                $number = $_GET['number'];
                                session_start();
                                $query = "select title, content, writer, file from board where number =$number";
                                $result = $connect->query($query);
                                $rows = mysqli_fetch_assoc($result);
                        ?>

                        <table class="view_table" align=center>
                        <tr>
                                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
                        </tr>
                        <tr>
                                <td class="view_id">작성자</td>
                                <td class="view_id2"><?php echo $rows['writer']?></td>
                        </tr>

                        <tr>
                                <td class="view_id">첨부 파일</td>
                                <td class="view_id2"><a href="./upload/<?php echo $rows['file'];?>" download><?php echo $rows['file']; ?></a></td>
                        </tr>

                        <tr>
                                <td colspan="4" class="view_content" valign="top">
                                <?php echo $rows['content']?></td>
                        </tr>
                        </table>


                        <div class="view_btn">
                                <button class="view_btn1" onclick="location.href='./board.php'">목록으로</button>
                                <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$number?>'">수정</button>

                                <button class="view_btn1" onclick="location.href='./delete.php?number=<?=$number?>'">삭제</button>
                        </div>

              </div>
            </div>
          </body>
        </html>
