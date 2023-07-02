<?php
$dadosRecebidos = json_decode(file_get_contents('php://input'), true);
$headers = getallheaders();


$token = $headers['Authorization'];

if($token != "Bearer beea1d4e62abb449534b33598b77f63a"){

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
            'credenciais' => $token,
        ],
    
    
    ]; 

}

$responseJson = json_encode($responseArray);

header('Content-Type: application/json');

echo($responseJson);

 
?>

