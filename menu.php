<?php 
   // include('../protect.php');
   session_start(); 
   
   if(isset($_SESSION['database'])){
   // session_start();
   $bd = $_SESSION['database'];
   $usuario = $_SESSION['name'];
   $logo = $_SESSION['logomarca']; 
   
   $imagem_base64 = base64_encode($logo);
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
    <!-- <link rel="stylesheet" type="text/css" href="./Outros/css/site.css" media="screen" /> -->
</head>
<body>
<header>
       
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3" style="background-color:#4682b4">
            <div class="container-fluid" style="background-color:#4682b4">
            <a><figure><img src="LogoPrincipal_quadrada.png" class="img-fluid" style="width:150px"></figure></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between navbar navbar-dark" style="background-color:#4682b4">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link" style="color:white" action="Index">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="../InfoturWeb/Atendimentos/AtendGrade.php" class="nav-link" class="nav-link" style="color:white" action="Index">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../InfoturWeb/ClientesPF/ClientesPFgrade.php?id=<?php echo $bd; ?>"  style="color:white" class="nav-link" action="Cliente">Clientes - Pessoa Física</a>
                        </li>
                        <li class="nav-item">
                            <a  href="../InfoturWeb/ClientesPJ/ClientesPJgrade.php?id=<?php echo $bd; ?>" class="nav-link" style="color:white" action="ClientePJ">Clientes - Pessoa Jurídica</a>
                        </li>
                        <li class="nav-item">
                            <a href="../InfoturWeb/Vendas/Vendas.php?id=<?php echo $bd; ?>" class="nav-link" style="color:white" action="ListaVenda">Listagem de Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a href="../InfoturWeb/Financeiro/MenuFinanceiro.php" class="nav-link" style="color:white" action="MenuFinanceiro">Financeiro</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <div  style="background-color:#4682b4"><label style="color:white">Usuário: <?php echo $_SESSION['name']; ?></label></div>                    
                    <div  style="background-color:#4682b4; margin-left: 10px;"><?php echo "<img src='data:image/jpeg;base64,{$imagem_base64}' alt='Imagem' />"; ?></div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="container"  style="padding-top: 560px;">
        <main role="main" class="pb-3">
            <p>
                <a href="logout.php">Sair</a>
            </p>
        </main>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> 
</body>
</html>