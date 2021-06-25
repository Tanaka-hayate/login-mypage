<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("Location:mypage.php");
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ログインページ</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <header>
        <img src="4eachblog_logo.jpg">
        <a href="login.php">ログイン</a>
    </header>
    <div class="form">
      <p>メールアドレス</p>
      <form method="post" action="mypage.php">
        <input type="text" name="mail" size="55" value="<?php
        if(isset($_COOKIE['check'])){
         echo $_COOKIE['mail'];}?>"><br>
        <p>パスワード</p>
        <input type="password" name="password" size="55" value="<?php
          if(isset($_COOKIE['check'])){
            echo $_COOKIE['password'];}?>"><br>
        <label><input type="checkbox" name="check" class="check" <?php
        if(isset($_COOKIE['check'])){
          echo "checked='checked'";}?>>ログイン状態を維持する</label><br>
        <input type="submit" value="ログイン"class="submit">      
      </form>

    </div>      
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>

  </body>

</html>

