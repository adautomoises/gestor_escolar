<?php
function getTurmas(){
  include ('conexao.php');
  
  return $row;
  mysqli_close($connect);
}
function formatarHorario($horario){
  if(empty($horario) || strlen($horario) < 4) return null;
  return substr($horario, 0, -2) .":". substr($horario, 2, 2);
}

function getDados($matricula){
  include ('conexao.php');

  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);

  foreach ($array[0] as $key) { 

    $select = "SELECT * FROM info_alunos WHERE matricula LIKE " . $array[0]["matricula"] . ";";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    $insert = "INSERT INTO info_alunos (nome, email, cpf, matricula, status, nascimento, sexo, telefone, celular, sequencia, senha) VALUES ('".$array[0]["nome"]."','".$array[0]["aluno_e_mail"]."','".$array[0]["cpf"]."','".$array[0]["matricula"]."','".$array[0]["status"]."','".$array[0]["nascimento"]."','".$array[0]["sexo"]."','".$array[0]["telefone"]."','".$array[0]["celular"]."','".$array[0]["sequencia"]."', md5('".$array[0]["senha"]."'))";
    mysqli_query($connect, $insert);
  }
    $select = "SELECT * FROM info_alunos WHERE matricula LIKE '".$array[0]['matricula']."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getEndereços($matricula)
{
  include ('conexao.php');

  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  
  foreach ($array[0] as $key) { 

    $select = "SELECT bairro, cep, cidade, UF FROM endereços WHERE bairro LIKE '".$array[0]["bairro"]."' AND cep LIKE '" . $array[0]["cep"]."' AND cidade LIKE '" . $array[0]["cidade"]."' AND uf LIKE '" . $array[0]["uf"]."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    $insert = "INSERT INTO endereços (bairro, cep, cidade, UF) VALUES ('".$array[0]["bairro"]."','".$array[0]["cep"]."','".$array[0]["cidade"]."','".$array[0]["uf"]."')";
    mysqli_query($connect, $insert);
  }
    $select = "SELECT bairro, cep, cidade, UF FROM endereços WHERE bairro LIKE '".$array[0]["bairro"]."' AND cep LIKE '" . $array[0]["cep"]."' AND cidade LIKE '" . $array[0]["cidade"]."' AND uf LIKE '" . $array[0]["uf"]."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getAlunos($param)
{
  include ('conexao.php');

  $params = array('action'=>$param['action'], 'ano'=>$param['ano'], 'escola'=>$param['escola'], 'grau_serie'=>$param['grau_serie'], 'turno'=>$param['turno'],'turma'=>$param['turma'], 'status'=>$param['status']);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  print_r($array);exit;  
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

  return print_r($row);
  mysqli_close($connect);
}