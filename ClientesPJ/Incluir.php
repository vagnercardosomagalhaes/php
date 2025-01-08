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
    <form method="post" style="margin-left: 20px;">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Código:</label>
            <input type="text" asp-for="codigo" class="form-control" id="codigo" style="width: 150px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nome/Razão:</label>
            <input type="text" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço - Rua/Avenida:</label>
            <input type="text" style="width: 850px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label >Número:</label>
            <input type="text" style="width: 150px;" class="form-control" id="codigo" style="width: 150px;">
            <small id="codigo" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Complemento:</label>
            <input type="text" style="width: 850px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Bairro:</label>
            <input type="text" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cidade:</label>
            <input type="text" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Estado:</label>
            <input type="text" style="width: 100px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>CEP:</label>
            <input type="text" style="width: 150px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="text" style="width: 450px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <br />

        <!--
        <div class="text-center">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="../ClientesPF/Incluir.php" class="btn btn-primary" role="button" action="Incluir">Novo Cliente</a>
                </div>
        -->
        <button type="submit" class="btn btn-primary btn-lg">Gravar</button>    
        <a href="../ClientesPJ/ClientesPJgrade.php" class="btn btn-secondary btn-lg" role="button">Retornar</a>
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


