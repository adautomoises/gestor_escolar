<?php
    $connect = mysqli_connect("localhost", "root", "", "escola");

    if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
    } else {
    // echo "Conectado ao MySQL <br> ";
    }

    $filename = "http://camerascomputex.ddns.net:8080/escola/mobile_login.php?matricula=2011004&senha=99999999&token=X&so=ios";
    $data = file_get_contents($filename);
    $array = json_decode($data, true);


    // #IDENTIFICAR SE A KEY DO ARRAY PAI É UMA ARRAY;
    // foreach($array as $key => $value){
    //     #RETORNA EXATAMENTE O QUE O ECHO DIZ.
    //     if(is_array($value)){
    //         echo "CHAVE É UM ARRAY = ".$key."<br>";
    //     }else{
    //         echo "CHAVE NÃO É UM ARRAY = ".$key."<br>";
    //     }
    // }


    // #PERCORRER TODAS AS KEY's DO ARRAY PAI;
    // foreach($array as $key => $value){
    //     #RETORNA TODOS OS NOMES-CHAVES DO ARRAY PAI;
    //     echo "NOME DA CHAVE = ".$key."<br>";
    // }

    // #PERCORRER OS KEY's QUE SÃO ARRAYS;
    // foreach($array['NOME DA CHAVE'] as $key => $value){
    //     #RETORNA O ARRAY FILHO COM CHAVE E VALOR (OK!);
    //     echo $key." = ".$value."<br>";
    // }


    // echo '<pre>';
    // print_r($array);
    // echo '</pre>';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Computex</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>