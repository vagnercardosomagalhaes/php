<?php 
    //include('../protect.php');

    if(!isset($_SESSION)){
       session_start(); 
    }
   include('../conexao.php');

   //print_r($_GET['id']);

    if(!empty($_GET['id']))
    {
        $codcli = $_GET['id'];

        //echo($codcli);

        $sql_code = "SELECT codigo, nome, endereco, bairro, cidade, telefone1, email, logrnum, logrcompl,estado, cep FROM clientes WHERE codigo = $codcli";

        $sqlresult = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);        

        if($sqlresult->num_rows > 0)
        {
           while($dados = $sqlresult->fetch_assoc())
           {
                $codcli = $dados['codigo'];
                $nomecli = $dados['nome'];
                $endercli = $dados['endereco'];
                $numcli = $dados['logrnum'];
                $complcli = $dados['logrcompl'];
                $bairrocli = $dados['bairro'];
                $cidadecli = $dados['cidade'];
                $estadocli = $dados['estado'];
                $cepcli = $dados['cep'];
                $telcli = $dados['telefone1'];
                $emailcli = $dados['email'];
           }
        }
        else
        {
            die("ERRO na tentativa de consulta" . $mysqli->error);
        }       

    }  
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Clientes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
<body>
<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3" style="background-color:#4682b4">
            <div class="container-fluid" style="background-color:#4682b4">
                <a><figure><img src="../LogoPrincipal_quadrada.png" class="img-fluid" style="width:250px"></figure></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between navbar navbar-dark" style="background-color:#4682b4">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link" style="color:white" action="Index">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Atendimentos/Atendgrade.php" class="nav-link" class="nav-link" style="color:white" action="Index">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../ClientesPF/ClientesPFgrade.php" class="nav-link" style="color:white"  action="Cliente">Clientes - Pessoa Física</a>
                        </li>
                        <li class="nav-item">
                            <a  href="../ClientesPJ/ClientesPJgrade.php" class="nav-link" style="color:white" action="ClientePJ">Clientes - Pessoa Jurídica</a>
                        </li>
                        <li class="nav-item">
                            <a  href="../Vendas/vendas.php" class="nav-link" style="color:white" action="ListaVenda">Listagem de Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Financeiro/MenuFinanceiro.php" class="nav-link" style="color:white" action="MenuFinanceiro">Financeiro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="text-center">
        <h1>Dados do cliente - Edição</h1>
    </div>
    <form method="post" action="update.php" style="margin-left: 20px;">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Código:</label>
            <input type="text" name="codigo" ID="codigo" value="<?php echo $codcli ?>" class="form-control" id="codigo" style="width: 150px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $nomecli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="nome" class="form-text text-muted"></small>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Endereço - Rua/Avenida:</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endercli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="endereco" class="form-text text-muted"></small>
            </div>
            
            <div class="form-group col-md-4">
                <label >Número:</label>
                <input type="text" name="logrnum" id="logrnum" value="<?php echo $numcli ?>" style="width: 150px;" class="form-control" id="codigo" style="width: 150px;">
                <small id="logrnum" class="form-text text-muted"></small>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Complemento:</label>
            <input type="text" name="logrcompl" id="logrcompl" value="<?php echo $complcli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1">
            <small id="logrcompl" class="form-text text-muted"></small>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Bairro:</label>
                <input type="text" name="bairro" id="bairro" value="<?php echo $bairrocli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1">
                <small id="bairro" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Cidade:</label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $cidadecli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1">
                <small id="cidade" class="form-text text-muted"></small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Estado:</label>
                <input type="text" name="estado" id="estado" value="<?php echo $estadocli ?>" style="width: 100px;" class="form-control" id="exampleInputEmail1">
                <small id="estado" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label>CEP:</label>
                <input type="text" name="cep" id="cep" value="<?php echo $cepcli ?>" style="width: 150px;" class="form-control" id="exampleInputEmail1">
                <small id="cep" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Telefone:</label>
                <input type="text" name="telefone1" id="telefone1" value="<?php echo $telcli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1">
                <small id="telefone1" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label>E-mail:</label>
                <input type="text" name="email" id="email" value="<?php echo $emailcli ?>" style="width: 450px;" class="form-control" id="exampleInputEmail1" >
                <small id="email" class="form-text text-muted"></small>
            </div>
        </div>
        <br />
       
        <button type="submit" class="btn btn-primary btn-lg" name="update" id="update">Gravar</button> 

        <a href="../ClientesPF/ClientesPFgrade.php" class="btn btn-secondary btn-lg" role="button">Retornar</a>
    </form>

<!-- ////////////////////  DEPENDENTES /////////////////// -->
    <div class="text-center">
   
    <h1>Dependentes</h1>
    </div>
    <form method="post" action="updateDepen.php" margin-left: 20px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome:</label>
            <input type="text" asp-for="codigo" class="form-control" id="codigo" style="width: 450px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>        
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail:</label>
            <input type="text" asp-for="codigo" class="form-control" id="codigo" style="width: 450px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>
       
        <br />
        <div class="table-responsive - lg">
        <table class="table table-striped">
            <thead>
                <tr class="table-active">
                    <th colspan="2" scope="col" class="text-xl-start">Código</th>
                    <th colspan="2" scope="col" class="text-xl-start">Nome</th>                   
                    <th colspan="2" scope="col" class="text-xl-start">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php                    
                     if(!isset($_GET['id']))
                     {

                     }
                     else{
                        $sql_code2 = "SELECT codigo, nome,email FROM clidepen WHERE codigo = $codcli";
                        $sqlresult2 = $mysqli->query($sql_code2) or die("ERRO na tentativa de consulta" . $mysqli->error);

                            if($sqlresult2->num_rows > 0)
                            {
                                ?>
                                <?php 
                                while($dados2 = $sqlresult2->fetch_assoc())
                                {
                                ?>
                                    <tr>
                                        <th colspan="2" scope="row"><?php echo $dados2['codigo']; ?></th>
                                        <td colspan="2" align="left"><?php echo $dados2['nome']; ?></td>
                                        <td colspan="2" align="left"><?php echo $dados2['email']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a role="button" class="btn btn-primary">Editar</a>
                                                <a href="../ClientesPF/ExcluirDepend.php" role="button" class="btn btn-danger">Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        
                                }
                            }
                        
                     }
                     
                ?>               
            </tbody>
        </table>
        </div>

    </form>
    <div class="container"  style="padding-top: 560px;">
            <main role="main" class="pb-3">
                
            </main>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> 
    </div>
</body>
</html>