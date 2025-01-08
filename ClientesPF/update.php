<?php 
    //include('../protect.php');

    if(!isset($_SESSION)){
        session_start(); 
     }
    include('../conexao.php');

    if(isset($_POST['update']))
    {
        $codicli = $_POST['codigo'];
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

        $sqlUpdate = "update clientes set nome='$nomecli', endereco='$endercli', logrnum='$numcli', logrcompl='$complcli', bairro='$bairrocli', cidade='$cidadecli', estado='$estadocli', cep='$cepcli', telefone1='$telcli', email='$emailcli' where codigo='$codicli'";

        $sqlresult = $mysqli->query($sqlUpdate) or die("ERRO na tentativa de gravação dos dados" . $mysqli->error);
    }
    header('Location: finaliza.php');

?>