<?php 
  $today = new DateTime();
  $today->settimezone(new DateTimeZone('Asia/Tokyo'));
  echo '現在は、'. $today->format('G時 i分 s秒'). 'です';
 ?>