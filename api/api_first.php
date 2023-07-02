<?php
require '../config.php';
if(!isset($dadosRecebidos)){
    header("Location: index.php");
}


$dadosRecebidos = json_decode(file_get_contents('php://input'), true);
$headers = getallheaders();


$token = $headers['Authorization'];

$tokenCod = str_replace("Bearer ","",$token);

$sql = $pdo->prepare("SELECT * FROM token WHERE token = :t");

$sql->bindValue(":t", $tokenCod);
$sql->execute();

 if($sql->rowCount() == 0 ){

    $responseArray = [

        "error" => "Token de Acesso invalido, melhore!",

    ]; 
 
}else{


    $responseArray = [
    
        "name" => "Arthur",
        "age"  => 17,
        "cep"  => "79084170",
        "caracteristicas" => [
            'peso' => 80,
            'altura' => 1.80,
            'sexo'  => 'Masculino',
            'credenciais' => $sql->rowCount(),
        ],
    
    
    ]; 

}

$responseJson = json_encode($responseArray);

header('Content-Type: application/json');

echo ($responseJson);

 
?>

