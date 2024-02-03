<?php 
session_start();

// 画面の上に重なるようにページを出現させることを拒否する
header('X-FRAME-OPTIONS:DENY');

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
</head>
<body>
  <?php
  if(!isset($_SESSION['csrToken'])) {
    $csrToken = bin2hex(random_bytes(32));
    $_SESSION['csrToken'] = $csrToken;
  }
  $token = $_SESSION['csrToken'];
  ?>
  <form method="POST" action="confirm.php">
    名前
    <input type="text" name="user_name" value="<?php if(!empty($_POST['user_name'])){echo h($_POST['user_name']);} ?>">
    <br>
    性別
    <input type="radio" name="gender" value="男">男
    <input type="radio" name="gender" value="女">女
    <br>
    年齢
    <select name="age">
      <option value="">---</option>
      <option value="10代">10代</option>
      <option value="20代">20代</option>
      <option value="30代">30代</option>
    </select>
    <br>
    メールアドレス
    <input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>">
    <br>
    <input type="submit" name="confirm-submit" value="確認する">
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">
  </form>
</body>
</html>