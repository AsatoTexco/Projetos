<?php


class Usuario{

    private $pdo;
    public $msgErro = "";
    
    public function conectar($nomeDb, $host,$user,$pwd){
        
        global $pdo;
        try{

            $pdo = new PDO("mysql:dbname=".$nomeDb,$user,$pwd);
             

        }catch(PDOException $erro){

           $msgErro = $erro->getMessage();
            echo($msgErro);

        }



    }
    public function cadastrar($email,$senha,$nome){

        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM user WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0 ){

            return false;

        }else{

            $sql = $pdo->prepare("INSERT INTO user(email,senha,nome) VALUES(:e,:s,:n)");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->bindValue(":n",$nome);
           
            $sql->execute();

             
            return True;

        }
    }
    public function logar($email,$senha){

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM user WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount() > 0 ){

            $dados_user = [];
            $dados_user = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($dados_user as $row_user){
                $id = $row_user['id_user'];
                $name = $row_user['nome'];
                $email = $row_user['email'];
                $senha = $row_user['senha'];

            }

            $dados_userArray = [

                'id'=> $id,
                'name' => $name,
                'email'=> $email,
                'senha' => $senha

            ];

            $dados_userJson = json_encode($dados_userArray);
            session_start();
            setcookie("dados_logado",$dados_userJson,time()+ 5*60);
            $_SESSION['id_user'] = $id;

            return true;



        }else{

            return false;

        }


    }
    public function dados($id){

        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM user WHERE id_user = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        if($sql->rowCount() > 0){

            $dados = [];
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($dados as $row_dados){
    
                $id = $row_dados['id_user'];
                $nome = $row_dados['nome'];
                $email = $row_dados['email'];
                $senha = $row_dados['senha'];
    
            }
    
            $dadosArray = [
                'id_user' => $id,
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            ];

            return $dadosArray;


        }else{
            return false;
        }

    }
    public function deslogar(){

        setcookie("id_user",'', - time() * 9999 );
        unset($_SESSION['id_user']);

    }
    


}



?>