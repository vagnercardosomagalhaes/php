<?php 
    //include('../protect.php');

    if(!isset($_SESSION)){
        session_start(); 
     }
    include('../conexao.php');

    if(isset($_POST))
    {   
        $sql_code = "SELECT Max(codigo) as cod FROM clientes";

        $sql_query = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);

            if($sql_query->num_rows == 0){

               die("ERRO na tentativa de consulta" . $mysqli->error);
            } 
            else
            {
                while($dados = $sql_query->fetch_assoc()){

                    $ultimocodigo = $dados['cod'];
                    $novocdigo = $ultimocodigo + 1;
                }
            }                       

        $codcli = $novocdigo;
        $nomecli = $_POST['nome'];
        $endercli = $_POST['endereco'];
        $numcli = $_POST['logrnum'];
        $complcli = $_POST['logrcompl'];
        $bairrocli = $_POST['bairro'];
        $cidadecli = $_POST['cidade'];
        $estadocli = $_POST['estado'];
        $cepcli = $_POST['cep'];
        $telcli = $_POST['telefone1'];
        $emailcli = $_POST['email'];
                
        $sqlInsert = "insert into clientes (codigo, nome, endereco, logrnum, logrcompl, bairro, cidade, estado, cep, telefone1, email) VALUES ('$codcli', '$nomecli', '$endercli', '$numcli','$complcli','$bairrocli', '$cidadecli', '$estadocli', '$cepcli', '$telcli', '$emailcli')";        

        $sqlresultinsert = $mysqli->query($sqlInsert) or die("ERRO na tentativa de gravação dos dados" . $mysqli->error);
        //if($sqlresultinsert->num_rows > 0){
         echo('Registro cadastrado com sucesso.');       
        //header('Location: finaliza.php');    
        //}
    }
    
?>
