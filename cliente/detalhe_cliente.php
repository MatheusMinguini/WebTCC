<?php
session_start();
if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
    header("Location: index.php");
    exit;
}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "SELECT c.*, u.login as usuario, us.login as usuario_alteracao FROM cliente c
INNER JOIN usuario u ON u.codigo = c.id_usuario
INNER JOIN usuario us ON us.codigo = c.id_usuario_alteracao
WHERE c.codigo=".$id;

$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);

$codigo = $resultado->codigo;
$nome = $resultado->nome;
$sobrenome = $resultado->sobrenome;
$cpf = $resultado->cpf;
$rg = $resultado->rg;
$data_nascimento = $resultado->data_nascimento;
$telefone = $resultado->telefone;
$celular = $resultado->celular;
$logradouro = $resultado->logradouro;
$bairro = $resultado->bairro;
$numero = $resultado->numero;
$cep = $resultado->cep;
$cidade = $resultado->cidade;
$estado = $resultado->estado;
$complemento = $resultado->complemento;
$email = $resultado->email;
$data_cadastro = $resultado->data_cadastro;
$data_ultima_alteracao = $resultado->data_ultima_alteracao;
$usuario = $resultado->usuario;
$usuario_alteracao = $resultado->usuario_alteracao;
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
								<i class="glyphicon glyphicon-floppy-disk"></i>Informações do
								Cliente
							</h2>
							<a href="index_cliente.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<div class="page-header">
								<h4 id="cabecalho-form-cliente" align="left">Dados Pessoais</h4>
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
										<b>Sobrenome: </b><span id="dados_cliente"> <?=$sobrenome?></span>
									</h5>
								</div>
							</div>
							<br>
							<!--outras informações-->
							<div class="col-md-4">
								<h5>
									<b>CPF: </b><span id="dados_cliente"> <?=$cpf?></span>
								</h5>
							</div>
							<div class="col-md-4">
								<h5>
									<b>RG: </b><span id="dados_cliente"> <?=$rg?></span>
								</h5>
							</div>

							<?php

									if($data_nascimento == '0000-00-00'){
										$data_nascimento = 'data não cadastrada!';
									}else{
										$data_nascimento = date('d/m/Y', strtotime($data_nascimento));
									}
							 ?>
							<div class="col-md-4">
								<h5>
									<b>Data de nascimento: </b><span id="dados_cliente"> <?=$data_nascimento?></span>
								</h5>
							</div>
							<br>

							<div class="page-header">
								<h4 id="cabecalho-form-cliente" align="left">Localização</h4>
							</div>
							<div class="row">
                <div class="col-md-4">
									<h5>
										<b>CEP: </b><span id="dados_cliente"> <?=$cep?></span>
									</h5>
								</div>
              </div>
              <div class="row">
								<div class="col-md-4">
									<h5>
										<b>Logradouro: </b><span id="dados_cliente"> <?=$logradouro?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Bairro: </b><span id="dados_cliente"> <?=$bairro?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Número: </b><span id="dados_cliente"> <?=$numero?></span>
									</h5>
								</div>
              </div>
              <div class="row">
                <?php
                    if($complemento == null){
                      $complemento = "Não cadastrado";
                    }
                 ?>
                <div class="col-md-4">
									<h5>
										<b>Complemento: </b><span id="dados_cliente"> <?=$complemento ?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>cidade: </b><span id="dados_cliente"> <?=$cidade?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Estado: </b><span id="dados_cliente"> <?=$estado?></span>
									</h5>
								</div>
              </div>



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
                  <?php
                    if($email == null){
                      $email = "não cadastrado";
                    }
                  ?>
									<h5>
										<b>Email: </b><span id="dados_cliente"> <?=$email?></span>
									</h5>
                  <br>
								</div>

                <div class="page-header">
                  <h4 id="cabecalho-form-cliente" align="left">Histórico do registro</h4>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                      <h5>
                        <b>Cadastrado por: </b><span id="dados_cliente"> <?=$usuario?></span>
                      </h5>
                    </div>

                    <?php
                      if($data_cadastro == '0000-00-00'){
    										$data_cadastro = 'Data não cadastrada!';
    									}else{
    										$data_cadastro = date('d/m/Y', strtotime($data_cadastro));
    									}
                    ?>

                    <div class="col-md-4">
    									<h5>
    										<b>Data do cadastro: </b><span id="dados_cliente"><?= $data_cadastro ?></span>
    									</h5>
    								</div>
                 </div>

                 <?php
                   if($data_cadastro == '0000-00-00'){
                     $data_ultima_alteracao = 'Data não cadastrada!';
                   }else{
                      $data_ultima_alteracao = date('d/m/Y', strtotime($data_ultima_alteracao));
                   }
                 ?>

                <div class="row col-md-12">
                      <div class="col-md-4">
      									<h5>
      										<b>Data última alteração: </b><span id="dados_cliente"> <?=$data_ultima_alteracao?></span>
      									</h5>
      								</div>
                      <div class="col-md-4">
      									<h5>
      										<b>Feita por: </b><span id="dados_cliente"> <?=$usuario_alteracao?></span>
      									</h5>
      								</div>
                </div>

                <br><br><br><br><br>
							</div>


                <div class="form-actions right pull-right">
                  <a style="background-color: rgba(230, 22, 22, 0.85); color: white;" class="btn btn-default" onclick="confirma_enviar_email(<?=$id?>);"><i class="fa fa-pencil"></i> Enviar cobrança</a>
                  <a style="background-color: #60266f; color: white;" class="btn btn-default" href="../email/formEmail.php?codigo=<?=$id?>"><i class="fa fa-envelope"></i> Enviar Email</a>
                </div>


						</div>
					</div>
				</div>
				<div class="row text-center">
</body>

</html>
