

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    function insert_avaliacao($titulo, $avalicao, $classificacao ,$data_registo,$date,$id_bar)
    {
      // echo $user;
      // echo $pass;
      if($_COOKIE['id_utilizador']!=""){
        //logado
        $array_split=explode("-",$id_bar);
        $id_barr=$array_split[1];
        print_r($id_barr);
        try {
          $conn = new PDO("mysql:host=127.0.0.1;dbname=bar", "root", "");
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // $result=$conn->query($sql);
          // $count = $result->rowCount();
          // print_r($result->fetchColumn());

          // echo "Connected successfully";
          $stmt = $conn->prepare("INSERT INTO comentarios (titulo, avaliacao, classificacao ,data_registo,date,id_bar,id_utilizador) VALUES (:titulo, :avaliacao, :classificacao ,:data_registo,:date,:id_bar,:id_utilizador)");
          $stmt->bindParam(':titulo', $titulo);
          $stmt->bindParam(':avaliacao', $avalicao);
          $stmt->bindParam(':classificacao', $classificacao);
          $stmt->bindParam(':data_registo', $data_registo);
          $stmt->bindParam(':date', $date);
          $stmt->bindParam(':id_utilizador', $_COOKIE['id_utilizador']);
          $stmt->bindParam(':id_bar', $id_barr);


          // insert one row

          $result=$stmt->execute();
          if ($result == 1) {
            return true;
          }else{
            //não está logado
            return false;
          }
          // $conn->query($insert3);

          $conn=null;
        }
        catch(PDOException $e)
        {
          echo "Connection failed: " . $e->getMessage();
        }
      }else{

        return false;
      }
    }
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
      if (empty($_POST["bar"])) {
        $barErr = "1";
      } else {
        $bar = $_POST["bar"];
        // print_r($bar);
      }

    }
    $url = 'http://localhost/guiapratico17/index.php';
    // what post fields?
    if(insert_avaliacao($titulo,$avaliacao,$estrelas,$data,"2017-03-04",$bar)==true) {
      $fields = array('erro'=>"0",'tipo'=>"0",'estrelas' => $estrelas, 'titulo' => $titulo,"avaliacao"=>$avaliacao,"data"=>$data);

    }else{
      $fields = array('erro'=>"1",'tipo'=>"0",'estrelas' => $estrelas, 'titulo' => $titulo,"avaliacao"=>$avaliacao,"data"=>$data);

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
