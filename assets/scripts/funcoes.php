<?php

function getTurmas($ano){
 $connect = mysqli_connect("localhost", "root", "", "escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
}
  $select = "SELECT codigo_escola, ano, grau_serie, turno, turma, grau_longo, serie_longa FROM turmas WHERE ano LIKE ".$ano."";
  $result = mysqli_query($connect, $select);

  if (mysqli_num_rows($result)> 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $obj = array("codigo_escola" => $row["codigo_escola"],"ano" => $row["ano"],"grau_serie" => $row["grau_serie"],"turno" => $row["turno"],"turma" => $row["turma"],"grau_longo" => $row["grau_longo"],"serie_longa" => $row["serie_longa"]);
      $turmas[] = $obj;
    }
  }
  mysqli_close($connect);
  echo json_encode($turmas);
}
