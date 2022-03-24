<?php
// Define que o arquivo terá a codificação de saída no formato CSS
header("Content-type: text/css");
?>
body{
  background-image: url(http://camerascomputex.ddns.net:8080/escola/images/fundo2claro.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.tabela{
  display: flex;
  justify-content: center;
}
.coluna{
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.title, .subtitle{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.turma{
  display: flex;
  justify-content: center;
  width: 160px;
  height: 31px;
}