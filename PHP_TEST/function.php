<?php
function fullName($str1, $str2) {
  $fullname = $str1 .' '. $str2;
  return $fullname;
}

$name = fullName('山田', '太郎');
echo $name;

?>