<?php
  include ('C:\xampp\htdocs\gestor_escolar\assets\scripts\funcoes.php');

  $connect = mysqli_connect("localhost", "root", "", "escola");
  
  if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
  } else {
    // echo "Conectado ao MySQL <br> ";
  }

  $action = $_REQUEST['action'];
  switch ($action) {
    case "getTurmas":
      $response = getTurmas($_REQUEST['ano']);
      break;
    
    default:
      break;
  }


?>