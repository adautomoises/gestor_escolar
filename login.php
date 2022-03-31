<?php
session_start();
include ('./assets/scripts/conexao.php');
include('C:\xampp\htdocs\gestor_escolar\assets\scripts\funcoes.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/styles/style_login.css" />
  <title>Computex</title>
</head>

<body>
  <section class="">
    <div class="container-fluid">
      <div class="col-4">
        <h3 class="title">Login</h3>
        <div class="box">
          <form class="form" action="../gestor_escolar/assets/scripts/sistema_login.php" method="POST">
            <div class="input-login">
              <input name="usuario" class="input" type="text" placeholder="Matricula">
            </div>
            <div class="input-password">
              <input name="senha" class="input" type="password" placeholder="Senha">
            </div>
            <button type="submit" class="submit">Entrar</button>
          </form>
          <a href="" class="reset">Esqueci minha senha</a>
        </div>
        <?php
        if (isset($_SESSION['no-auth'])):
        ?>
        <div class="login-validation">
          <p>Usuário ou Senha inválidos.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['no-auth']);
        ?>
      </div>
    </div>
  </section>
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