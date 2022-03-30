<?php

function getTurmas($ano){
 $connect = mysqli_connect("localhost", "root", "", "escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
}
  $select = "SELECT codigo_escola, ano, grau_serie, turno, turma, grau_longo, serie_longa FROM turmas WHERE ano LIKE ".$ano."";
  $result = mysqli_query($connect, $select);
  $turmas = [];
  if (mysqli_num_rows($result)> 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $obj = array("codigo_escola" => $row["codigo_escola"],"ano" => $row["ano"],"grau_serie" => $row["grau_serie"],"turno" => $row["turno"],"turma" => $row["turma"],"grau_longo" => $row["grau_longo"],"serie_longa" => $row["serie_longa"]);
      $turmas += $obj;
    }
  }
  mysqli_close($connect);
}
function formatarHorario($horario){
  if(empty($horario) || strlen($horario) < 4) return null;
  return substr($horario, 0, -2) .":". substr($horario, 2, 2);
}

function getDados($matricula)
{
  $connect = mysqli_connect("localhost", "root", "", "escola");

  if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
  }
  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);

  foreach ($array[0] as $key) { 

    $select = "SELECT nome, email, cpf, matricula, status, nascimento, sexo, telefone, celular, sequencia FROM info_alunos WHERE matricula LIKE " . $array[0]["matricula"] . ";";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    $insert = "INSERT INTO info_alunos (nome, email, cpf, matricula, status, nascimento, sexo, telefone, celular, sequencia) VALUES ('".$array[0]["nome"]."','".$array[0]["aluno_e_mail"]."','".$array[0]["cpf"]."','".$array[0]["matricula"]."','".$array[0]["status"]."','".$array[0]["nascimento"]."','".$array[0]["sexo"]."','".$array[0]["telefone"]."','".$array[0]["celular"]."','".$array[0]["sequencia"]."')";
    mysqli_query($connect, $insert);
  }
    $select = "SELECT nome, email, matricula, status, nascimento, sexo, telefone, celular, sequencia FROM info_alunos WHERE matricula LIKE '".$array[0]['matricula']."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getEndereços($matricula)
{
  $connect = mysqli_connect("localhost", "root", "", "escola");

  if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
  }
  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  
  foreach ($array[0] as $key) { 

    $select = "SELECT bairro, cep, cidade, UF FROM endereços;";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    $insert = "INSERT INTO endereços (bairro, cep, cidade, UF) VALUES ('".$array[0]["bairro"]."','".$array[0]["cep"]."','".$array[0]["cidade"]."','".$array[0]["uf"]."')";
    mysqli_query($connect, $insert);
  }
    $select = "SELECT bairro, cep, cidade, UF FROM endereços;";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getAlunos($param)
{
  $connect = mysqli_connect("localhost", "root", "", "escola");

  if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
  }
  $params = array('action'=>$param['action'], 'ano'=>$param['ano'], 'escola'=>$param['escola'], 'grau_serie'=>$param['grau_serie'], 'turno'=>$param['turno'],'turma'=>$param['turma'], 'status'=>$param['status']);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  
  
  foreach ($array as $key) { 
    $select = "SELECT matricula, nome, sequencia, status FROM info_alunos WHERE matricula LIKE matricula;";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    $insert = "INSERT INTO info_alunos (matricula, nome, sequencia, status) VALUES ('".$array["matricula"]."','".$array["nome"]."','".$array["sequencia"]."','".$array["status"]."')";
    mysqli_query($connect, $insert);
  }
    $select = "SELECT matricula, nome, sequencia, status FROM info_alunos WHERE matricula LIKE matricula;";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}