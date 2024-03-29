<?php

session_start();

require 'validation.php';

header('X-FRAME-OPTIONS:DENY');

if(!empty($_POST)) {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$pageFlag = 0;
$errors = validation($_POST);

if(!empty($_POST['btn_confirm']) && empty($errors)) {
  $pageFlag = 1;
}

if(!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}

?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>お問合せフォーム</title>
  </head>
<body>
  <?php if($pageFlag === 1): ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
    <form method="POST" action="input.php">
      氏名
      <?php echo h($_POST['your_name']); ?>
      <br>
      メールアドレス
      <?php echo h($_POST['email']); ?>
      <br>
      ホームページ
      <?php echo h($_POST['url']); ?>
      <br>
      年齢
      <?php 
        if($_POST['age'] === '1'){echo '〜19歳';} 
        if($_POST['age'] === '2'){echo '20〜29歳';}
        if($_POST['age'] === '3'){echo '30〜39歳';} 
        if($_POST['age'] === '4'){echo '40〜49歳';} 
        if($_POST['age'] === '5'){echo '50〜59歳';} 
        if($_POST['age'] === '6'){echo '60歳〜';} 
        ?>
      <br>
      性別
      <?php 
        if($_POST['gender'] === '0'){echo '男性';}
        if($_POST['gender'] === '1'){echo '女性';} 
        ?>
      <br>
      お問合せ内容
      <?php echo h($_POST['contact']); ?>
      <br>
      <input type="submit" name="back" value="戻る">
      <input type="submit" name="btn_submit" value="送信する">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
      <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
      <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
      <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
      <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
      <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
    </form>
    <?php endif; ?>
  <?php endif; ?>

  <?php if($pageFlag === 2): ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>

    <?php 
    require '../mainte/insert.php';
    insertContact($_POST);
    ?>

    送信が完了しました
    <?php unset($_SESSION['csrf_Token']); ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if($pageFlag === 0): ?>
    <?php
    if(!isset($_SESSION['csrfToken'])) {
      $csrfToken = bin2hex(random_bytes(32));
      $_SESSION['csrfToken'] = $csrfToken;
    }
    $token = $_SESSION['csrfToken'];
    ?>

    <?php if(!empty($errors) && !empty($_POST['btn_confirm'])):?>
      <?php echo '<ul>' ;?>
      <?php
         foreach($errors as $error) {
          echo '<li>' . $error . '</li>';
      };?>
      <?php echo '</ul>' ;?>
    <?php endif; ?>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <form method="POST" action="input.php">
          <div class="mb-3">
            <label for="your_name" class="form-label">氏名</label>
            <input type="text" id="your_name" name="your_name" class="form-control" value="<?php if(!empty($_POST['your_name'])) {echo h($_POST['your_name']);} ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php if(!empty($_POST['email'])) {echo h($_POST['email']);} ?>">
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">ホームページ</label>
            <input type="url" id="url" name="url" class="form-control" value="<?php if(!empty($_POST['url'])) {echo h($_POST['url']);} ?>">
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="gender" id="gender1" value="0"
            <?php if(isset($_POST['gender']) && $_POST['gender'] === '0') {echo 'checked';} ?>>
            <label class="form-check-label" for="gender1">男性</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="gender" id="gender2" value="1"
            <?php if(isset($_POST['gender']) && $_POST['gender'] === '1') {echo 'checked';} ?>>
            <label class="form-check-label" for="gender2">女性</label>
          </div>
      
          <div class="mb-3">
            <label for="age">年齢</label>
            <select class="form-select" id="age" name="age">
              <option value="">選択してください</option>
              <option value="1" <?php if(isset($_POST['age']) && $_POST['age'] === '1') {echo 'selected';} ?>>〜19歳</option>
              <option value="2">20歳〜29歳</option>
              <option value="3">30歳〜39歳</option>
              <option value="4">40〜49歳</option>
              <option value="5">50〜59歳</option>
              <option value="6">60歳〜</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="contact" class="form-label">お問合せ内容</label>
            <textarea class="form-control" rows="5" id="contact" name="contact"><?php if(!empty($_POST['contact'])) {echo h($_POST['contact']);} ?></textarea>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="caution" id="caution" value="1">
            <label class="form-check-label" for="caution">注意事項にチェックする</label>
          </div>

          <input type="submit" class="btn btn-info" name="btn_confirm" value="確認画面へ">
          <input type="hidden" name="csrf" value="<?php echo $token; ?>">
        </form>
        </div><!-- .col-md-6 -->
      </div><!-- .row -->
    </div><!-- .container -->
      
  <?php endif; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>