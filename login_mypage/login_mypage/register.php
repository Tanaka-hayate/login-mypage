<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登録</title>
    <link rel="stylesheet" href="register.css">
  </head>
  <body>
    <header>
      <img src="4eachblog_logo.jpg">
    </header>
        <div class="form">
      <h2>会員登録</h2>
      <p><span>必須</span> 氏名</p>
      <form method="post" action="register_confirm.php" enctype="multipart/form-data">
        <input type="text" size="40" name="name" required>
        <p><span>必須</span> メールアドレス</p>
        <input type="text" size="40" name="mail" pattern="^[a-z0-9.%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        <p><span>必須</span> パスワード(半角英数字6文字以上））</p>
        <input type="password" size="40" name="password" id="password" pattern="^[a-zA-Z0-9.-]{6,}$" required>
        <p><span>必須</span> パスワード確認</p>
        <input type="password" size="40" name="password"id="confirm" oninput="ConfirmPassword(this)">
        <p>プロフィール写真</p>
        <input type="hidden" name="max_file_size" value="1000000">
        <input type="file" value="ファイルを選択" name="picture">
        <p>コメント</p>
        <textarea rows="7" cols="40" name="comments"></textarea><br>
        <input type="submit" value="登録する" class="submit">
      </form>
    </div>
    <footer>
      © 2018 InterNous.inc. All right reserved
    </footer>
  </body>
</html>

<script>
  function ConfirmPassword(confirm){
    var input1=password.value;
    var input2=confirm.value;
    if(input1!=input2){
      confirm.setCustomValidity("パスワードが一致しません。");
    }else{
      confirm.setCustomValidity("");
    }
  }
  </script>