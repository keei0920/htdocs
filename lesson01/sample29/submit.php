<?php
$file = $_FILES['picture'];
var_dump($file);
move_uploaded_file($file['tmp_name'], $file['name']);
 ?>