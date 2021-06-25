<?php
  mb_internal_encoding("utf8");
  $pdo=new PDO("mysql:dbname=lesson01;host=localhost","root","");
  session_start();
  $image_path=$_SESSION['picture'];
  if(empty($_POST['rand'])){
    header("Location:login_error.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <title>マイページ</title>
    <link rel="stylesheet" href="mypage_hensyu.css">
  </head>
  <body>
  <header>
        <img src="4eachblog_logo.jpg">
        <a href="log_out.php">ログアウト</a>
    </header>
    <div class="form">
      <h2>会員情報</h2>
      <p>こんにちは！<?php echo $_SESSION['name'];?> さん</p>
      <img src="<?php echo $image_path; ?>">
      <div class="right">
      <form method="post" action="mypage_update.php"> 
        <p>氏名：<input type="text" value="<?php echo $_SESSION['name'];?>" name="name"></p>
        <p>メール：<input type="text" value="<?php echo $_SESSION['mail'];?>" name="mail"></p>
        <p>パスワード：<input type="text" value="<?php echo $_SESSION['password'];?>" name="password"></p>
        </div>
        <p class="comments"><textarea rows=5 cols=50 name="comments"><?php echo $_SESSION['comments'];?></textarea></p>
          <input type="submit" class="submit" value="この内容に変更する">
      </form>
    </div>
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>

  </body>
</html>
