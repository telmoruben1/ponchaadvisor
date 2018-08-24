<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    function verifica_registo($user,$pass)
    {
      try {

        $conn = new PDO("mysql:host=127.0.0.1;dbname=bar", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM login WHERE email=:email AND password=:pass");

        $stmt->bindParam(':email', $user);
        $stmt->bindParam(':pass', $pass);
        $result=$stmt->execute();
        // $result2=$stmt->fetchAll();
        // $row = array_shift($result2);
        // print_r($row);
        $result_assoc=$stmt->fetchAll();
        $id_do_utilizador="";
        foreach ($result_assoc as $row){
          foreach ($row as $key => $val){
            if($key=="id"){
              $id_do_utilizador=$val;
            }
          }
        }
        // print_r($id_do_utilizador);
        if(!empty($result_assoc)){
          $conn=null;
          setcookie("user",$user);
          setcookie("id_utilizador",$id_do_utilizador);
          return true;
        }else{
          //não está logado
          $conn=null;
          return false;
        }
      }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }
    }

    $userErr = $passwordErr = $lembrarErr = "";
    $user = $password =$lembrar= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["user"])) {
        $userErr = "1";
      } else {

        $user =$_POST["user"];

      }

      if (empty($_POST["password"])) {
        $passwordErr = "1";
      } else {
        $password = $_POST["password"];
      }
      if (empty($_POST["lembrar"])) {
        $lembrarErr = "1";
        setcookie("_CID","0");
      } else {
        $lembrar = $_POST["lembrar"];

        if($lembrar=="on"){
          setcookie("_CID","1");
          setcookie("pass",$password);
          setcookie("user",$user);

        }
      }
    }
    $url = 'http://localhost/guiapratico17/index.php';
    // what post fields?
    if(verifica_registo($user,$password)==true){
          $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>$lembrar,'contaErrada'=>"0");

    }else{
          $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>$lembrar,'contaErrada'=>"1");

    }
    // if($userErr=="1" || $passwordErr=="1"){
    //   $fields = array('erro'=>"1",'tipo'=>"1",'user' => $user,'lembrar'=>$lembrar);
    // }else{
    //   if($user=="adminponchaadvisor@gmail.com" && $password=="admin"){
    //     $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>$lembrar,'contaErrada'=>"0");
    //
    //   }else{
    //     $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>$lembrar,'contaErrada'=>"1");
    //
    //   }
    // }

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
