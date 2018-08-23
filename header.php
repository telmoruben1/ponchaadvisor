<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php
  $texteNav="";

  function nav2($use,$pas)
  {

    $texteNav='<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light " style="background-color: rgba(0, 0, 0, 0.5)!important;height:11%;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " style="text-align:center!important;"id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto" style="margin-left: 20%;">
          <img src="./img/logo.png" width="50" height="30"  class="d-inline-block align-top" alt="">
          <li class="nav-item">
            <a class="nav-link text-warning" href="http://localhost/guiapratico17/index.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-warning" href="">AS MELHORES <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="#containerAval1">AVALIAR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="#">MAPA</a>
          </li>
        </ul>
        <span class="navbar-text"style="margin-right: 25%;">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle text-warning" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              LOGIN
            </button>
            <div class="dropdown-menu">
              <form class="px-4 py-3" method="post" action="login.php">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="user" value="'.$use.'">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password" value="'.$pas.'">
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck" name="lembrar" checked>
                  <label class="form-check-label" for="dropdownCheck">
                    Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item dropdown-toggle" data-toggle="dropdown">If you dont have account clike here!</a>
              <div class="dropdown-menu">
                <form class="px-4 py-3" method="post" action="register.php">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="telmo ruben" name="name" >
                </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="email" >
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1">User name</label>
                    <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="user_name" name="user" >
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Phone</label>
                    <input type="text" class="form-control" id="exampleDropdownFormPassword1" placeholder="920000000" name="phone">
                  </div>

                  <button type="submit" class="btn btn-primary">Register</button>
                </form>
              </div>
              <a class="dropdown-item" href="#">Forgot password?</a>
            </div>
          </div>
        </span>
      </div>
    </nav>';
    return $texteNav;

  }
  if($_COOKIE["_CID"]=="1"){
    $passw=$_COOKIE["pass"];
    $userr=$_COOKIE["user"];

   echo nav2($userr,$passw);
  }else{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // print_r ($_COOKIE["_CID"]);
      // print_r($_COOKIE["user"]);
      // print_r($_COOKIE["pass"]);
      if ($_POST) {
        $kv = array();
        $array_noErro=[];
        foreach ($_POST as $key => $value) {
          if($key=="erro"){
            $veErro=stripslashes($value);
          }
          $kv[] = stripslashes($key) . "=" . stripslashes($value);
          $array_noErro[]=stripslashes($value);
        }
        $query_string = join("&", $kv);
        $tipo=$array_noErro[1];
        $var2=$array_noErro[2];
        $conta_valida=$array_noErro[4];
        // echo $var1;
        // echo $var2;
        if($tipo=="1"){
          if($conta_valida=="0"){

            //nao tem erro no formulario
            if($veErro=="0"){
              // echo "deu";
              ?>
              <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light " style="background-color: rgba(0, 0, 0, 0.5)!important;height:11%;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " style="text-align:center!important;"id="navbarNavAltMarkup">
                  <ul class="navbar-nav mr-auto" style="margin-left: 20%;">
                    <img src="./img/logo.png" width="50" height="30"  class="d-inline-block align-top" alt="">
                    <li class="nav-item active">
                      <a class="nav-link text-warning" href="#">AS MELHORES <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-warning" href="#containerAval1">AVALIAR</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-warning" href="#">MAPA</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-warning" style="border-style: solid;" href="#"><?php echo $var2 ?></a>
                    </li>
                  </ul>
                  <span class="navbar-text"style="margin-right: 25%;">
                    <div class="dropdown">
                      <form class="px-4 py-3" method="post" action="logout.php">

                        <button class="btn btn-secondary  text-warning" type="submit" id="dropdownMenu2" aria-haspopup="true" aria-expanded="false">
                          LOGOUT
                        </button>
                      </form>


                    </div>
                  </span>
                </div>
              </nav>
              <?php
            }else{
              echo "entrou nesta merda";
            }
          }else{
            ?>
            <script>
            alert("Conta invalida");
            </script>

            <?php
            echo nav2("","");
          }
        }else if($tipo=="2" && $array_noErro[3]=="1"){
          $userr=$var2;
          $passw=$conta_valida;
          echo nav2($userr,$passw);
        }else{
          echo nav2("","");

        }
      }
    }else{
      echo nav2("","");
    }
  }


?>
</body>
</html>
