<?php 

    if(!isset($_SESSION)){
        session_start(); 
    }
   $bd = $_GET['id'];
     
  include('../conexao.php');


   // $bd = $_GET['id'];

   // $usuario='root';
   // $senha='123456';
   // $database=$bd;
   // $host='dados.caster.com.br';
   // $port=3306;
    
    $mysqli = new mysqli($host, $usuario, $senha, $database, $port); 

    if($mysqli -> error){
        die("Erro ao conectar com o banco de dados." .$mysqli->error);
    }   

    if (isset($_POST['usuario']) && isset($_POST['senha']))
    {
            $login = $mysqli->real_escape_string($_POST['usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            if($login != "" && $senha !="" ) {
                    $sql_code = "SELECT * FROM senha WHERE login='$login'";

                    $sql_query = $mysqli->query($sql_code) or die("Erro ao tentar conectar com o banco de dados." .$mysqli->error);            

                    //$qtde = $sql_query->num_rows;

                if($usuario = $sql_query->fetch_assoc())
                {
                        $tempsenha = $usuario['senha'];
                        
                        for($i=0; $i< strlen($tempsenha); $i++)
                        {
                            $char = substr($tempsenha, $i, 1);
                            $num = (ord($char) - 1 - $i) / 2;  
                            
                            $result .= chr($num);                    
                        }

                        print($result);

                        if($result == $senha && $usuario['login'] == $usuario)
                        {
                            session_start();
                            $_SESSION['name'] = $usuario['nome'];
                            $_SESSION['login'] = $usuario['login'];
                    
                            header("location:menu.php");
                        }                

                }
                if(!isset($_SESSION['login']))
                {
                    echo "Erro ao tentar fazer o login com esse usuário";
                } 
            }         
        
    }
       

?>
