<?php

function validation($request){

  $errors = [];

  if(empty($request['your_name'])|| 20 < mb_strlen($request['your_name'])){
    $errors[] = '[氏名]は必須です。20文字以内で入力してください。';
  }

  if(empty($request['email'])|| !filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = '[メールアドレス]は必須です。正しい形式で入力してください。';
  }

  if(empty($request['contact'])|| 20 < mb_strlen($request['contact'])){
    $errors[] = '[お問合わせ内容]は必須です。200文字以内で入力してください。';
  }

  if(!empty($request['url'])){
    if(!filter_var($request['url'], FILTER_VALIDATE_URL)){
      $errors[] = '[ホームページ]を正しい形式で入力してください。';
    }
  }

  if(empty($request['caution'])){
    $errors[] = '[注意事項]をご確認ください。';
  }

  if(!isset($request['gender'])){
    $errors[] = '[性別]が選択されていません。';
  }

  if(empty($request['age']) || 6 < $request['age']){
    $errors[] = '[年齢]をご確認ください。';
  }

  return $errors;
}

?>