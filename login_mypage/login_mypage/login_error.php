<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("Location:mypage.php");
  }
  setcookie('mail','',time()-1);
  setcookie('password','',time()-1);
  setcookie('check','',time()-1);
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
      <div class="error">
        <p>メールアドレスまたはパスワードが間違っています。</p>
      </div>
      <p>メールアドレス</p>
      <form method="post" action="mypage.php">
        <input type="text" name="mail" size="55"><br>
        <p>パスワード</p>
        <input type="password" name="password" size="55" ><br>
        <label><input type="checkbox" name="check" class="check">>ログイン状態を維持する</label><br>
        <input type="submit" value="ログイン" class="submit">      
      </form>

    </div>      
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>

  </body>

</html>