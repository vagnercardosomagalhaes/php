<?php 
    //include('../protect.php');

    if(!isset($_SESSION)){
       session_start(); 
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
                <a><figure><img src="../LogoPrincipal1.png" class="img-fluid" style="width:250px"></figure></a>
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
                            <a href="../Atendimentos/AtendGrade.php" class="nav-link" class="nav-link" style="color:white" action="Index">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../ClientesPF/ClientesPFgrade.php"  style="color:white" class="nav-link" action="Cliente">Clientes - Pessoa Física</a>
                        </li>
                        <li class="nav-item">
                            <a  href="../ClientesPJ/ClientesPJgrade.php" class="nav-link" style="color:white" action="ClientePJ">Clientes - Pessoa Jurídica</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Vendas/Vendas.php" class="nav-link" style="color:white" action="ListaVenda">Listagem de Vendas</a>
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
        <h1>Dados do cliente - Inclusão</h1>
    </div>
    <form method="POST" action="insertpf.php" style="margin-left: 20px;">
        
        <div class="form-group" style="display: none";>
            <label for="exampleInputEmail1">Código:</label>
            <input type="text" name="codigo" class="form-control" id="codigo" style="width: 150px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Nome:</label>
            <input type="text" style="width: 450px;" class="form-control" id="nome" name="nome">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Endereço - Rua/Avenida:</label>
                <input type="text" style="width: 450px;" class="form-control" id="endereco" name="endereco">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label >Número:</label>
                <input type="text" style="width: 150px;" class="form-control" id="logrnum" name="logrnum" style="width: 150px;">
                <small id="codigo" class="form-text text-muted"></small>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Complemento:</label>
            <input type="text" style="width: 450px;" class="form-control" id="logrcompl" name="logrcompl" id="logrcompl">
            <small id="logrcompl" class="form-text text-muted"></small>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Bairro:</label>
            <input type="text" style="width: 450px;" class="form-control" id="bairro" name="bairro">
            <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Cidade:</label>
            <input type="text" style="width: 450px;" class="form-control" id="cidade" name="cidade">
            <small id="cidade" class="form-text text-muted"></small>
            </div>
        </div>            
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Estado:</label>
                <input type="text" style="width: 100px;" class="form-control" id="estado" name="estado">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label>CEP:</label>
                <input type="text" style="width: 150px;" class="form-control" id="cep" name="cep">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Telefone:</label>
                <input type="text" style="width: 450px;" class="form-control" id="telefone1" name="telefone1">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-4">
                <label>E-mail:</label>
                <input type="text" style="width: 450px;" class="form-control" id="email" name="email">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <br />
        <!--
        <div class="text-center">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="../ClientesPF/Incluir.php" class="btn btn-primary" role="button" action="Incluir">Novo Cliente</a>
                </div>
        -->
        <button type="submit" name="insert" VALUE="Gravar"  id="insert"  class="btn btn-primary btn-lg">Gravar</button>
            
        <a href="../ClientesPF/ClientesPFgrade.php" class="btn btn-secondary btn-lg" role="button">Retornar</a>
    </form>

    <div class="text-center">
    <h1>Dependentes</h1>
    </div>

    <form method="post" action="insertDEPEN_pf.php" style="margin-left: 20px;">        
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nomedepen" class="form-control" id="nomedepen" style="width: 450px;">
            <small id="nomedepn" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="teldepen" class="form-control" id="teldepen" style="width: 450px;">
            <small id="teldepen" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="text" name="emaildepen" class="form-control" id="emaildepen" style="width: 450px;">
            <small id="emaildepen" class="form-text text-muted"></small>
        </div>
        
        <form action="">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a class="btn btn-primary btn-lg" role="button" type="submit" name="insertdepen" VALUE="Gravar"  id="insertdepen" >Incluir Dependente</a>
            </div>
        </form>

        <br />

        <div class="table-responsive - lg">
        <table class="table table-striped">
            <thead>
                <tr class="table-active">
                    <th colspan="2" scope="col" class="text-xl-start">Código</th>
                    <th colspan="2" scope="col" class="text-xl-start">Nome</th>
                    <th colspan="2" scope="col" class="text-xl-start">Telefone</th>
                    <th colspan="2" scope="col" class="text-xl-start">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   if(!isset($_GET['insertdepen'])){                   
                ?>      
                   }
                   <tr>
                        <td colspan="3">Nenhnum dependente cadastrado</td>
                   </tr>
                <?php
                } else {
                
                     $sql_depen = "SELECT codigo, nome, cel, email FROM clidepen WHERE codigo = '%$codigotitular%'";

                     $sql_query = $mysqli->query($sql_depen) or die("ERRO na tentativa de consulta" . $mysqli->error);   
                     if($sql_query->num_rows == 0){
                        ?>   
                        <tr>
                            <td colspan="3">Nenhum dependente cadastrado</td>
                        </tr>   
                        <?php
                            } 
                            else
                                {
                                    while($dados = $sql_query->fetch_assoc())
                                    {
                                        ?>
                                        <tr>
                                        <!-- <th colspan="2" scope="row">1</th> -->
                                        <td colspan="2" align="left"><?php echo $dados['nome']; ?></td>
                                        <td colspan="2" align="left"><?php echo $dados['cel']; ?></td>
                                        <td colspan="2" align="left"><?php echo $dados['email']; ?></td>
                                        <td>
                                            
                                            <div class="btn-group" role="group">
                                                <a role="button" class="btn btn-primary" style="visibility: hidden;">Editar</a>
                                                <a href="../ClientesPF/ExcluirDepend.php" role="button" class="btn btn-danger">Excluir</a>
                                            </div>                      
                    
                                        </td>
                                        </tr> 
                                    <?php      
                                    }
                                }
                             ?>
                    <?php
                 }?>         
              
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


