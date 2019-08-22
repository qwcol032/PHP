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
        <table>
        <thead>
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        </tr>
        </thead>

        <tbody>
          <?php
                          $connect = mysqli_connect('localhost', 'root', '@dlfjs3837', 'study_db') or die ("connect fail");
                          $query ="select * from board order by number desc";
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
                <td width = "500" align = "center">
                <a href = "view.php?number=<?php echo $rows['number']?>">
                <?php echo $rows['title']?></td>
                <td width = "10" align = "center"><?php echo $rows['writer']?></td>

                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
        <div class = text>
        <font style="cursor: hand"onClick="location.href='./write.php'">글쓰기</font>
        </div>

      </div>
    </div>
  </body>
</html>
