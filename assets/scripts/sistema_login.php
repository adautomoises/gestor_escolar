<?php
session_start();
include('C:\xampp\htdocs\gestor_escolar\assets\scripts\conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
  header('Location: /gestor_escolar/login.php');
  exit;
}

$usuario = mysqli_real_escape_string($connect, $_POST['usuario']);
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

$select = "SELECT matricula FROM info_alunos WHERE matricula LIKE '{$usuario}' AND senha LIKE md5('{$senha}');";
$result = mysqli_query($connect, $select);

$row = mysqli_num_rows($result);

if($row == 1){
  $_SESSION['usuario'] = $usuario;
  header('Location: /gestor_escolar/index.php');
  exit();
} else {
  $_SESSION['no-auth'] = true;
  header('Location: /gestor_escolar/login.php');
  exit();
}