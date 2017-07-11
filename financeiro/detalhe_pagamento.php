<?php

session_start();
if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
    header("Location: index.php");
    exit;
}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "select * from forma_pagamento WHERE codigo=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);

$codigo = $resultado->codigo;
$descricao = $resultado->descricao;
$acrescimo = $resultado->acrescimo;
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
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
	rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script'
	rel='stylesheet' type='text/css'>
<link
	href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'
	rel='stylesheet' type='text/css'>
<link
	href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
	rel='stylesheet' type='text/css'>

<!-- Theme CSS -->
<link href="../css/agency2.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

	<?php
    include ("../menu.php")
     ?>
	<!-- Header -->
	<header>
		<div class="container">

			<div class="intro-text">
				<div class="intro-lead-in"></div>

			</div>
		</div>
	</header>

	<section id="clients">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="glyphicon glyphicon-floppy-disk"></i>Informações da forma de pagamento
							</h2>
							<a href="index_pagamento.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">

							<div class="row">
								<div class="col-md-4">
									<h5>
										<b>Código: </b><span id="dados_cliente"> <?=$codigo?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Descrição: </b><span id="dados_cliente"> <?=$descricao?></span>
									</h5>
								</div>
                <div class="col-md-4">
  								<h5>
  									<b>Acrescimos: </b><span id="dados_cliente"> <?=$acrescimo?></span>
  								</h5>
  							</div>
							</div>

							</div>
						</div>
					</div>
				</div>
        <?php
            include ("../footer.php");
        ?>
