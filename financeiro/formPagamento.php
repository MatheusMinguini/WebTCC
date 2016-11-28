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
								<i class="glyphicon glyphicon-floppy-disk"></i> Forma de pagamento
							</h2>
							<a href="index_pagamento.php" id="botao-adicionar" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="cadastro_pagamento.php" method="post">
								<div class="form-group">

									<div class="col-md-4">
										<label>Descrição <span class="obrigatorio">*</span></label>
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição">
									</div>

									<div class="col-md-4">
										<label>Número de parcelas <span class="obrigatorio">*</span></label>
                    <input type="number" name="numero_parcelas" class="form-control" placeholder="Número parcelas">
									</div>

                  <div class="col-md-4">
										<label>Número de dias entre as parcelas <span class="obrigatorio">*</span></label>
                    <input type="number" name="numero_dias"class="form-control" placeholder="Número de dias">
									  </br>
									</div>

									<div class="col-md-4">
										<label>Acréscimo na compra <span class="obrigatorio">*</span></label>
                    <input type="number" step= "any" name="acrescimo" class="form-control" placeholder="Acréscimo">
									</div>

								</div>
								<br>
								<div class="row">
									<div clas="col-md-4">
										<button class="btn btn-success" type="submit">	Cadastrar <i class="glyphicon glyphicon-ok"></i></button>
									</div>
						    </div>
								</form>
					</div>
				</div>
			</div>
			<div class="row text-center"></div>
		</div>
	</section>


	<?php
      include ("../footer.php")
       ?>

	<!-- jQuery -->
	<script src="../vendor/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>

</body>

</html>
