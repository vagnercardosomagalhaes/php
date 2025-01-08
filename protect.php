<?php 

    if(!isset($_SESSION)){
       session_start(); 
    }

    if(!isset($_SESSION['login'])){
        die("Usuário não está logado no sistema.<p><a href=\"../index.php\">Entrar</a></p>"); 
     }


?>