<?php
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
    getHorarios($array[0]["matricula"], $array[0]["senha"]);
    $idTurmas = getTurmasById($array[0]["matricula"]);
    getEndereços($array[0]["matricula"]);
    $idEndereços = getEndereçosById($array[0]["matricula"]);
    $idHorarios = getIdHorarios($array[0]["matricula"]);

    $insert = "INSERT INTO info_alunos (nome, email, cpf, matricula, status, nascimento, sexo, telefone, celular, sequencia, senha, idTurmas, idEndereços, idHorarios) VALUES ('".$array[0]["nome"]."','".$array[0]["aluno_e_mail"]."','".$array[0]["cpf"]."','".$array[0]["matricula"]."','".$array[0]["status"]."','".$array[0]["nascimento"]."','".$array[0]["sexo"]."','".$array[0]["telefone"]."','".$array[0]["celular"]."','".$array[0]["sequencia"]."', md5('".$array[0]["senha"]."'), $idTurmas , $idEndereços, '".$idHorarios["NEW_idHorarios"]."')";
    mysqli_query($connect, $insert);

  } 
    $select = "SELECT * FROM info_alunos WHERE matricula LIKE '".$array[0]['matricula']."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}

function getEndereços($matricula){
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

function cadastrarAlunos($param){
  include ('conexao.php');

  $params = array('action'=>$param['action'], 'ano'=>$param['ano'], 'escola'=>$param['escola'], 'grau_serie'=>$param['grau_serie'], 'turno'=>$param['turno'],'turma'=>$param['turma'], 'status'=>$param['status']);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  
  foreach ($array as $key => $value) { 
    $select = "SELECT matricula, nome, sequencia, status FROM info_alunos WHERE matricula LIKE '".$value['matricula']."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
    getDados($value['matricula']);
  }
    $select = "SELECT matricula, nome, sequencia, status FROM info_alunos WHERE matricula LIKE '".$value['matricula']."'";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  mysqli_close($connect);
}

function getTurmasById($matricula){
  include ('conexao.php');
  
  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);

  foreach ($array[0] as $key) { 

    $select = "SELECT idTurmas FROM turmas WHERE codigo_escola LIKE '".$array[0]["escola"]."' AND ano LIKE '" . $array[0]["ano"]."' AND grau_serie LIKE '" . $array[0]["grau_serie"]."' AND turno LIKE '" . $array[0]["turno"]."' AND turma LIKE '" . $array[0]["turma"]."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
  }
  foreach ($row as $key) {
  $idTurmas = $row["idTurmas"];
  }
  return $idTurmas;
  mysqli_close($connect);
}
function getEndereçosById($matricula){
  include ('conexao.php');
  
  $params = array('action'=>'getInfAluno', 'matricula'=> $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  
  foreach ($array[0] as $key) { 

    $select = "SELECT idEndereços FROM endereços WHERE bairro LIKE '".$array[0]["bairro"]."' AND cep LIKE '" . $array[0]["cep"]."' AND cidade LIKE '" . $array[0]["cidade"]."' AND uf LIKE '" . $array[0]["uf"]."';";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      break;
    }
  }
  foreach ($row as $key) {
  $idEndereços = $row["idEndereços"];
  }
  return $idEndereços;
  mysqli_close($connect);
}
function getHorarios($matricula, $senha){
  include ('conexao.php');

  $params = array('matricula'=> $matricula, 'senha' => $senha, 'ano'=>'20211');
  $filename = "http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?". http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  $idTurmas = getTurmasById($matricula);
  $grade = [];
  foreach ($array["horario"] as $dia) {
    foreach ($dia["horarios"] as $key => $horario) {
      $horario['inicio'] = formatarHorario($horario['inicio']);
      $horario['fim'] = formatarHorario($horario['fim']);
  
      $select = "SELECT dia, disciplina, professor, inicio, fim, idTurmas FROM horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "' AND fim LIKE '" . $horario["fim"]  . "' AND professor LIKE '" . $horario["professor"] . "' AND disciplina LIKE '" . $horario["disciplina"] . "';";
      $result = mysqli_query($connect, $select);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
        break;
      }
      $insert = "INSERT INTO horarios (dia, disciplina, inicio, fim, professor, idTurmas) 
      VALUE ('" . $dia["dia"] . "','" . $horario["disciplina"] . "','" . $horario["inicio"] . "','" . $horario["fim"] . "','" . $horario["professor"] . "', $idTurmas);";
      mysqli_query($connect, $insert);
    }
  }
  foreach ($array["horario"] as $dia) {
    foreach ($dia["horarios"] as $key => $horario) {
      $horario['inicio'] = formatarHorario($horario['inicio']);
      $horario['fim'] = formatarHorario($horario['fim']);
  
      $select = "SELECT dia, disciplina, professor, inicio, fim, idTurmas FROM horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "' AND fim LIKE '" . $horario["fim"]  . "' AND professor LIKE '" . $horario["professor"] . "' AND disciplina LIKE '" . $horario["disciplina"] . "';";
      $result = mysqli_query($connect, $select);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
        array_push($grade, $row);
      }
    }
  }
  return $grade;
  mysqli_close($connect);
}

function getIdHorarios($matricula){
  include ('conexao.php');
  $idTurmas = getTurmasById($matricula);
  $select = "SELECT h.idTurmas, GROUP_CONCAT(h.idHorarios) as NEW_idHorarios FROM horarios as h JOIN turmas as t
  WHERE h.idTurmas LIKE $idTurmas AND h.idTurmas = t.idTurmas GROUP BY idTurmas";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}