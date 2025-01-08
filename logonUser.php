<?php

session_start();
$result = null;

if (isset($_GET['id'])) {
    $bd= $_GET['id'];
    $_SESSION['database'] = $bd; 
}

if (isset($_GET['usuario'])) {
    $usuario = 'root';
    $senha = '123456';
    $database = $_SESSION['database'];
    $host = 'localhost';
    $port = 3306;

    

    $mysqli = new mysqli($host, $usuario, $senha, $database, $port);

    if ($mysqli->connect_error) {
        die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    
    
    if (isset($_GET['usuario']) || isset($_GET['senha'])) 
    {
        if (strlen($_GET['usuario']) == 0)
        {
            echo "Digite o Login do usuário.";
        }
        else if (strlen($_GET['senha']) == 0)
        {
            echo "Digite a Senha do usuário.";   
        }
        else 
        {

            $login = $mysqli->real_escape_string($_GET['usuario']);
            $senha = $mysqli->real_escape_string($_GET['senha']);

           // $login = isset($_GET['usuario']);
           // $pws = isset($_GET['senha']);

            if ($login != "" && $senha != "") {

                $sql_code="SELECT * FROM senha WHERE login = '$login'";

                $sql_query=$mysqli->query($sql_code) or die("Erro ao conectar o banco de dados." .$mysqli->error);
                    
                $qtde = $sql_query->num_rows;
                
                if($qtde == 1)
                {                    
                        $usuario = $sql_query->fetch_assoc();
                                        
                        $tempsenha = $usuario['senha'];
                        
                        for($i=0; $i< strlen($tempsenha); $i++)
                        {
                            $char = substr($tempsenha, $i, 1);
                            $num = (ord($char) - 1 - $i) / 2;  
                            
                            $result = $result . chr($num);                    
                        }

                        print($result);

                        $sql_logo="SELECT logomarca FROM cab";
                        $sql_query2=$mysqli->query($sql_logo) or die("Erro ao conectar o banco de dados." .$mysqli->error);
                    
                        $qtde2 = mysqli_fetch_array($sql_query2,
                        MYSQLI_ASSOC);

                        $data = $qtde2["logomarca"];

                        //echo base64_decode($data);
                        //echo '<img src="data:image/gif;base64,' . $data . '" />';    



                        if($result == $senha && $usuario['login'] == $login)
                        {
                            session_start();
                            $_SESSION['name'] = $usuario['nome'];
                            $_SESSION['login'] = $usuario['login'];
                            $_SESSION['logomarca'] = $data;
                    
                            header("location:menu.php");
                        }
                        
                    

                    if(!isset($_SESSION['login']))
                    {
                        echo "Erro ao tentar fazer o login com esse usuário";
                        
                    }
                }
                else
                {
                    echo "Usuário não encontrado.";

                } 
            } 
            else
            {
                echo "Por favor, preencha login e senha do usuário.";
            }
        }

        
    }


}



/*
if(!isset($_GET['usuario'])){
    
    session_start();

    if (isset($_GET['id'])) {
    
        $bd = $_GET['id'];

        if (!isset($_SESSION[$bd])) {
            $_SESSION[$bd] = $_GET['id'];
        }
    }
        
}

  if(isset($_GET['usuario'])){

        $usuario='root';
        $senha='123456';
        $database= $_SESSION[$bd];
        $host='localhost';
        $port=3306;

        print($database . "XXXXXXXX");

    $temp = $_GET['usuario'];
    print($temp);
    print($database . "MMMMM");

    // $mysqli = new mysqli($host,$usuario,$senha,$database);
    $mysqli = new mysqli($host, $usuario, $senha, $database, $port); 

    if($mysqli -> error){
        die("Erro ao conectar com o banco de dados." .$mysqli->error);
    }
      
        if (isset($_POST['usuario']) && isset($_POST['senha']))
        {
                $login = $mysqli->real_escape_string($_POST['usuario']);
                $senha = $mysqli->real_escape_string($_POST['senha']);

                print $login;
                print $senha;

                if($login != "" && $senha !="" ) {
                   $sql_code = "SELECT * FROM senha WHERE login='$login'";

                   $sql_query = $mysqli->query($sql_code) or die("Erro ao tentar conectar com o banco de dados." .$mysqli->error);            

                        //$qtde = $sql_query->num_rows;

                    if($usuario = $sql_query->fetch_assoc())
                    {
                            $tempsenha = $usuario['senha'];
                            
                            for($i=0; $i< strlen($tempsenha); $i++)
                            {
                                $char = substr($tempsenha, $i, 1);
                                $num = (ord($char) - 1 - $i) / 2;  
                                
                                $result .= chr($num);                    
                            }

                            print($result);

                            if($result == $senha && $usuario['login'] == $usuario)
                            {
                                session_start();
                                $_SESSION['name'] = $usuario['nome'];
                                $_SESSION['login'] = $usuario['login'];
                        
                                header("location:menu.php");
                            }                

                    }
                    if(!isset($_SESSION['login']))
                    {
                        echo "Erro ao tentar fazer o login com esse usuário";
                    } 
                }         
            
        }else
        {
        PRINT $result;
        PRINT $tempsenha;
        }
    }

*/
 //**************************************** */

    /*
include('conexao.php');
 
 if(!isset($_SESSION)){
    session_start(); 
 }

 if(!empty($_GET['id'])){
        $bd = $_GET['id'];
 }

if(!empty($_GET['id'])){
        if(isset($_POST['bd'])){

            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                // Recupera os dados enviados
                $bd = $_POST['bd'] ?? 'Não informado';
                $empresa = $_POST['empresa'] ?? 'Não informado';
            
                // Evita injeção de código ou caracteres indesejados
                $bd = htmlspecialchars($bd);
                $empresa = htmlspecialchars($empresa); 
                
            } 
            else
            {
            echo "<p>Nenhum dado foi enviado.</p>";
            }

            include('conexao.php'); 
        }
    

    if (isset($_POST['usuario']) && isset($_POST['senha']))
    {
            $login = $mysqli->real_escape_string($_POST['usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            if($login != "" && $senha !="" ) {
                    $sql_code = "SELECT * FROM senha WHERE login='$login'";

                    $sql_query = $mysqli->query($sql_code) or die("Erro ao tentar conectar com o banco de dados." .$mysqli->error);            

                    //$qtde = $sql_query->num_rows;

                if($usuario = $sql_query->fetch_assoc())
                {
                        $tempsenha = $usuario['senha'];
                        
                        for($i=0; $i< strlen($tempsenha); $i++)
                        {
                            $char = substr($tempsenha, $i, 1);
                            $num = (ord($char) - 1 - $i) / 2;  
                            
                            $result .= chr($num);                    
                        }

                        print($result);

                        if($result == $senha && $usuario['login'] == $usuario)
                        {
                            session_start();
                            $_SESSION['name'] = $usuario['nome'];
                            $_SESSION['login'] = $usuario['login'];
                    
                            header("location:menu.php");
                        }                

                }
                if(!isset($_SESSION['login']))
                {
                    echo "Erro ao tentar fazer o login com esse usuário";
                } 
            }         
        
    }
}
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação do usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./Outros/css/site.css" media="screen" />
</head>
<body style="background-color:brown;">
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
    <p></p>    
<div class="col-3 mx-auto" style="padding-top: 50px;">
<div class="text-center">
    <!--- <img id="profile-img"  src="LogoPrincipal_quadrada.png" height="268" width="134"/> --->
    <!-- <h5><?php echo $_POST['empresa']; ?></h5> -->
</div>

</div class="text-center">
    <form action="">
        <div class="simple-login-container">
                <h2>Validação do usuário</h2>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Usuário:</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu Login">            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                    </div>
                </div>
            <p>
                <div class="row"> 
                    <div class="col-md-12 form-group">   
                        <button type="submit" role="button" class="btn btn-block btn-success">ENTRAR</button>
                    </div>
                </div>
            </p>           
        </div>          
    </form>    
    <div class="container">
    <main role="main" class="pb-3">
        
    </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>   
    
</body>
</html>