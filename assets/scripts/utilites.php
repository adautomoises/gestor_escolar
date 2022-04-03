<?php
  class turmas{
    public $link;
  }

  $turmas_m = array("action=getAlunosTurma&ano=20211&escola=1&grau_serie=3&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=4&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=5&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=11&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=12&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=13&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=14&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=15&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=16&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=17&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=17&turno=M&turma=2&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=18&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=19&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=21&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=22&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=23&turno=M&turma=1&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=24&turno=M&turma=1&status=C");
  for ($i=0; $i < count($turmas_m); $i++) { 
    $turma_m[$i] = new turmas();
    $turma_m[$i]->link = $turmas_m[$i];
  }

  
  $turmas_t = array("action=getAlunosTurma&ano=20211&escola=1&grau_serie=3&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=4&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=5&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=11&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=12&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=13&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=14&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=15&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=16&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=17&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=18&turno=T&turma=2&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=19&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=21&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=22&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=23&turno=T&turma=3&status=C","action=getAlunosTurma&ano=20211&escola=1&grau_serie=24&turno=T&turma=3&status=C");
  for ($i=0; $i < count($turmas_t); $i++) { 
    $turma_t[$i] = new turmas();
    $turma_t[$i]->link = $turmas_t[$i];
  }

  $turmas_n = array("action=getAlunosTurma&ano=20211&escola=1&grau_serie=31&turno=N&turma=1&status=C");

  for ($i=0; $i < count($turmas_n); $i++) { 
    $turma_n[$i] = new turmas();
    $turma_n[$i]->link = $turmas_n[$i];
  }
?>
