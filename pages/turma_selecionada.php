<?php
$connect = mysqli_connect("localhost", "root", "", "escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
} else {
  // echo "Conectado ao MySQL <br> ";
}

$params = array('action'=>'getAlunosTurma','ano'=>'20211', 'escola'=>'1', 'grau_serie'=>'15', 'turno'=>'M','turma'=>'1', 'status'=>'C');

$filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
$data = file_get_contents($filename);
$array = json_decode($data, true);

// echo '<pre>';
// var_dump($array);
// echo '</pre>';
// exit;

foreach ($array as $key => $value) {

  $select = "SELECT * FROM alunos WHERE matricula LIKE '" . $value["matricula"] . "' AND nome LIKE '" . $value["nome"] . "' AND sequencia LIKE '" . $value["sequencia"] . "' AND status LIKE '" . $value["status"] . "';";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    break;
  }

  $insert = "INSERT INTO alunos (matricula, nome, sequencia, status)
        VALUE ('" . $value["matricula"] . "','" . $value["nome"] . "','" . $value["sequencia"] . "','" . $value["status"] . "');";

  mysqli_query($connect, $insert);
}

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