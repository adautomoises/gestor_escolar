<?php
if(!$_SESSION['usuario']){
  header('Location: /gestor_escolar/login.php');
  exit();
}