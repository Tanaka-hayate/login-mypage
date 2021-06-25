<?php
  mb_internal_encoding("utf8");
  session_start();

  try{
    $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
  }catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセス出来ません。<br>しばらくしてから再度ログインをしてください。</p><a href='http://localhost/login_mypage/login_mypage?llogin.php>ログイン画面へ</a>");
  }

  if(empty($_SESSION['id'])){
  $stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");
  $stmt->bindValue(1,$_POST['mail']);
  $stmt->bindValue(2,$_POST['password']);
  $stmt->execute();
  $pdo=NULL;

  while($row=$stmt->fetch()){
    $_SESSION['mail']= $row['mail'];
    $_SESSION['password']= $row['password'];
    $_SESSION['name']=$row['name'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
    $_SESSION['id']=$row['id'];
  }
  
  if(empty($_SESSION['id'])){
    header('Location:login_error.php');
  }
  
  if(isset($_POST['check'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('check',$_POST['check'],time()+60*60*24*7);
  }else{
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('check','',time()-1);
  }
}
$image_path="./image/".$_SESSION['picture'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <title>マイページ</title>
    <link rel="stylesheet" href="mypage.css">
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
          <p>氏名：<?php echo $_SESSION['name'];?></p>
          <p>メール：<?php echo $_SESSION['mail'];?></p>
          <p>パスワード：<?php echo $_SESSION['password'];?></p>
        </div>
        <p class="comments"><?php echo $_SESSION['comments'];?></p>
        <form method="post" action="mypage_hensyu.php">
        <input type="hidden" value="<?php echo rand(1,10);?>" name="rand">
          <input type="submit" class="submit" value="編集する">
        </form>
    </div>
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>

  </body>
</html>
