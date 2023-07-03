<?php

require './Classes/Usuario.php';

$user = new Usuario;
$passDb = '$uP0rT3@22';
$user->conectar('api','localhost','root',$passDb);

$dados = $user->dados(1);
print_r($dados);

 