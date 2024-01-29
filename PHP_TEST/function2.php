<?php
echo strlen('あいうえお');

echo mb_strlen('あいうえお');

//文字列の置換

$str = '私はサッカーよりバスケは好き';


echo str_replace('バスケ', '野球', $str);

//文字列を分割し、配列にして返す

$str = '私は、何も、知りません';

var_dump(explode('、', $str));


foreach(explode('、', $str) as $part) {
  echo '<br>';
  echo $part;
  echo '<br>';
}

?>