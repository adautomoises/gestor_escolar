<?php
$connect = mysqli_connect("localhost", "root", "", "escola");
// $connect = mysqli_connect("localhost", "root", "", "db_escola");

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
} else {
  // echo "Conectado ao MySQL <br> ";
}