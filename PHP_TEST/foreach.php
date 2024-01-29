<?php
$members = ['tanaka', 'yamada', 'suzuki'];

foreach($members as $member) {
  echo $member;
}

echo '<br>';

$array4 = ['name' => 'tanaka', 'height' => 160, 'type' => 'A' ];

foreach($array4 as $key=>$value) {
  echo $key.'は'.$value.'です';
}

echo '<br>';

$array5 = [
  'tanaka' => [
    'height' => 160,
    'type' => 'A' 
  ],
  'yamada'=> [
    'height' => 170,
    'type' => 'B' 
  ]
  ];

  foreach($array5 as $member) {
    foreach($member as $detail) {
      echo $detail;
    }
  };

?>