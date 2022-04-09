<?php
session_start();
include('C:\xampp\htdocs\gestor_escolar\assets\scripts\valida_login.php');
include('../assets/scripts/funcoes.php');
include('../assets/scripts/utilites.php');
include('../assets/scripts/conexao.php');


$param = $_REQUEST;
$responseAlunos = getInfo_alunosByParams($param);
$param = getTurmasByParam($param);
switch ($param['turno']) {
  case 'M':
    $param['turno'] = 'Manhã';
    break;
  case 'T':
    $param['turno'] = 'Tarde';
    break;
  case 'N':
    $param['turno'] = 'Noite';
    break;

  default:
    break;
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
  <link rel="stylesheet" href="../assets/styles/style_turma_selecionada.php" type="text/css" />
  <title>Computex</title>
</head>

<body>
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

  <div class="container" style="margin-top: 80px">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $param['grau_longo'] ?> | <?php echo $param['serie_longa'] ?> | Turma <?php echo $param['turma'] ?> | Turno: <?php echo $param['turno'] ?>
      </h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <form action="../assets/scripts/gerar_pdf.php" method="post">
            <input type="submit" class="btn btn-outline-primary" value="Exportar como PDF">
          </form>
        </div>

      </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
          <tbody class="tabela">
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Sequencia</div>
              </th>
              <?php
              for ($i = 0; $i < count($responseAlunos); $i++) {
                echo "<td> <div class='turma'>" . $responseAlunos[$i]['sequencia'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">---------------- Nome ----------------</div>
              </th>
              <?php
              for ($i = 0; $i < count($responseAlunos); $i++) {
                echo "<td> <div class='nome'>" . $responseAlunos[$i]['nome'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Matricula</div>
              </th>
              <?php
              for ($i = 0; $i < count($responseAlunos); $i++) {
                echo "<td> <div class='turma'>" . $responseAlunos[$i]['matricula'] . "</div> </td>";
              }
              ?>
            </tr>
            <tr class="coluna">
              <th class="topico" scope='col'>
                <div class="">Status</div>
              </th>
              <?php
              for ($i = 0; $i < count($responseAlunos); $i++) {
                if ($responseAlunos[$i]['status'] == 'C') {
                  $responseAlunos[$i]['status'] = 'Cursando';
                } else {
                  $responseAlunos[$i]['status'] = 'Desistente';
                }
                echo "<td> <div class='turma'>" . $responseAlunos[$i]['status'] . "</div> </td>";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>