<?php
function formatarHorario($horario)
{
  if (empty($horario) || strlen($horario) < 4) return null;
  return substr($horario, 0, -2) . ":" . substr($horario, 2, 2);
}
function getInfo_alunos($matricula)
{
  include('conexao.php');
  $select = "SELECT * FROM info_alunos WHERE matricula LIKE $matricula";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getInfo_alunosByParams($param)
{
  include('conexao.php');
  $params = array('action' => $param['action'], 'ano' => $param['ano'], 'escola' => $param['escola'], 'grau_serie' => $param['grau_serie'], 'turno' => $param['turno'], 'turma' => $param['turma'], 'status' => $param['status']);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?" . http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  $alunos = [];
  foreach ($array as $key => $value) {
   
    $dados = getInfo_alunos($value['matricula']);
    if (!$dados) {
      continue;
    }
    array_push($alunos, $dados);
  }

  return $alunos;
  mysqli_close($connect);
}
function cadastrarAlunos($param)
{
  include('conexao.php');
  http_response_code(200);

  $params = array('action' => $param['action'], 'ano' => $param['ano'], 'escola' => $param['escola'], 'grau_serie' => $param['grau_serie'], 'turno' => $param['turno'], 'turma' => $param['turma'], 'status' => $param['status']);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?" . http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  $idTurma = getTurmasById($array[0]['matricula']);

  $insert = "INSERT IGNORE INTO info_alunos (nome, email, cpf, matricula, status, nascimento, sexo, telefone, celular, sequencia, senha, idTurmas, idEndereços) VALUES ";
  $insert_alunos = [];
  foreach ($array as $key => $value) {
    $dados = getDados($value['matricula'], $idTurma);
    if (!$dados) {
      continue;
    }
    array_push($insert_alunos, $dados);
  }
  $insert .= implode(", ", $insert_alunos);
  mysqli_query($connect, $insert);
  mysqli_close($connect);
}
function getDados($matricula, $idTurma)
{
  include('conexao.php');

  $params = array('action' => 'getInfAluno', 'matricula' => $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?" . http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  $aluno = $array[0];
  if (!$array) {
    return NULL;
  }
  $idEndereços = getEndereçosById($aluno["matricula"]);

  return " ('" . $aluno["nome"] . "','" . $aluno["aluno_e_mail"] . "','" . $aluno["cpf"] . "','" . $aluno["matricula"] . "','" . $aluno["status"] . "','" . $aluno["nascimento"] . "','" . $aluno["sexo"] . "','" . $aluno["telefone"] . "','" . $aluno["celular"] . "','" . $aluno["sequencia"] . "', md5('" . $aluno["senha"] . "'), $idTurma, $idEndereços)";
}
function getTurmas($matricula)
{
  include('conexao.php');
  $idTurmas = getTurmasById($matricula);
  $select = "SELECT * FROM turmas WHERE idTurmas LIKE $idTurmas";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
function getTurmasById($matricula)
{
  include('conexao.php');

  $params = array('action' => 'getInfAluno', 'matricula' => $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?" . http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  $turma = $array[0];

  if (!$array) {
    return NULL;
  }

  $select = "SELECT idTurmas FROM turmas WHERE codigo_escola LIKE '" . $turma["escola"] . "' AND ano LIKE '" . $turma["ano"] . "' AND grau_serie LIKE '" . $turma["grau_serie"] . "' AND turno LIKE '" . $turma["turno"] . "' AND turma LIKE '" . $turma["turma"] . "';";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row["idTurmas"];
  mysqli_close($connect);
}
function getEndereços($matricula)
{
  include('conexao.php');
  $idEndereços = getEndereçosById($matricula);

  $select = "SELECT * FROM endereços WHERE idEndereços LIKE $idEndereços";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}

function getEndereçosById($matricula)
{
  include('conexao.php');

  $params = array('action' => 'getInfAluno', 'matricula' => $matricula);
  $filename = "http://camerascomputex.ddns.net:8080/escola/ws_controller.php?" . http_build_query($params);
  $data = file_get_contents($filename);
  $array = json_decode($data, true);
  if (!$array) {
    return NULL;
  }
  $select = "SELECT idEndereços FROM endereços WHERE bairro LIKE '" . $array[0]["bairro"] . "' AND cep LIKE '" . $array[0]["cep"] . "' AND cidade LIKE '" . $array[0]["cidade"] . "' AND uf LIKE '" . $array[0]["uf"] . "';";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    return $row["idEndereços"];
  }
  $insert = "INSERT INTO endereços (bairro, cep, cidade, UF) VALUES ('" . $array[0]["bairro"] . "','" . $array[0]["cep"] . "','" . $array[0]["cidade"] . "','" . $array[0]["uf"] . "')";
  mysqli_query($connect, $insert);

  $select = "SELECT idEndereços FROM endereços WHERE bairro LIKE '" . $array[0]["bairro"] . "' AND cep LIKE '" . $array[0]["cep"] . "' AND cidade LIKE '" . $array[0]["cidade"] . "' AND uf LIKE '" . $array[0]["uf"] . "';";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row["idEndereços"];
  mysqli_close($connect);
}

function getHorarios($matricula, $senha)
{
  include('conexao.php');

  $params = array('matricula' => $matricula, 'senha' => $senha, 'ano' => '20211');
  $filename = "http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?" . http_build_query($params);
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

function getHorariosById($matricula)
{
  include('conexao.php');
  $idTurmas = getTurmasById($matricula);
  $select = "SELECT h.idTurmas, GROUP_CONCAT(h.idHorarios) as NEW_idHorarios FROM horarios as h JOIN turmas as t
  WHERE h.idTurmas LIKE $idTurmas AND h.idTurmas = t.idTurmas GROUP BY idTurmas";
  $result = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($result);

  return $row;
  mysqli_close($connect);
}
