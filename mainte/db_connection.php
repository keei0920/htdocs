<?php
try {
    $dsn = 'mysql:host=localhost;dbname=udemy_php';
    $username = 'php_user';
    $password = '0920reei';

    $pdo = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,

    ]);
    echo '接続完了';

} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage();
}
?>
