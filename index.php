<?php
$lista = [
    "idade"=>19,
    "altura"=>1.8,
    'caracteristicas' => [
        'cor' => "branca",
        'cpf' => '92316293229',
        'legal' => "sim"
    ]
];

$listaJson = json_encode($lista);

// para setar cookie: [setcookie("nome_cookie","conteudo(json)",tempo("time() + tempo em segundos que ficara"))]

setcookie("usertoken", "", - (time()+20*24*60*60));

var_dump($_COOKIE);
 
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    
</body>
</html>