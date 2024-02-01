<?php

$contactFile = '.contact.dat';

$fileContents = file_get_contents($contactFile);

// echo $fileContents;

// file_put_contents($contactFile, 'testです');

$addText = 'テストです'."\n";

file_put_contents($contactFile, $addText, FILE_APPEND);

// echo(password_hash('password123', PASSWORD_BCRYPT));
?>