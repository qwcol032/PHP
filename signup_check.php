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
        <?php
          $id=$_POST['id'];
          $pw=$_POST['pw'];

          if($id==NULL || $pw==NULL){
            echo "입력되지 않은 값이 있습니다.";
          }
          else{
            $mysqli=mysqli_connect("localhost","root","@dlfjs3837","study_db");

            $check="SELECT * FROM user WHERE id='$id'";
            $result=$mysqli->query($check);
            if($result->num_rows==1){
              echo "중복된 ID입니다.";
            }
            else{
                $signup=mysqli_query($mysqli,"INSERT INTO user(id,pw) VALUES ('$id','$pw')");
                if($signup){
                  echo "회원가입이 성공적으로 이루어 젔습니다.";
                }
            }
          }
         ?>
         <br /><input type="button" value="뒤로가기" onClick="location.href='./login.php'">
      </div>
    </div>
  </body>
</html>
