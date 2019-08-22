<?php
session_start();
$id=$_SESSION['id'];
?>


<!doctype html>
<html>
  <head>
    <title>Gom's web page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <style>
      #article table
      {
        border: 4px solid #ad7575;
      }

      #article td
      {
        border-bottom: 1px solid #ccc;
        text-align: center;
        padding: 10px;
      }

      #article th
      {
        background: #ad7575;
        border: none;
      }
    </style>
  </head>

  <!--상단바-->
  <body>
    <h1><a href="index.php" style="color:#674040;">곰돌이의 웹 페이지</a></h1>
    <table style="border-collapse: collapse; width:100%; background:#9e8b8b;">
      <tr style="display:grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
        <th style="background:#734a4a;"><a href="index.php">Account</a></th>
        <th><a href="board.php">Board</a></th>
        <th><a href="admin.php">For admin</a></th>
        <th><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></th>
        <th><a href="https://opentutorials.org/" target="_blank">Opentutorials</a></th>
      </tr>
    </table>

    <!--옆면-->
    <div id="grid">
      <ul style="background:#9e8b8b;">
         <li><a href="index.php">Main</a></li>
         <li><a href="login.php">Login</a></li>
         <li><a href="logout.php">Logout</a></li>
         <li><a href="signup.php">sign up</a></li>
      </ul>

      <!-- 내용 -->
      <div id="article">
         <h2><?php if(isset($id)) {
            echo "welcome ", $id;
          }
          else {
            echo "Information";
          }?>
            </h2>
        <table>
          <tr>
            <td colspan="4"><img src="메인사진.jpg" width="400" height="400"></td>
          </tr>
          <tr>
            <th colspan="4" style="font-size:30px; text-align:center">박정훈</style></th>
          </tr>
          <tr>
            <th style="width:50px">나이</th> <td style="width:90px">21살</td> <th style="width:50px">생일</th> <td style="width:90px">3월30일</td>
          </tr>
          <tr>
            <th>혈액형</th> <td>O형</td> <th>거주지</th> <td>서울, 노원</td>
          </tr>
          <tr>
            <th style="width:50px">Favor</th> <td colspan="3">곰돌이, 고양이</tr>
          </tr>
        </table>

      </div>
    </div>
  </body>
</html>
