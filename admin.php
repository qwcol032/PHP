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
        <th><a href="index.php">Account</a></th>
        <th><a href="board.php">Board</a></th>
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
        <h2>Only admin can accept</h2></bt>
        <h2>You can control DB</h2>
      </div>
    </div>
  </body>
</html>
