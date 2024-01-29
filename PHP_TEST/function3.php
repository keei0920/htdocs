<?php
$postalCode = '123-4567';

function checkPostalCode($str) {
  $replaced = str_replace('-', '', $str);
  $length = strlen($replaced);

  if($length === 7) {
    return true;
  }
  return false;
}

var_dump(checkPostalCode($postalCode));

?>