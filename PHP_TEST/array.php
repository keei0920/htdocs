<?php
$array = [1, 2, 3];

var_dump($array);
echo '<br>';

$array2 = [
    ['a', 'b', 'c'],
    ['d', 'e', 'f']
];

echo $array2[1][2];

$array3 = [
  'name' => 'tanaka',
  'height' => 160,
  'type' => 'A' 
];

echo '<br>';
echo $array3['name'];

echo '<br>';

$array4 = [
  'tanaka' => [
    'height' => 160,
    'type' => 'A' 
  ],
  'yamada'=> [
    'height' => 170,
    'type' => 'B' 
  ]
  ];

var_dump($array4);

echo $array4['tanaka']['height']
?>