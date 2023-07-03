<?php
session_start();
require './Classes/Usuario.php';


 


$passDb = '$uP0rT3@22';

$usuario = new Usuario;

$usuario->conectar('api','localhost','root',$passDb);
if($usuario->msgErro != ""){
    /*SWEETALERT2?!*/
    echo("Houve um erro ao conectar no servidor, tente novamente mais tarde");
}


 

if(isset($_COOKIE['dados_logado'])){

    $dados_logadoArray = json_decode($_COOKIE['dados_logado'],true);
    
    $_SESSION['id_user'] = $dados_logadoArray['id'];
  
     
    // cookie ficara setado para 2 dias como LOGADO 
    setcookie("id_user",$_COOKIE['id_user'],time() + (2*24*60*60));
    header("Location: ./pages/menu.php");
    
}else{


     if(isset($_POST['email']) and isset($_POST['senha'])){
    
        if($usuario->logar($_POST['email'],$_POST['senha'])){
    
            $lista = [];
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($lista as $row_user){
    
                $id_user = $row_user['id_user'];
    
            }
            $_SESSION['id'] = $id_user;
    
            setcookie("id_user",$id_user,time()+5);
            echo("Logado com Sucesso!");
    
        }
    } 
}
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

*{
    margin: 0;
    padding: 0;
}
body{
    color: white;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    background-image: linear-gradient(45deg,#003d0b,black, #003d0b);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    

}

.content_login{

    width: 350px;
    height: 400px;
    background-color: black;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    position: relative;

}
.area_input{

    width: 80%;
    position: relative;
    margin-top: 30px;
     
}
.input_login{
    position: absolute;
    background-color: transparent;
    width: 100%;
    border: none;
    outline: none;
    color: white;

}
.line{

    height: 1px;
    width: 100%;
    background-color: white;

}
.label_input{
    top: 0;
    position: relative;
    transition: .2s;
    pointer-events: none;
}
.line::after{

    content: "";
    position: absolute;
    height: 1px;
    width: 0;
    background-color: green;
    transition: 1s;

}
.input_login:valid ~ .label_input, .input_login:focus ~ .label_input{

    top: -20px;
}
.input_login:valid ~ .line::after, .input_login:focus ~ .line::after{

    width: 100%;

}
.area_button{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn_sub{

    height: 30px;
    width: 70%;
    background-color: white;
    color: black;
    font-size: 24px;
    border-radius: 15px;
    transition: .5s;
    border: none;
    outline: none;
    cursor: pointer;

}
.btn_sub:hover{

    background-color: #003d0b;
    color: white;

}

</style>
</head>
<body>

    <div class="area_login">

        <form action="" method="post" class="content_login">
            <h1>Entrar</h1>
            <div class="area_input">

                <input class="input_login" name="email" required="" type="text">
                <label class="label_input" for="">E-Mail</label>
                <div class="line"></div>

            </div>

            <div class="area_input">

                <input class="input_login" name="senha" required="" type="text">
                <label class="label_input" for="">Senha</label>
                <div class="line"></div>

            </div>

            <div class="area_button">

                <button class="btn_sub" type="submit">Entrar</button>

            </div>
        </form>

    </div>
    
</body>
</html>