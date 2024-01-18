<?php 
function intax($value) {
  return $value * 1.1;
}

$price = 3250;
$price_tax = intax($price);
echo $price_tax
?>