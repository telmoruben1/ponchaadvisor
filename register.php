<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    function insert_registo($user,$password,$name,$phone,$email)
    {
      // echo $user;
      // echo $pass;

      // $insert3= "INSERT INTO formulario (name, email, website,comment,gender) VALUES ('$name2', '$email2', '$website2', '$comment2', '$gender2')";
      $sql ="INSERT INTO login (name, email, password,phone,user) VALUES ('$name', '$email', '$password', '$phone', '$user')";
      // echo $sql;
      try {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=bar", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $result=$conn->query($sql);
        // $count = $result->rowCount();
        // print_r($result->fetchColumn());

        // echo "Connected successfully";
        $stmt = $conn->prepare("INSERT INTO login (name, email, password,phone,user) VALUES (:name, :email,:pass, :phone,:user)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $password);
        $stmt->bindParam(':phone', $phone);

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
    }

    $userErr = $passwordErr =$nameErr = $phoneErr =$emailErr= "";
    $user = $password =$name = $phone =$email="";

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

      if (empty($_POST["name"])) {
        $nameErr = "1";
      } else {

        $name =$_POST["name"];

      }
      if (empty($_POST["email"])) {
        $emailErr = "1";
      } else {

        $email =$_POST["email"];

      }
      if (empty($_POST["phone"])) {
        $phoneErr = "1";
      } else {

        $phone =$_POST["phone"];

      }
    }
    $url = 'http://localhost/guiapratico17/index.php';
    // what post fields?
    if(insert_registo($user,$password,$name,$phone,$email)==true){
          $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>"",'contaErrada'=>"0");

    }else{
          $fields = array('erro'=>"0",'tipo'=>"1",'user' => $user,'lembrar'=>"",'contaErrada'=>"1");

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
