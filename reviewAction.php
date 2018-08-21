

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    // define variables and set to empty values
    $estrelasErr = $tituloErr = $avaliacaoErr = $dataErr= "";
    $estrelas = $titulo = $gender = $avaliacao = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["estrelas"])) {
        $estrelasErr = "1";
      } else {

        $estrelas =$_POST["estrelas"];

      }

      if (empty($_POST["titulo"])) {
        $tituloErr = "1";
      } else {
        $titulo = $_POST["titulo"];
      }

      if (empty($_POST["avaliacao"])) {
        $avaliacaoErr = "1";
      } else {
        $avaliacao = $_POST["avaliacao"];

      }

      if (empty($_POST["data"])) {
        $dataErr = "1";
      } else {
        $data = $_POST["data"];
      }

    }
    $url = 'http://localhost/guiapratico17/index.php';
    // what post fields?
    if($dataErr=="1" || $avaliacaoErr=="1" || $tituloErr=="1" || $estrelasErr=="1" ){
      $fields = array('erro'=>"1",'tipo'=>"0",'estrelas' => $estrelas, 'titulo' => $titulo,"avaliacao"=>$avaliacao,"data"=>$data);
    }else{
      $fields = array('erro'=>"0",'tipo'=>"0",'estrelas' => $estrelas, 'titulo' => $titulo,"avaliacao"=>$avaliacao,"data"=>$data);
    }

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
  //  header("Location: http://localhost/guiapratico17/index.php");
     ?>


  </body>
</html>
