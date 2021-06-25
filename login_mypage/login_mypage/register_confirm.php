<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>登録確認</title>
    <link rel="stylesheet" href="register_confirm.css">
  </head>
  <body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>
    <div class="form">
      <h2>会員登録確認</h2>
      <p class="kakunin">こちら内容で登録しても宜しいでしょうか?</p>
        <p>氏名:<?php echo $_POST['name'];?></p>
        <p>メールアドレス:<?php echo $_POST['mail'];?></p>
        <p>パスワード:<?php echo $_POST['password'];?></p>
        <p>プロフィール写真:<?php echo $_FILES['picture']['name'];?></p>
        <p>コメント:<?php echo $_POST['comments'];?></p>
          <div class="a"><form action="register.php">
              <input type="submit" value="戻って修正する"class="submit1 submit">
            </form>
            <form method="post" action="register_insert.php">
              <input type="submit" value="登録する" class="submit2 submit">
              <input type="hidden" value="<?php echo $_POST['name'];?>"name="name">
              <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
              <input type="hidden" value="<?php echo $_POST['password'];?>"name="password">
              <input type="hidden" value="<?php echo $_FILES['picture']['name'];?>"name="path_filename">
              <input type="hidden" value="<?php echo $_POST['comments'];?>"name="comments">

            </form>
          </div>
    </div>      
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>

  </body>

</html>
<?php
  $temp_pic_name=$_FILES['picture']['tmp_name'];
  $original_pic_name=$_FILES['picture']['name'];
  $path_filename='./image/'.$original_pic_name;
  move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
  ?>