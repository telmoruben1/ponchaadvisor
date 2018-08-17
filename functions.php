<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  <?php

  echo "////////////////////////////////////////////////////Exercicio 2 a)//////////////////////////////////////////////////////////////////////<br>";
  echo "<br>";
  // function ellipsisText_telmo($string,$number)
  // {
  //   $i=0;
  //   $array_strings=[];
  //   while($i<$number){
  //     array_push($array_strings,$string);
  //     $i++;
  //   }
  //   return $array_strings;
  // }
  // $array2=ellipsisText_telmo("telmo",8);
  // foreach ($array2 as $values) {
  //   echo $values . "\n";
  // }

  function ellipsisText($string,$number)
  {
    $array_string=str_split($string);
    $tamanho=count($array_string);
    $array_string_trabalhada=[];
    $i=0;
    if($tamanho<$number){
      while($i<$number){
        if($i<$tamanho){
          array_push($array_string_trabalhada,$array_string[$i]);
        }else{
          array_push($array_string_trabalhada,".");

        }
        $i++;
      }
    }else{
      while($i<$tamanho){
        if($i<$number){

          array_push($array_string_trabalhada,$array_string[$i]);
        }else{
          array_push($array_string_trabalhada,".");

        }
        $i++;
      }
    }

    return $array_string_trabalhada;
  }
  $array_secundario=ellipsisText("telmo ruben",13);
  foreach ($array_secundario as $values) {
    echo $values . "\n";
  }
  echo "<br>";
  echo "<br>";
  echo "////////////////////////////////////////////////////Exercicio 2 b)//////////////////////////////////////////////////////////////////////<br>";
  echo "<br>";
  echo "<br>";
  function getMappingBarsDetails($array)
  {
    $string_return="Nome do bar: ".$array[0]."<br>"."Morada: ".$array[1]."<br>"."CoordenadasGPS: ".$array[2]." , ".$array[3]."<br>"."Classificacao: ".$array[4]."<br>"."Numero de gostos: ".$array[5]."<br>";
    return $string_return;
  }
  echo(getMappingBarsDetails(["Poncha da serra da agua","Serra de Âgua","13.444","36.222","5.5","10000"]));
  echo "<br>";
  echo "<br>";
  echo "//////////////////////////////////////////////////// Exercicio getMainCarrousel() //////////////////////////////////////////////////////////////////////<br>";
  function getMainCarrousel($array)
  {

    $string_return=
   '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
        </li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1">
        </li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2">
        </li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="'.$array[0].'" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="'.$array[1].'" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="'.$array[2].'" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true">
          </span> <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
        </span>
        <span class="sr-only">
          Next
        </span>
      </a>
    </div>';
    return $string_return;
  }
  echo(getMainCarrousel(["./img/poncha-in-Madeira.jpg","./img/poncha-table.jpg","./img/cocktail.png"]));
  echo "<br>";
  echo "<br>";
  echo "///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br>";
  echo "<br>";
  echo "<br>";

  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
