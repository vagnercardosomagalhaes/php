<?php 
    //include('../protect.php');

    if(!isset($_SESSION)){
        session_start(); 
     }
    include('../conexao.php');

    if(isset($_POST))
    {   
        $nometitular = $_POST['nome'];

        $sql_code = "SELECT codigo FROM clientes where nome like '$nometitular'";

        $sql_query = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);

            if($sql_query->num_rows == 0){

               die("ERRO na tentativa de consulta" . $mysqli->error);
            } 
            else
            {
                while($dados = $sql_query->fetch_assoc()){

                    $codigodepen = $dados['codigo'];                    
                }
            }                       

        $codclidepen = $codigodepen;
        $nomeclidepen = $_POST['nomedepen'];
        $telclidepen = $_POST['teldepen'];
        $emailclidepen = $_POST['email'];        
                
        $sqlInsertdepen = "insert into cliedepen (codigo, nome, cel, email) VALUES ('$codclidepen', '$nomeclidepen','$telclidepen', '$emailclidepen')";        

        $sqlresultinsertdepen = $mysqli->query($sqlInsertdepen) or die("ERRO na tentativa de gravação dos dados" . $mysqli->error);
        
    }
    ?>