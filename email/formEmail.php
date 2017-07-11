<?php
		session_start();
		if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
				header("Location: index.php");
				exit;
		}
include '../conexao.php';
$id = $_REQUEST['codigo'];
$query = mysql_query("SELECT nome, sobrenome, email FROM cliente WHERE codigo = " . $id);
$row = mysql_fetch_object($query);
$nome = $row->nome;
$sobrenome = $row->sobrenome;
$email = $row->email;

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
<!-- bootstrapSwitch -->
<link href="../css/bootstrap-switch.css" rel="stylesheet">
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
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<!-- sweet alert -->
	<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

	<!-- mensagens -->
	<script src="../js/mensagens.js"></script>

  <!-- Theme CSS -->
  <link href="../css/agency2.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

	<?php
    include ("../menu.php");

		if($email == null){
  ?>
			<script>


			swal({
		    title: "Erro!",
		    text: "O cliente não possui email cadastrado! Cadastre um Email para poder enviar mensagens!",
		    type: "warning",
		    showCancelButton: false,
		    confirmButtonColor: "#DD6B55",
		    confirmButtonText: "Entendi",
		    closeOnConfirm: true,
		  },
		  function(isConfirm){
		  if (isConfirm) {
		    history.back();
		  }
		});


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
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="glyphicon glyphicon-envelope"></i> E-mail
							</h2>
							<a href="../cliente/index_cliente.php" id="botao-adicionar" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="email.php" method="post">
								<div class="form-group">
									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Enviar Email para: <span class "obrigatorio"><?= $nome. ' '. $sobrenome ?></span></h4>
									</div>

									<div class="row">
										<div class="col-md-4">
												<label>De:</label>
												<input style="margin-left:50%;" readonly type="text" name="email" class="form-control" value="maralojapissara@gmail.com">
		                    <br>
										</div>
									</div>

									<div class="row">
											<div class="col-md-4">
												<label> Para:</label>
												<input style="margin-left:50%;" readonly type="text" name="email" class="form-control" value="<?= $email ?>">
		                    <br>
											</div>
									</div>



									<div class="row">
										<div class="form-group col-md-8">
											<input style="margin-left:32%;" required type="text" name="assunto" class="form-control" placeholder="Assunto" maxlength="20">
										</div>
                    <br>
									</div>

  								<div class="row">
  									<div class="form-group col-md-12">
  										<label class="control-label">Mensagem</label>
  										<textarea required name="mensagem" rows="10" cols="100"></textarea>
  									</div>
  								</div>

              </div>
						</div>

							<div class="row">
									<div class="col-md-2 col-md-offset-10">
											<button class="btn btn-success" type="submit">Enviar <i class="glyphicon glyphicon-ok"></i></button>
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

	<!-- bootstrap-switch -->
	<script src="../js/bootstrap-switch.js"></script>

	<!--JQuery plugin-->
	<script src="../js/plugin/src/jquery.mask.js"></script>
	<script src="../js/plugin/mask.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- JS Moment -->
	<script src="../js/moment.js"></script>

	<!-- Bootbox -->
	<script src="../js/bootbox.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>


</body>
</html>
