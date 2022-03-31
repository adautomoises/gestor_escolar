<?php
session_start();
session_destroy();
header('Location: /gestor_escolar/login.php');
exit();