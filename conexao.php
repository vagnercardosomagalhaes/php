<?php   
  
  if(!isset($_SESSION)){
    session_start(); 
}    
  if(isset($_SESSION['database'])){
  // session_start();
      $bd = $_SESSION['database'];
  }

  if(isset($_SESSION['bdados'])){
    $bd = $_GET['id'];
    $_SESSION['bdados']= $_GET['id'];
  }

    $usuario='root';
    $senha='123456';
    //$database=$bd;
    $database=$bd;
    $host='localhost';
    $port=3306;

    // $mysqli = new mysqli($host,$usuario,$senha,$database);
    $mysqli = new mysqli($host, $usuario, $senha, $database, $port); 

    if($mysqli -> error){
        die("Erro ao conectar com o banco de dados." .$mysqli->error);
    }
    

?>