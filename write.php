<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: ./login.php');
}?>

<!doctype html>

<html>
  <head>
    <title>Gom's web page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <style>
    table.table2{
              border-collapse: separate;
              border-spacing: 1px;
              text-align: left;
              line-height: 1.5;
              border-top: 1px solid #ccc;
              margin : 20px 10px;
      }
      table.table2 tr {
               width: 50px;
               padding: 10px;
              font-weight: bold;
              /*vertical-align: top;*/
              border-bottom: 1px solid #ccc;
      }
      table.table2 td {
               width: 100px;
               padding: 10px;
               /*vertical-align: top;*/
               border-bottom: 1px solid #ccc;
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
        <form action = "write_action.php" method="post" enctype="multipart/form-data">
          <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
            <tr>
            <td bgcolor=white>
            <table class = "table2">
              <tr>
              <td>제목</td>
              <td><input type = text name = title size=60></td>
              </tr>
              <tr>
              <td>내용</td>
              <td><textarea name = content cols=85 rows=15></textarea></td>
              </tr>
              <tr>
              <td>첨부파일</td>
              <input type="hidden" name="MAX_FILE_SIZE" value="3000000000000000000"/>
              <td><input type="file" name="b_file"></input></td>
              </tr>
            </td>
            </tr>
          </table>
          <center>
          <input type = "submit" value="작성">
          <input type="button" value="취소" onClick="location.href='./board.php'">
          </center>
          </form>
    </div>
  </body>
</html>
