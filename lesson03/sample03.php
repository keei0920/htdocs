<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sample03</title>
</head>
<body>
  <?php
   $db = new mysqli('localhost:8889', 'root', 'root','mydb');
   $ret = $db->query('insert into memos (memo) values("phpからのメモです")');
   if ($ret):
     echo 'データを挿入しました';
   else:
    echo $db->error;
   endif;
  ?>
</body>
</html>