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
  <form method="POST" action="profile.php">
    <?php echo h($_POST['user_name']); ?>
    <br>
    性別
    <?php echo $_POST['gender']; ?>
    <br>
    年齢
    <?php echo $_POST['age']; ?>
    <br>
    メールアドレス
    <?php echo h($_POST['email']); ?>
    <br>
    <input type="hidden" name="user_name" value="<?php echo h($_POST['user_name']); ?>">
    <input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">
    <input type="hidden" name="age" value="<?php echo $_POST['age']; ?>">
    <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
    <input type="submit" name="back-page" value="戻る">
    <input type="submit" name="btn-submit" value="送信する">
  </form>