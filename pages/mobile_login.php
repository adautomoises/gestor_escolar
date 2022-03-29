<?php
  include ('../assets/scripts/funcoes.php');
  
    // $connect = mysqli_connect("localhost", "root", "", "escola");

    // if (mysqli_connect_errno()) {
    // echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    // exit();
    // } else {
    // // echo "Conectado ao MySQL <br> ";
    // }
    $matricula = '2011004';
    // $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
    
    // $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
    // $data = file_get_contents($filename);
    // $array = json_decode($data, true);

    $responseAluno = getDados($matricula);
    $responseEndereço = getEndereços($matricula);
    if($responseAluno['status'] == 'C'){
      $responseAluno['status'] = 'Cursando';
    }else{
      $responseAluno['status'] = 'Desistente';
    }

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
    // foreach($array['config'] as $key => $value){
    //     #RETORNA O ARRAY FILHO COM CHAVE E VALOR (OK!);
    //     echo $key." = ".$value."<br>";
    // }


    
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

  <title>Computex</title>
</head>

<body>
  <?php
      echo"
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
              
              <div class='container'>
              <div class='row justify-content-start'>
              <div class='col-4'> <h6>Nome</h6>".$responseAluno['nome']."</div>
              <div class='col-4'> <h6>Matrícula</h6>".$responseAluno['matricula']."</div>
              <div class='col-4'> <h6>Nascimento</h6>".$responseAluno['nascimento']."</div>
              <div class='col-4'> <h6>Sexo</h6>".$responseAluno['sexo']."</div>
              <div class='col-4'> <h6>Situação</h6>".$responseAluno['status']."</div>
              <div class='col-4'> <h6>E-mail</h6>".$responseAluno['email']."</div>
              </div>
              <div class='row justify-content-start'>
              <h5>Endereço</h5>
              <div class='col-3'> <h6>CEP</h6>".$responseEndereço['cep']."</div>
              <div class='col-3'> <h6>Bairro</h6>".$responseEndereço['bairro']."</div>
              <div class='col-3'> <h6>Cidade</h6>".$responseEndereço['cidade']."</div>
              <div class='col-3'> <h6>UF</h6>".$responseEndereço['UF']."</div>

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
        </div>"
    ?>


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