<?php

include('conexaoBDCaster.php'); // Conexão com o banco usando $mysqli2
$cnpj = null;
$razao = null; // Variável padrão
$banco = null;
$mensagem = "Empresa:";

// Processa a submissão do formulário

if (isset($_POST['cnpj'])) {
    $cnpj = $mysqli2->real_escape_string($_POST['cnpj']);

    // Query para buscar o CNPJ

    $sql_cnpj = "SELECT razao, cgc, mysql_nomebd, autorizado FROM clientes WHERE cgc = '$cnpj'";
    $sql_query_cnpj = $mysqli2->query($sql_cnpj) or die("Erro ao conectar ao banco: " . $mysqli2->error);

    

    if ($sql_query_cnpj->num_rows > 0) 
    {
        $dados = $sql_query_cnpj->fetch_assoc();

        if ($dados['cgc'] === $cnpj && $dados['autorizado']=="SIM")
        {
            $razao = $dados['razao'];
            $banco = $dados['mysql_nomebd'];
            
            $mensagem = "Empresa: " . htmlspecialchars($razao);
            
            
        } 
        else
        {
            $mensagem = "CNPJ NÃO AUTORIZADO.";
        }
    }
    else
    {
        $mensagem = "CNPJ NÃO ENCONTRADO.";  
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação do usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./Outros/css/site.css" media="screen" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body style="background-color:cadetblue;">
<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3" style="background-color:#4682b4">
        <div class="container-fluid" style="background-color:#4682b4">
            <a><figure><img src="LogoPrincipal_quadrada.png" class="img-fluid" style="width:150px"></figure></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>                
        </div>
    </nav>
</header>

<div class="row" style="margin-left: 540px;">
<h2>Validação da empresa</h2>
</div>

<div class="col-7 mx-auto" style="padding-top: 50px;">
    <div class="alert alert-warning" role="alert" >
        <h3><?php echo $mensagem; ?></h3>
    </div>
    <form action="" method="POST" name="id">
        <div class="simple-login-container" style="align-content: center;">
       
            <div class="row">
                <div class="row">
                    <label>CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" value="<?php echo $cnpj; ?>" oninput="mascararCNPJ(this)" placeholder="00.000.000/0000-00" required>            
                </div> 
            </div>
            <p>
            <div class="row"> 
                <div class="row">   
                    <button action="" type="submit" class="btn btn-primary btn-lg">VALIDAR EMPRESA</button>
                </div>
            </div>
            </p>
            <div class="row" style="align-content: center;">               
                    <div class="row">    
                        <a href="logonUser.php?id=<?php echo $banco; ?>" class="btn btn-success btn-lg" role="button">VALIDAR USUÁRIO</button></a>
                    </div>
                </div> 
            
            <div class="col-md-10 form-group" style="visibility: hidden;">
                    <label>BD:</label>
                    <input type="text" class="form-control" name="bd" id="bd" value="<?php echo $banco; ?>" placeholder="">            
                </div> 

                <div class="col-md-10 form-group" style="visibility: hidden;">
                    <label>Empresa:</label>
                    <input type="text" class="form-control" name="empresa" id="empresa" value="<?php echo $razao; ?>" placeholder="">            
                </div> 
            </div>           
        </div>          
    </form>  
                
                    
                  
             
</div>
    
    <!--    
    <form action="logonUser.php" method="POST">
        <div class="simple-login-container" style="align-content: center;">               
               <div class="row">    
                    <a href="logonUser.php" type="submit" class="btn btn-success btn-lg" role="button">VALIDAR USUÁRIO</button></a>
               </div>                       
        </div>          
    </form>
    -->
</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    function mascararCNPJ(campo) {
                let valor = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
                valor = valor.replace(/^(\d{2})(\d)/, "$1.$2");
                valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
                valor = valor.replace(/\.(\d{3})(\d)/, ".$1/$2");
                valor = valor.replace(/(\d{4})(\d)/, "$1-$2");
                campo.value = valor;
            }
    </script>
</body>
</html>
