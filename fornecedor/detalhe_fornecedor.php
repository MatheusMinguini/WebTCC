<?php

		session_start();
		if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
		    header("Location: index.php");
		    exit;
		}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "select * from fornecedor WHERE codigo=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);

$codigo = $resultado->codigo;
$nome = $resultado->nome;
$cnpj = $resultado->cnpj;
$cidade = $resultado->cidade;
$estado = $resultado->estado;
$celular = $resultado->celular;
$email= $resultado->email;
$telefone = $resultado->telefone;

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

<!-- sweet alert -->
<script
	src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

<!-- mensagens -->
<script src="../js/mensagens.js"></script>

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
								<i class="glyphicon glyphicon-floppy-disk"></i> Informações do
								Fornecedor
							</h2>
							<a href="index_fornecedor.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">

              <div class="page-header">
                <h4 id="cabecalho-form-cliente" align="left">Gerais</h4>
              </div>

							<div class="row">
								<div class="col-md-4">
									<h5>
										<b>Código: </b><span id="dados_cliente"> <?=$codigo?></span>
									</h5>
								</div>

								<div class="col-md-4">
									<h5>
										<b>nome: </b><span id="dados_cliente"> <?=$nome?></span>
									</h5>
								</div>

								<div class="col-md-4">
									<h5>
										<b>CNPJ/CPF: </b><span id="dados_cliente"> <?=$cnpj?></span>
									</h5>
								</div>
							</div>

							<div class="page-header">
								<h4 id="cabecalho-form-cliente" align="left">Localização</h4>
							</div>
              <div class="row">
              <div class="col-md-4">
								<h5>
									<b>Cidade: </b><span id="dados_cliente"> <?=$cidade?></span>
								</h5>
							</div>
							<div class="col-md-4">
								<h5>
									<b>Estado: </b><span id="dados_cliente"> <?=$estado?></span>
								</h5>
							</div>
							</div>
							<br>




							<div class="page-header">
								<h4 id="cabecalho-form-cliente" align="left">Contato</h4>
							</div>
							<div class="row">

								<div class="col-md-4">
									<h5>
										<b>Telefone: </b><span id="dados_cliente"> <?=$telefone?></span>
									</h5>
								</div>

								<div class="col-md-4">
									<h5>
										<b>Celular: </b><span id="dados_cliente"> <?=$celular?></span>
									</h5>
								</div>

                <div class="col-md-4">
                  <h5>
                    <b>E-mail: </b><span id="dados_cliente"> <?=$email?></span>
                  </h5>
                </div>
							</div>

						</div>
					</div>
				</div>
				<div class="row text-center">
