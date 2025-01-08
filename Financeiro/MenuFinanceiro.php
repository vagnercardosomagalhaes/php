<?php 
    //include('../protect.php');
    session_start(); 
    
    if(isset($_SESSION['database'])){
        // session_start();
        $bd = $_SESSION['database'];
        $usuario = $_SESSION['name'];
        $logo = $_SESSION['logomarca']; 
   
        $imagem_base64 = base64_encode($logo);
    }

   include('../conexao.php');

   if(isset($_GET['busca'])){ 
   $pesquisanome = $mysqli->real_escape_string($_GET['busca']); // Proteção contra sql inject ==> $mysqli->real_escape_string
     
        $sql_code = "SELECT * FROM reservas WHERE cliente like '%$pesquisanome%' order by codigo";
        $sql_query = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);

        //$sqlatend_coint_query = "select count(*) from reservas";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./Outros/css/site.css" media="screen" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3" style="background-color:#4682b4">
            <div class="container-fluid" style="background-color:#4682b4">
            <a><figure><img src="../LogoPrincipal_quadrada.png" class="img-fluid" style="width:150px"></figure></a>
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
                            <a class="nav-link" style="color:white" action="MenuFinanceiro">Financeiro</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <div  style="background-color:#4682b4"><label style="color:white">Usuário: <?php echo $_SESSION['name']; ?></label></div>
                    <div  style="background-color:#4682b4; margin-left: 10px;"><?php echo "<img src='data:image/jpeg;base64,{$imagem_base64}' alt='Imagem' style='width: 100px; max-width: 100px; height: auto;' />"; ?></div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
            
            <div class="text-center">
                <!--
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="../ClientesPF/Incluir.php" class="btn btn-primary" role="button" action="Incluir">Novo     Cliente</a>
                </div>
                -->            
            <h1>Financeiro</h1>
            <p>
            <!--    
            <form action="">
                <input type="text" name="busca" placeholder="Digite o nome a pesquisar" style="width: 300px;">
                <button type="submit" role=" button" class="btn btn-primary" >Pesquisar</button>
            </form>
            -->
            </p>

            <div class="table-responsive - xl" style="margin-top:150px;">                
                <a href="../Financeiro/Ctpg.php" type="button" class="btn btn-danger btn-lg btn-block" role="button">Contas a pagar</a>
                <a href="../Financeiro/Saida.php" type="button" class="btn btn-danger btn-lg btn-block" role="button">Saídas Monetárias</a>
                <a href="../Financeiro/Ctrec.php" type="button" class="btn btn-success btn-lg btn-block" role="button">Contas a Receber</a>
                <a href="../Financeiro/Entrada.php" type="button" class="btn btn-success btn-lg btn-block" role="button">Entradas Monetárias</a>
            </div>
        </div>




    <div class="container"  style="padding-top: 560px;">
        <main role="main" class="pb-3">
            
        </main>
    </div>
    <footer class="border-top footer text-muted">
        
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> 
</body>
</html>