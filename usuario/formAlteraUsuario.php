<?php
			session_start();
			if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
					header("Location: index.php");
					exit;
			}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "SELECT * FROM usuario WHERE codigo=".$id;
$queryPerfil = mysql_query("SELECT * FROM perfilQuery");

$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);
$resultadoPerfil = mysql_fetch_object($queryPerfil);

$nome = $resultado->nome;
$sobrenome = $resultado->sobrenome;
$login = $resultado->login;
$email = $resultado->email;
$perfilNome = $resultadoPerfil->descricao;
$perfilId = $resultadoPerfil->id;


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
								<i class="glyphicon glyphicon-floppy-save"></i> Alterar Usuário
							</h2>
							<a href="index_usuario.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="altera_usuario.php" method="post">
								<input type="hidden" name="codigo" value="<?php echo $id;?>">
								<div class="form-group">

									<div class="row col-md-12">
										<div class="col-md-4">
											<label> Nome <span class="obrigatorio">*</span></label><input required type="text" name="nome"
												class="form-control" placeholder="Nome" maxlength="25" value="<?=$nome?>">
										</div>
										<div class="col-md-4">
											<label> Sobrenome <span class="obrigatorio">*</span></label><input required type="text" name="sobrenome"
												class="form-control" placeholder="Sobrenome" maxlength="25" value="<?=$sobrenome?>">
										</div>
										<div class="col-md-4">
											<label>Login <span class="obrigatorio">*</span></label><input resquired type="text" name="login"
												class="form-control" placeholder="Login" maxlength="25" value="<?=$login?>" ><br>
										</div>
									</div>

								<div class="row col-md-12">
									<div class="col-md-4">
										<label>Email (Será usado para recuperação de senha) <span class="obrigatorio">*</span></label><input resquired type="text" name="email"
											class="form-control" placeholder="Email" maxlength="25" value="<?=$email?>" >
									</div>
									<div class="col-md-4">
										<label>Senha Atual <span class="obrigatorio">*</span></label><input required type="password"
											name="senha" class="form-control" placeholder="????" maxlength="25">
											<br>
									</div>
									<div class="col-md-4">
										<label> Nova senha <span class="obrigatorio">*</span></label><input required type="password"
											name="nova_senha" class="form-control"
											placeholder="Nova Senha" maxlength="25">
										</br>
									</div>
								</div>

								<div class="row col-md-12">
									<div class="col-md-4">
										<label> Confirma a nova senha <span class="obrigatorio">*</span></label><input required
											type="password" name="confsenha" class="form-control"
											placeholder="Confirma a senha" maxlength="25">
									</div>
									<div class="col-md-4">
										<label>Perfil <span class="obrigatorio">*</span></label>
										<select name="perfil" class="form-control">
											<option value="<?= $perfilId ?>"> <?= $perfilNome ?> </option>
											<option value="1"> Administrativo </option>
											<option value="2"> Operador </option>
										</select>
									</div>
							</div>
					</div>
							<br>
							<div class="row">
								<div class="col-xs-3 pull-left">
									<p><h6>Os campos com o sinal <span class="obrigatorio">' * '</span> são obrigatórios</h6></p>
								</div>
								<div clas="col-md-4">
									<button class="btn btn-success" type="submit">
										Alterar <i class="glyphicon glyphicon-ok"></i>
									</button>
								</div>
						</form>

						</div>
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
