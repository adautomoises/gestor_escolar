<?php
include('C:\xampp\htdocs\gestor_escolar\assets\scripts\funcoes.php');
$matricula = '2011004';
$responseAluno = getDados($matricula);
$responseEndereço = getEndereços($matricula);
if ($responseAluno['status'] == 'C') {
  $responseAluno['status'] = 'Cursando';
} else {
  $responseAluno['status'] = 'Desistente';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/styles/style_index.css" />
  <title>Computex</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <div class="container-fluid">
        <a href="./index.php" class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Colégio Computex</a>
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="paginaInicial.html">Sair</a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        <dashboard class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gestor_escolar/pages/horario.php">
                  Horários
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gestor_escolar/pages/turmas.php">
                  Turmas
                </a>
              </li>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>EM BREVE</span>
              </h6>
              <li class="nav-item">
                <a class="nav-link disabled text-muted" tabindex="-1" aria-disabled="true" href="#">
                  Pré-Matrícula
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled text-muted" tabindex="-1" aria-disabled="true" href="#">
                  Senha
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled text-muted" tabindex="-1" aria-disabled="true" href="#">
                  Biblioteca
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled text-muted" tabindex="-1" aria-disabled="true" href="#">
                  Agenda
                </a>
              </li>
            </ul>
          </div>
        </dashboard>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div id="container-profile" class="container">
            <div id="row-profile" class="row">
              <div id="column-profile" class="col-3">
                <div class="card">
                  <img class="card-img-top" src="./assets/images/logotipo.png" alt="Logo da Escola" />
                </div>
                <!-- Button trigger modal -->
                <button type='button' class='btn btn-outline-primary btn-custom' data-bs-toggle='modal'
                  data-bs-target='#exampleModal'>
                  Acesse seus dados
                </button>
                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel'
                  aria-hidden='true'>
                  <div class='modal-dialog modal-lg'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>
                          Dados do Usuário
                        </h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                      </div>
                      <div class='modal-body'>
                        <div id="container-modal" class='container'>
                          <div id='row-modal-data' class='row'>
                <?php
                echo
                " <div class='col-4'> <h6>Nome</h6>" . $responseAluno['nome'] . "</div>
                  <div class='col-4'> <h6>Matrícula</h6>" . $responseAluno['matricula'] . "</div>
                  <div class='col-4'> <h6>Nascimento</h6>" . $responseAluno['nascimento'] . "</div>
                  <div class='col-4'> <h6>Sexo</h6>" . $responseAluno['sexo'] . "</div>
                  <div class='col-4'> <h6>Situação</h6>" . $responseAluno['status'] . "</div> "
                ?>
                      </div>
                      <div id='row-modal-address' class='row'>
                        <h5>Endereço</h5>
                <?php
                echo
                " <div class='col-3'> <h6>CEP</h6>" . $responseEndereço['cep'] . "</div>
                  <div class='col-3'> <h6>Bairro</h6>" . $responseEndereço['bairro'] . "</div>
                  <div class='col-3'> <h6>Cidade</h6>" . $responseEndereço['cidade'] . "</div>
                  <div class='col-3'> <h6>UF</h6>" . $responseEndereço['UF'] . "</div> "
                ?>
                          </div>
                          <div id='row-modal-contact' class='row'>
                        <h5>Contatos</h5>
                <?php
                echo
              " <div class='col-3'> <h6>Telefone</h6>" . $responseAluno['telefone'] . "</div>
                <div class='col-3'> <h6>Celular</h6>" . $responseAluno['celular'] . "</div>
                <div class='col-3'> <h6>Email</h6>" . $responseAluno['email'] . "</div> "

                ?>
                          </div>
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                          Fechar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-5"><img class="card-img rounded w-50" src="./assets/images/logotipo.png"
                  alt="Foto do Aluno" />
                <h5>NOME DO ALUNO</h5>
                <p>Turma: 2º Ano A | Turno: M</p>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </main>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

</body>

</html>