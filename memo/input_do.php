<?php
require('dbconnect.php');

//filter_input で危険な文字列の侵入を防ぐ。
$memo = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);

//prepare でSQLを組み立てておき、入力内容を保存する準備をする。
$stmt = $db->prepare('insert into memos(memo) values(?)');
if(!$stmt):
  die($db->error);
endif;
// bind_param でvalues(?)の部分に割り当てる。第一引数の's'は型(string)を示す。
$stmt->bind_param('s', $memo);
// SQLの実行
$ret = $stmt->execute();

if($ret):
  echo '登録されました';
  echo '<br>→ <a href="index.php">トップへ戻る</a>';
else:
  $db->error;
endif;
?>