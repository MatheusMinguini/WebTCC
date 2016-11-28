<?php
session_start();
if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mara Modas - Software</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- sweet alert -->
    <script src="css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

    	<!-- mensagens -->
    	<script src="js/mensagens.js"></script>


</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="usuario/index_usuario.php"><i class="fa fa-user"></i> Usuários</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="cliente/index_cliente.php"><i class="fa fa-users"></i> Clientes</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="fornecedor/index_fornecedor.php"><i class="glyphicon gyphicon-truck"></i> Fornecedores</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="produto/index_produto.php"><i class="fa fa-tags"></i> Produtos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="venda/formVenda.php"><i class="fa fa-shopping-cart"></i> Vendas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="financeiro/index_financeiro.php"><i class="fa fa-usd"></i> Financeiro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="relatorio/relatorio_index.php"><i class="fa fa-list-alt"></i> Relatórios</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#" onclick="confirma_logout();"><i class="glyphicon glyphicon-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">


              </div>
            </div>
        </div>
    </header>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <span > <i class="glyphicon glyphicon-copyright-mark"></i> Minguini's - Todos os direitos reservados - versão 1.0.0 </span>
                    <br>
                    <span > Criado por Matheus Simões Minguini e Vinicius Guellis - 2016 </span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://www.facebook.com/mara.goncalves.7796?fref=ts"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/mara.goncalves.7796?fref=ts"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/mara.goncalves.7796?fref=ts"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
