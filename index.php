<!DOCTYPE html>
<html lang="pr-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/styles/style_main.css" />
  <title>Computex</title>
</head>

<body>
  <!-- NAVBAR: HOME E EXIT -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">
          <img src="./assets/images/logotipo.png" width="40" height="40" class="d-inline" alt="" />
          Colégio Computex
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
          aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BOTÃO DE SAIR -->
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <div class="navbar-nav ml-auto">
            <a class="nav-link" href="paginaInicial.html">Sair</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- PERFIL-->
  <main id="Home">
    <div class="Homepage">
      <div id="container-perfil" class="container">
        <div id="row-perfil" class="row">
          <div id="colunaEsquerda-perfil" class="col-3">
            <div id="card-perfil-logo" class="card">
              <img class="card-img-top" src="./assets/images/logotipo.png" alt="Logo da Escola" />
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-custom" data-bs-toggle="modal"
              data-bs-target="#exampleModal">
              Acesse seus dados
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Dados do Usuário
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">...</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Fechar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="colunaDireita-perfil" class="col-5">
            <img class="card-img rounded w-50" src="./assets/images/logotipo.png" alt="Foto do Aluno" />
            <h5>NOME DO ALUNO</h5>
            <p>Turma: 2º Ano A | Turno: M</p>
          </div>
        </div>
      </div>
      <!-- GRUPO DE BOTÕES DO MENU -->
      <div class="container">
        <div class="row row-cols-auto">

          <?php
            include ('C:\xampp\htdocs\gestor_escolar\assets\scripts\utilites.php');
            for ($i=0; $i < 17; $i++) { 
              echo "
              <div>
                <a href='".$btn[$i]->link."' class='btn btn-primary btn-custom'>
                  <figure id='figure-caixa-botoes' class='caixa-botoes'>
                    <div>
                      <img src='".$btn[$i]->image."' class='figure-img img-fluid rounded'
                        alt='Icone pré-matrícula' />
                    </div>
                    <div class='label'>".$btn[$i]->label."</div>
                  </figure>
                </a>
              </div>";
            }
          ?>
        </div>
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