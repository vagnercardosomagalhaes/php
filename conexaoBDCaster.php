<?php

$usuario='root';
$senha='123456';
$database='caster';
$host='localhost';
$port=3306;

$mysqli2 = new mysqli($host, $usuario, $senha, $database, $port); 

if($mysqli2 -> error){
    die("Erro ao conectar com o banco de dados." .$mysqli->error);
}

?>