<?php
$connect = mysqli_connect("localhost", "root", "", "escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
} else {
  // echo "Conectado ao MySQL <br> ";
}

#UTILIZAR A FUNÇÃO GET PARA RECEBER OS DADOS
$filename = "http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211";
$data = file_get_contents($filename);
$array = json_decode($data, true);

foreach ($array["horario"] as $dia) {
  foreach ($dia["horarios"] as $key => $horario) {
    $select = "SELECT * FROM escola.horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if($row){
      break;
    }
    $insert = "INSERT INTO horarios (dia, escola, codigo_serie, serie, turno, turma, codigo_disciplina, disciplina, inicio, fim, professor) 
    VALUE ('" . $dia["dia"] . "','" . $horario["escola"] . "','" . $horario["codigo_serie"] . "','" . $horario["serie"] . "','" . $horario["turno"] . "','" . $horario["turma"] . "','" . $horario["codigo_disciplina"] . "','" . $horario["disciplina"] . "','" . $horario["inicio"] . "','" . $horario["fim"] . "','" . $horario["professor"]. "');";
    mysqli_query($connect, $insert);
    
  }
}
$grade = [];

foreach ($array["horario"] as $dia) {
  foreach ($dia["horarios"] as $key => $horario) {
    $select = "SELECT disciplina, professor FROM horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if($row){
      array_push($grade, $row);
    }
  }
}

// echo '<pre>';
// print_r($grade);
// echo '</pre>';


// mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="style_horario.css">
  <title>Computex</title>
</head>

<body>
  <!-- NAVBAR: HOME E EXIT -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="./assets/logotipo.png" width="40" height="40" class="d-inline" alt="" />
          Colégio Computex
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BOTÃO DE SAIR  -->
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <div class="navbar-nav ml-auto">
            <a class="nav-link" href="paginaInicial.html">Sair</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div id="container-tabela" class="container">
      <div class="title">
        <h1>Horário</h1>
      </div>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <!-- <th></th> -->
            <th class="semana" scope="col">
              <div class="dias">Segunda-feira</div>
            </th>
            <th class="semana" scope="col">
              <div class="dias">Terça-feira</div>
            </th>
            <th class="semana" scope="col">
              <div class="dias">Quarta-feira</div>
            </th>
            <th class="semana" scope="col">
              <div class="dias">Quinta-feira</div>
            </th>
            <th class="semana" scope="col">
              <div class="dias">Sexta-feira</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php                 
                $select = "SELECT disciplina, professor FROM horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "';";
                $result = mysqli_query($connect, $select);                
                if ($result->num_rows >= 0) {                     
                    while ($row = $result->fetch_array()) {                       
                        echo "<td>".$row['disciplina']."".$row['professor']."</td>";
                    }
                  }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</body>

</html>