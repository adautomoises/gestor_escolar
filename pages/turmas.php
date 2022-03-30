<?php
include ('C:\xampp\htdocs\gestor_escolar\assets\scripts\funcoes.php');
include ('C:\xampp\htdocs\gestor_escolar\assets\scripts\utilites.php');

$connect = mysqli_connect("localhost", "root", "", "escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
} else {
  // echo "Conectado ao MySQL <br> ";
}

$filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?action=getTurmas&ano=20211";

$data = file_get_contents($filename);
$array = json_decode($data, true);

// echo '<pre>';
// var_dump($array);
// echo '</pre>';
// exit;

foreach ($array as $key => $value) {

  $select = "SELECT * FROM turmas WHERE grau_serie LIKE '" . $value["grau_serie"] . "' AND turno LIKE '" . $value["turno"] . "' AND turma LIKE '" . $value["turma"] . "' AND grau_longo LIKE '" . $value["grau_longo"] . "' AND serie_longa LIKE '" . $value["serie_longa"] . "';";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    break;
  }

  $insert = "INSERT INTO turmas (codigo_escola, ano, grau_serie, turno, turma, grau_longo, serie_longa)
        VALUE ('" . $value["codigo_escola"] . "','" . $value["ano"] . "','" . $value["grau_serie"] . "','" . $value["turno"] . "','" . $value["turma"] . "','" . $value["grau_longo"] . "','" . $value["serie_longa"] . "');";

  mysqli_query($connect, $insert);
}
$grade_m = [];

foreach ($array as $key => $value) {
  $select = "SELECT grau_serie, turno, turma, grau_longo, serie_longa FROM turmas WHERE grau_serie LIKE '" . $value["grau_serie"] . "'AND turno LIKE 'M' AND turma LIKE '" . $value["turma"] . "'AND grau_longo LIKE '" . $value["grau_longo"] . "'AND serie_longa LIKE '" . $value["serie_longa"] . "';";

  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    array_push($grade_m, $row);
  }
}
$grade_t = [];

foreach ($array as $key => $value) {
  $select = "SELECT grau_serie, turno, turma, grau_longo, serie_longa FROM turmas WHERE grau_serie LIKE '" . $value["grau_serie"] . "'AND turno LIKE 'T' AND turma LIKE '" . $value["turma"] . "'AND grau_longo LIKE '" . $value["grau_longo"] . "'AND serie_longa LIKE '" . $value["serie_longa"] . "';";

  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    array_push($grade_t, $row);
  }
}
$grade_n = [];

foreach ($array as $key => $value) {
  $select = "SELECT grau_serie, turno, turma, grau_longo, serie_longa FROM turmas WHERE grau_serie LIKE '" . $value["grau_serie"] . "'AND turno LIKE 'n' AND turma LIKE '" . $value["turma"] . "'AND grau_longo LIKE '" . $value["grau_longo"] . "'AND serie_longa LIKE '" . $value["serie_longa"] . "';";

  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    array_push($grade_n, $row);
  }
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
  <link rel="stylesheet" href="../assets/styles/style_turmas.php" type="text/css" />

  <title>Computex</title>
</head>

<body>
  <!-- NAVBAR: HOME E EXIT -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/images/logotipo.png" width="40" height="40" class="d-inline" alt="" />
          Colégio Computex
        </a>
        <!-- BOTÃO DE SAIR -->
          <div class="navbar-nav ml-auto">
            <a class="nav-link" href="paginaInicial.html">Sair</a>
          </div>
      </div>
    </nav>
  </header>


  <div class="container" style="margin-top: 80px">
    <div class="title">
      <h1>Turmas</h1>
      <div class="subtitle-tab">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Manhã</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tarde</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Noite</button>
          </li>
        </ul>
      </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
          <tbody class="tabela">
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div>Grau Serie</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td> <div class='turma'>" . $grade_m[$i]['grau_serie'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turma</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td> <div class='turma'>" . $grade_m[$i]['turma'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turno</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td> <div class='turma'>" . $grade_m[$i]['turno'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Grau Longo</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td> <div class='turma'>" . $grade_m[$i]['grau_longo'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Serie Longa</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td> <div class='turma'>" . $grade_m[$i]['serie_longa'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">⠀</div>
              </th>
              <?php
              for ($i = 0; $i < 17; $i++) {
                echo "<td><a href=/gestor_escolar/pages/turma_selecionada.php?".$turma_m[$i]->link." class='btn btn-primary btn-sm'>Acessar</td>";
              }
              ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <table class="table">
          <tbody class="tabela">
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div>Grau Serie</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td> <div class='turma'>" . $grade_t[$i]['grau_serie'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turma</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td> <div class='turma'>" . $grade_t[$i]['turma'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turno</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td> <div class='turma'>" . $grade_t[$i]['turno'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Grau Longo</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td> <div class='turma'>" . $grade_t[$i]['grau_longo'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Serie Longa</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td> <div class='turma'>" . $grade_t[$i]['serie_longa'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">⠀</div>
              </th>
              <?php
              for ($i = 0; $i < 16; $i++) {
                echo "<td><a href=/gestor_escolar/pages/turma_selecionada.php?".$turma_t[$i]->link." class='btn btn-primary btn-sm'>Acessar</td>";
              }
              ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <table class="table">
          <tbody class="tabela">
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div>Grau Serie</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td> <div class='turma'>" . $grade_n[$i]['grau_serie'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turma</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td> <div class='turma'>" . $grade_n[$i]['turma'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Turno</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td> <div class='turma'>" . $grade_n[$i]['turno'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Grau Longo</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td> <div class='turma'>" . $grade_n[$i]['grau_longo'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Serie Longa</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td> <div class='turma'>" . $grade_n[$i]['serie_longa'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">⠀</div>
              </th>
              <?php
              for ($i = 0; $i < 1; $i++) {
                echo "<td><a href=/gestor_escolar/pages/turma_selecionada.php?".$turma_n[$i]->link." class='btn btn-primary btn-sm'>Acessar</td>";
              }
              ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

</body>

</html>