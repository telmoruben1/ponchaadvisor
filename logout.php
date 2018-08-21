<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php

  $url = 'http://localhost/guiapratico17/index.php';
  // unset($_COOKIE["_CID"]);
  $fields = array('erro'=>"0",'tipo'=>"2",'user' => $_COOKIE["user"],'lembrar'=>$_COOKIE["_CID"],'pass'=>$_COOKIE["pass"],'contaErrada'=>"0");

  // open connection
  $ch = curl_init();
  // set the url, number of POST vars, POST data
  curl_setopt($ch, CURLOPT_URL, $url);
  // curl_setopt($ch, CURLOPT_POST, count($fields));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  // execute post
  $result = curl_exec($ch);
  // close connection
  curl_close($ch);
  ?>
</body>
</html>
