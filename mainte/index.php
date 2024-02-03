<?php

require 'db_connection.php';

// ユーザー入力なし
//$sql = 'select * from contacts where id = 2';
//$stmt = $pdo->query($sql);
//$result = $stmt->fetchall();

//var_dump($result);

//ユーザー入力あり
$sql = 'select * from contacts where id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', 5, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchall();
var_dump($result);

//トランザクション  まとめて処理を実行する
$pdo->beginTransaction();

try{
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue('id', 2, PDO::PARAM_INT);
  $stmt->execute();

  $pdo->commit();
}catch(PDOException $e) {
  $pdo->rollback();
}