<?php 
    //include('../protect.php');
    $totlist = 0.00;
    $data1=null;
    $data2=null;
    
    //if(!isset($_SESSION)){
    //  session_start(); 
    //}
   //include('../conexao.php');
   $totlist = 0;
   //include('../protect.php');
   session_start(); 
   //if(!isset($_SESSION)){
   //   session_start(); 
   //}
   if(isset($_SESSION['database'])){
       // session_start();
       $bd = $_SESSION['database'];
       $usuario = $_SESSION['name'];
       $logo = $_SESSION['logomarca']; 
   
       $imagem_base64 = base64_encode($logo);
   }

  include('../conexao.php');

   if(isset($_GET['busca1']) && $_GET['busca2']){ 
   $pesquisanome = $mysqli->real_escape_string($_GET['busca1']); // Proteção contra sql inject ==> $mysqli->real_escape_string
     
        $sql_code = "SELECT origem, valor ,codvend,devedor,data,discrimina,moeda FROM ctrec order by data";
        $sql_query = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);

        //$sqlatend_coint_query = "select count(*) from reservas";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Financeiro</title>
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
                            <a  href="../Vendas/Vendas.php" class="nav-link" style="color:white" action="ListaVenda">Listagem de Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Financeiro/MenuFinanceiro.php" class="nav-link" style="color:white" action="MenuFinanceiro">Financeiro</a>
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
                <h1>Contas a Receber</h1>
                <p>
                    <form class="form-inline" action="">
                        <label class="my-1 mr-2" style="margin-left: 20px;">Período de: </label>
                        <input type="date" name="busca1" value="<?php echo $data1; ?>" placeholder="99/99/9999" style="width: 150px;">

                        <label class="my-1 mr-2" style="margin-left: 15px;"> até: </label>
                        <input type="date" name="busca2" value="<?php echo $data2; ?>" placeholder="99/99/9999" style="width: 150px;">
                        <button type="submit" role=" button" class="btn btn-primary" style="margin-left: 10px;" >Listar contas</button>

                       <!-- <label class="my-1 mr-2" style="margin-left: 20px;">Total do Período:<?php echo $totlist; ?> </label> -->

                        

                    </form>
                
                </p>
            </div>

            <div class="table-responsive - xl">
                <table class="table table-striped">
                    <thead>
                        <tr class="table">
                            <!-- <th colspan="1" scope="col" class="text-xl-start">#</th> -->
                            <th colspan="1" scope="col" class="text-xl-start">Data</th>
                            <th colspan="1" scope="col" class="text-xl-start">Banco</th>
                            <th colspan="1" scope="col" class="text-xl-start">Valor</th>
                            <th colspan="1" scope="col" class="text-xl-start">Moeda</th>
                            <th colspan="1" scope="col" class="text-xl-start">Venda</th>
                            <th colspan="1" scope="col" class="text-xl-start">Devedor</th>
                            <th colspan="1" scope="col" class="text-xl-start">Descrição</th>                            
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            if(!isset($_GET['busca1'])){
                         ?>
                            <tr>
                                <td colspan="3">Digite algum período para pesquisar...</td>
                            </tr>   
                            
                        <?php    
                        } else {
                            $data1 = $mysqli->real_escape_string($_GET['busca1']); // Proteção contra sql inject ==> $mysqli->real_escape_string
                            $data2 = $mysqli->real_escape_string($_GET['busca2']); // Proteção contra sql inject ==> $mysqli->real_escape_string                            
                            
                            $sql_code2 = "SELECT valor, data FROM ctrec WHERE data >= '$data1' AND data <= '$data2' GROUP BY data ORDER BY data";
                            $sql_query = $mysqli->query($sql_code2) or die("Erro na tentativa de consulta: " . $mysqli->error);
                            $totlist = 0;
                            if($sql_query->num_rows > 0){

                                $totlist = 0;
                                while($dados2 = $sql_query->fetch_assoc()){
                                    $totlist += floatval($dados2['valor']);
                                }
                                $totlist = number_format($totlist, 2, ',', '.');

                            }else{
                                $totlist = number_format(0, 2, ',', '.');
                            }
                            ?>
                            <h7 style="color: blue;">Total do Período: </h7> <?php
                            print $totlist;
                            
                            $sql_code = "SELECT origem, valor, codvend,devedor,data,discrimina,moeda FROM ctrec  where data>= '$data1' and  data<= '$data2' order by data";

                            $sql_query = $mysqli->query($sql_code) or die("ERRO na tentativa de consulta" . $mysqli->error);

                             if($sql_query->num_rows == 0){
                                ?>
                                <tr>
                                    <td colspan="3">Nenhum resultado encontrado...</td>
                                </tr>
                                <?php
                                } 
                                else
                                {
                                while($dados = $sql_query->fetch_assoc())
                                {
                                    ?>
                                    <tr>
                                        <?php                                                    
                                        $data = $dados['data'];
                                        $Dtformatada = date('d/m/Y', strtotime($data));
                                        $numvend = strval($dados['codvend']);
                                                                                            
                                        ?>
                                        
                                        <!-- <th colspan="1" scope="row" style="visibility:hidden">@cliente.id</th> -->
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo ($Dtformatada); ?> </td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo $dados['origem']; ?></td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo number_format($dados['valor'],2, ',','. '); ?></td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo $dados['moeda']; ?></td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo $numvend; ?></td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo $dados['devedor']; ?></td>
                                        <td class="text-start align-middle" style="font-size: 12px; height: auto; padding: 4px;" colspan="1"><?php echo $dados['discrimina']; ?></td>
                                        <? $totlist = floatval($totlist) + floatval($dados['valor']); ?>
                                                                
                                    </tr>
                                    <?php
                                }
                                } 
                                ?>
                            <?php 
                        }?>
                    </table> 
                    </tbody>
                </table>
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