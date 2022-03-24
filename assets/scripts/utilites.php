<?php
    class objetos{
        public $link;
        public $image;
        public $label;
    }
    $btn = array();

    $btn[0] = new objetos();
    $btn[0]->link = "pre-matricula";
    $btn[0]->image = "./assets/images/logotipo.png";
    $btn[0]->label = "Pré-Matrícula";
    $btn[1] = new objetos();
    $btn[1]->link = "pages\horario.php";
    $btn[1]->image = "./assets/images/logotipo.png";
    $btn[1]->label = "Horários";
    $btn[2] = new objetos();
    $btn[2]->link = "pages/turmas.php?action=getTurmas&ano=20211";
    $btn[2]->image = "./assets/images/logotipo.png";
    $btn[2]->label = "Turmas";
    $btn[3] = new objetos();
    $btn[3]->link = "Chat-2021";
    $btn[3]->image = "./assets/images/logotipo.png";
    $btn[3]->label = "Chat 2021";
    $btn[4] = new objetos();
    $btn[4]->link = "Boletos";
    $btn[4]->image = "./assets/images/logotipo.png";
    $btn[4]->label = "Boletos";
    $btn[5] = new objetos();
    $btn[5]->link = "IRPF";
    $btn[5]->image = "./assets/images/logotipo.png";
    $btn[5]->label = "IRPF";
    $btn[6] = new objetos();
    $btn[6]->link = "Boletim";
    $btn[6]->image = "./assets/images/logotipo.png";
    $btn[6]->label = "Boletim";
    $btn[7] = new objetos();
    $btn[7]->link = "Conteudo-Programatico";
    $btn[7]->image = "./assets/images/logotipo.png";
    $btn[7]->label = "Conteúdo Programático";
    $btn[8] = new objetos();
    $btn[8]->link = "Calendario";
    $btn[8]->image = "./assets/images/logotipo.png";
    $btn[8]->label = "Calendário";
    $btn[9] = new objetos();
    $btn[9]->link = "Colonia-de-Ferias";
    $btn[9]->image = "./assets/images/logotipo.png";
    $btn[9]->label = "Colônia de Férias";
    $btn[10] = new objetos();
    $btn[10]->link = "Material-Didático";
    $btn[10]->image = "./assets/images/logotipo.png";
    $btn[10]->label = "Material Didático";  
    $btn[11] = new objetos();
    $btn[11]->link = "Ocorrencias";
    $btn[11]->image = "./assets/images/logotipo.png";
    $btn[11]->label = "Ocorrências";
    $btn[12] = new objetos();
    $btn[12]->link = "Biblioteca";
    $btn[12]->image = "./assets/images/logotipo.png";
    $btn[12]->label = "Biblioteca";
    $btn[13] = new objetos();
    $btn[13]->link = "Acessos";
    $btn[13]->image = "./assets/images/logotipo.png";
    $btn[13]->label = "Acessos";
    $btn[14] = new objetos();
    $btn[14]->link = "Chat-Externo";
    $btn[14]->image = "./assets/images/logotipo.png";
    $btn[14]->label = "Chat Externo";
    $btn[15] = new objetos();
    $btn[15]->link = "Ensino-Medio-II";
    $btn[15]->image = "./assets/images/logotipo.png";
    $btn[15]->label = "Ensino Médio II";
    $btn[16] = new objetos();
    $btn[16]->link = "Senha";
    $btn[16]->image = "./assets/images/logotipo.png";
    $btn[16]->label = "Senha";



    class params{
      public $link;
  }
  $params = array();

  $params[0] = new objetos();
  $params[0]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=3&turno=M&turma=1&status=C";
  $params[1] = new objetos();
  $params[1]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=4&turno=M&turma=1&status=C";
  $params[2] = new objetos();
  $params[2]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=5&turno=M&turma=1&status=C";
  $params[3] = new objetos();
  $params[3]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=11&turno=M&turma=1&status=C";
  $params[4] = new objetos();
  $params[4]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=12&turno=M&turma=1&status=C";
  $params[5] = new objetos();
  $params[5]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=13&turno=M&turma=1&status=C";
  $params[6] = new objetos();
  $params[6]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=14&turno=M&turma=1&status=C";
  $params[7] = new objetos();
  $params[7]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=15&turno=M&turma=1&status=C";
  $params[8] = new objetos();
  $params[8]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=16&turno=M&turma=1&status=C";
  $params[9] = new objetos();
  $params[9]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=17&turno=M&turma=1&status=C";
  $params[10] = new objetos();
  $params[10]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=17&turno=M&turma=2&status=C";
  $params[11] = new objetos();
  $params[11]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=18&turno=M&turma=1&status=C";
  $params[12] = new objetos();
  $params[12]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=19&turno=M&turma=1&status=C";
  $params[13] = new objetos();
  $params[13]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=21&turno=M&turma=1&status=C";
  $params[14] = new objetos();
  $params[14]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=22&turno=M&turma=1&status=C";
  $params[15] = new objetos();
  $params[15]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=23&turno=M&turma=1&status=C";
  $params[16] = new objetos();
  $params[16]->link = "action=getAlunosTurma&ano=20211&escola=1&grau_serie=24&turno=M&turma=1&status=C";
?>
