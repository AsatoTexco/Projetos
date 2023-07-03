<?php

session_start();

echo($_SESSION['id_user']);
echo("<br><br>");
var_dump($_COOKIE);

require '../Classes/Usuario.php';

$usuario = new Usuario;
 