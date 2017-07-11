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

<title>Mara Modas - Relatórios</title>

<!-- Bootstrap Core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<!-- sweet alert -->
	<script
		src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

	<!-- mensagens -->
	<script src="../js/mensagens.js"></script><!-- sweet alert -->

<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

<!-- Theme CSS -->
<link href="../css/agency2.css" rel="stylesheet">




</head>

<body id="page-top" class="index">


	<?php
    include ("../menu.php");
		@include("../conexao.php");
    @$msg = $_REQUEST['msg'];


		if($msg=='sucesso_pagamento_residuo'){
     ?>
		 		<script type="text/javascript">
		 				sucesso_pagamento_residuo();
		 		</script>
		 <?php
		 		}
		 ?>
		 <?php
		 			if($msg=='sucesso_pagamento_residuo'){
		 ?>
				 <script type="text/javascript">
						 sucesso_pagamento();
				 </script>
			<?php
				 }
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
			<form class="form-inline" action="resultado_busca.php" method="post">
				<div class="input-group col-md-5 col-md-offset-4">
					<span class="input-group-addon">
						<span	class="glyphicon glyphicon-search">	</span>
					</span>
					<input type="text" name="buscar" placeholder="Buscar..." class="form-control"/>
					<span class="input-group-btn">
						<button type="submit" class="btn btnRight">Buscar</button>
					</span>
					<select class="form-control" name="opcao">
            <option value="">CLIENTE</option>
            <option value="">*********************</option>
						<option value="nome">Nome</option>
						<option value="sobrenome">Sobrenome</option>
						<option value="cpf">CPF</option>
            <option value=""></option>
            <option value="">VENDA</option>
            <option value="">*********************</option>
            <option value="codigo">Código da venda</option>
					</select>
				</div>

			</form>
			</br>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="fa fa-tag"></i> Crediario
							</h2>
						</div>
						<div class="panel-body">
							<h2 class="panel-title">
							 	Digite os dados na barra de busca e selecione a opção que deseja filtrar
							</h2>
							<img id="imgcerto" src="../images/crediario.png" alt=""><br />
					</div>
				</div>
			</div>
		</div>

	<?php
      include ("../footer.php");
  ?>



	<!-- jQuery -->
	<script src="../vendor/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>

	<!-- sweet alert -->
	<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>

</body>
</html>
