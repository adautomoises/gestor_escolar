<?php
    $connect = mysqli_connect("localhost","root","","escola");

    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
      }else{
        echo "Conectado ao MySQL <br> ";
      }
    
    #UTILIZAR A FUNÇÃO GET PARA RECEBER OS DADOS
    $filename = "http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211";
    $data = file_get_contents($filename);
    $array = json_decode($data, true);
    $i = 0; $j = 0;
    foreach ($array as $key => $value) {
     foreach ($value as $key => $value){
        foreach ($value as $key => $value){

          if('dia'===$key){
              $semana[$i] = $key;
              $dias[$i] = $value;
              $i++;
            // echo '<br>';
            // echo $semana. " = " .$dias;
            // echo '<br>';
          }else if ('horarios'===$key){
             if(is_array($value)){
              // echo '<hr>';
               foreach ($value as $key => $value) {
                 foreach ($value as $key => $value) {
                  $chave[$j] = $key;
                  $valor[$j] = $value;
                  $j++;
                  // echo $chave. " = " .$valor;
                  // echo '<br>';
                }
                // echo '<hr>';
               }
             }
          }
          }
        }
      }
      /*
        $i=0;
        for ($j=0; $j < count($chave) ; $j++) { 
        if($j %10 == 0 ){
          echo '<hr>';
        }
        if($j %40 == 0){
          echo $semana[$i]. " = " .$dias[$i];
          $i++;
          echo '<br>';
        }
        echo $chave[$j]. " = " .$valor[$j];
        echo '<br>';
        }
      */
    # Váriavel do array da semana = $semana[$i]
    # Váriavel dos dias da semana = $dias[$i]
    # Váriavel do array (horarios) 0 a 3 = $chave[$i]
    # Váriavel do valores do array (horarios) 0 a 9 = $valor[$i]

    $sql = "INSERT INTO horarios (dia, escola, codigo_serie, serie, turno, turma, codigo_disciplina, disciplina, inicio, fim, professor) 
     VALUE ('Segunda-feira','1','12','Ensino Fundamental/2º Ano','M','1','','Ciências','0720','0810','ROSEANE');";

    $sql = sprintf("SELECT disciplina, professor FROM horarios WHERE 'dia' = 'Segunda-feira' AND 'inicio' = '0720';");

    
    $dados = mysqli_query($connect, $sql) or die(mysqli_error());
    $row = mysqli_fetch_assoc($dados);
    $numDATA = mysqli_num_rows($dados);


    mysqli_query($connect, $sql);
    // echo 'Dados inseridos no banco de dados.';


    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
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
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false"
                    aria-label="Alterna navegação">
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
  <main>
    <div id="container-tabela" class="container">
      <div class="title"><h1>Horário</h1></div>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th></th>
            <th class="semana" scope="col"><div class="dias">Segunda-feira</div></th>
            <th class="semana" scope="col"><div class="dias">Terça-feira</div></th>
            <th class="semana" scope="col"><div class="dias">Quarta-feira</div></th>
            <th class="semana" scope="col"><div class="dias">Quinta-feira</div></th>
            <th class="semana" scope="col"><div class="dias">Sexta-feira</div></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="horarios" scope="row">07:20 a 08:10</th>
            <td><div class="materia"><?php
                                            // se o número de resultados for maior que zero, mostra os dados
                                            if($numDATA > 0) {
                                              // inicia o loop que vai mostrar todos os dados
                                              do {
                                          ?>
                                                <p><?=$row['disciplina']?> / <?=$row['professor']?></p>
                                          <?php
                                              // finaliza o loop que vai mostrar os dados
                                              }while($row = mysqli_fetch_assoc($dados));
                                            // fim do if
                                            }?></div></td>
            <td><div class="materia">2</div></td>
            <td><div class="materia">3</div></td>
            <td><div class="materia">4</div></td>
            <td><div class="materia">5</div></td>
          </tr>
          <tr>
            <th class="horarios" scope="row">08:10 a 09:00</th>
            <td><div class="materia">1</div></td>
            <td><div class="materia">2</div></td>
            <td><div class="materia">3</div></td>
            <td><div class="materia">4</div></td>
            <td><div class="materia">5</div></td>
          </tr>
          <tr>
            <th class="horarios" scope="row">09:00 a 09:30</th>
            <td colspan="5">
              <div class="linha-intervalo" >Intervalo</div>
            </td>
          </tr>
          <tr>
            <th class="horarios" scope="row">09:30 a 10:20</th>
            <td><div class="materia">1</div></td>
            <td><div class="materia">2</div></td>
            <td><div class="materia">3</div></td>
            <td><div class="materia">4</div></td>
            <td><div class="materia">5</div></td>
          </tr>
          <tr>
            <th class="horarios" scope="row">10:20 a 11:05</th>
            <td><div class="materia">1</div></td>
            <td><div class="materia">2</div></td>
            <td><div class="materia">3</div></td>
            <td><div class="materia">4</div></td>
            <td><div class="materia">5</div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>