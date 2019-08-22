<?php
session_start();

if($_SESSION['id']!='admin'){
  ?>
  <script>
    alert("Your not admin");
    location.replace("index.php");
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
        <table>
        <thead>
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "250" align = "center">ID</td>
        <td width = "250" align = "center">PW</td>
        <td width = "50" align = "center">옵션</td>
        <td width = "50" align = "center"></td>
        </tr>
        </thead>

        <tbody>
          <?php
                          $connect = mysqli_connect('localhost', 'root', '@dlfjs3837', 'study_db') or die ("connect fail");
                          $query ="select * from user order by idx desc";
                          $result = $connect->query($query);
                          $total = mysqli_num_rows($result);
                while($rows = mysqli_fetch_assoc($result)){
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "250" align = "center"><?php echo $rows['id']?></td>
                <td width = "250" align = "center"><?php echo $rows['pw']?></td>
                <td width = "50" align = "center"><a href = "modify2.php?idx=<?php echo $rows['idx']?>">수정</td>
                <td width = "50" align = "center"><a href = "delete2.php?idx=<?php echo $rows['idx']?>">삭제</td>

                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
    </div>
  </body>
</html>
