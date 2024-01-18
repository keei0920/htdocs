<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>page02</title>
</head>
<body>
  sessionの値: <?php echo $_SESSION['message']; ?>
</body>
</html>