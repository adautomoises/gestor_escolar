<?php
session_start();
include('C:\xampp\htdocs\gestor_escolar\assets\scripts\valida_login.php');
include ('../assets/scripts/funcoes.php');
include ('../assets/scripts/conexao.php');

$matricula = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$grade = getHorarios($matricula, $senha);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/styles/style_horario.css">
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
          <a class="nav-link" href="/gestor_escolar/assets/scripts/logout.php">Sair</a>
          </div>
      </div>
    </nav>
  </header>
  <main>
    <div id="container-tabela" class="container">
      <div class="title">
        <h1>Horário</h1>
      </div>
      <table class="table table-hover">
        <tbody class="tabela">
          <tr class="coluna">
            <th class='semana' scope='col'>
              <div class='dias'>Segunda-feira</div>
            </th>
            <?php
            for ($i = 0; $i < 4; $i++) {
              echo "<td> <div class='col horario'>" . $grade[$i]['disciplina'] . "</div> <div class='col horario'>" . $grade[$i]['professor'] . "</div> <div class='col horario'>" . $grade[$i]['inicio'] . " às " . $grade[$i]['fim'] . "</div> </td>";
            }
            ?>
          </tr>
          <tr class="coluna">
            <th class='semana' scope='col'>
              <div class='dias'>Terça-feira</div>
            </th>
            <?php
            for ($i = 4; $i < 8; $i++) {
              echo "<td> <div class='col horario'>" . $grade[$i]['disciplina'] . "</div> <div class='col horario'>" . $grade[$i]['professor'] . "</div> <div class='col horario'>" . $grade[$i]['inicio'] . " às " . $grade[$i]['fim'] . "</div> </td>";
            }
            ?>
          </tr>
          <tr class="coluna">
            <th class='semana' scope='col'>
              <div class='dias'>Quarta-feira</div>
            </th>
            <?php
            for ($i = 8; $i < 12; $i++) {
              echo "<td> <div class='col horario'>" . $grade[$i]['disciplina'] . "</div> <div class='col horario'>" . $grade[$i]['professor'] . "</div> <div class='col horario'>" . $grade[$i]['inicio'] . " às " . $grade[$i]['fim'] . "</div> </td>";
            }
            ?>
          </tr>
          <tr class="coluna">
            <th class='semana' scope='col'>
              <div class='dias'>Quinta-feira</div>
            </th>
            <?php
            for ($i = 12; $i < 16; $i++) {
              echo "<td> <div class='col horario'>" . $grade[$i]['disciplina'] . "</div> <div class='col horario'>" . $grade[$i]['professor'] . "</div> <div class='col horario'>" . $grade[$i]['inicio'] . " às " . $grade[$i]['fim'] . "</div> </td>";
            }
            ?>
          </tr>
          <tr class="coluna">
            <th class='semana' scope='col'>
              <div class='dias'>Sexta-feira</div>
            </th>
            <?php
            for ($i = 16; $i < 20; $i++) {
              echo "<td> <div class='col horario'>" . $grade[$i]['disciplina'] . "</div> <div class='col horario'>" . $grade[$i]['professor'] . "</div> <div class='col horario'>" . $grade[$i]['inicio'] . " às " . $grade[$i]['fim'] . "</div> </td>";
            }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>