<?php
$age = '３';

$age = mb_convert_kana($age, 'n', 'UTF-8');

if (is_numeric($age)) {
  echo $age.'歳です';
} else {
  echo '※ 数字を入れてください。';
}