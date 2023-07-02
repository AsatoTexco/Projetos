<?php

$url = "localhost/projeto/api_first.php";

// email e senha encodados em base64 e dps criptografado em md5
$emailSenha = "arthur2006.teixeira@gmail.com".":"."phpupgrade!";
$pwd = md5(base64_encode($emailSenha));
 
 

$header = [
    'Authorization: Bearer '.$pwd,
    'Content-Type: application/json'
];

$data = [

    'email' => "arthur2006.teixeira@gmail.com",
    'senha' => "phpupgrade!"

];

// inicio curl 
$curl = curl_init($url);

curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($data));

$response = curl_exec($curl);

curl_close($curl);
// print($response);
$responseArray = json_decode($response,true);

//  print_r($responseArray);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body{
    background-color: black;
    color: white;
}

    </style>
</head>
<body>
    
</body>
</html>