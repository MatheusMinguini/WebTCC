<?php

		session_start();
		if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
		    header("Location: index.php");
		    exit;
		}

include '../conexao.php';
$query = mysql_query("SELECT codigo, nome FROM fornecedor ORDER BY nome");
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
								<i class="glyphicon glyphicon-floppy-disk"></i> Fornecedor
							</h2>
							<a href="index_fornecedor.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">

							<form class="form-horizontal" action="cadastro_fornecedor.php"
								method="post">
								<div class="form-group">
									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Dados do
											Fornecedor</h4>
									</div>
									<div class="col-md-4">
										<label>Nome <span class="obrigatorio">*</span></label>
										<input required type="text"	name="nome" class="form-control" placeholder="Digite o nome" maxlength="25">
									</div>
									<div class="col-md-4">
										<label>CNPJ <span class="obrigatorio">*</span></label>
										<input required id="cnpj" type="text" name="cnpj" class="form-control" placeholder="CNPJ" maxlength="15">
									</div>
									<div class="col-md-4">
										<label>E-mail</label>
										<input id="" type="text"	name="email" class="form-control" placeholder="E-mail" maxlength="20">
									</div>
                  <div class="col-md-4">
										<label>Telefone</label>
										<input  id="telefone" type="text" name="telefone" class="form-control" placeholder="Telefone" maxlength="15">
										</br>
									</div>
                  <div class="col-md-4">
										<label>Celular <span class="obrigatorio">*</span></label>
										<input required id="celular" required type="text" name="celular" class="form-control" placeholder="Celular" maxlength="15">
									</div>
								</div>
								</fieldset>


						<div class="page-header">
							<h4 id="cabecalho-form-cliente" align="left">Localização</h4>
						</div>

						<div class="row pull-left">
							<p><h6>Digite o <span class="obrigatorio">CEP</span>, buscaremos o endereço baseado nele!</h6></p>
						</div>

						<div class="row col-md-12">
							<div class="col-md-4">
								<label>CEP </label>
								<input required id="cep" type="text" name="cep" class="form-control cep" placeholder="CEP">
								<br>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label> Logradouro </label><input required type="text" name="logradouro"
									class="form-control logradouro" placeholder="Rua" maxlength="30">
							</div>
							<div class="col-md-4">
								<label>Bairro </label><input required type="text" name="bairro"
									class="form-control bairro" placeholder="Bairro" maxlength="30">
							</div>
							<div class="col-md-4">
								<label>Número </label><input required type="text" name="numero"
									class="form-control numero" placeholder="Número" maxlength="10">
								</br>
							</div>
							<div class="col-md-4">
								<label>Complemento </label><input type="text" name="complemento"
									class="form-control complemento" placeholder="Número" maxlength="10">
								</br>
							</div>
							<div class="col-md-4">
								<label>Cidade </label><input required type="text" name="cidade"
									class="form-control cidade" placeholder="Cidade" maxlength="25">
							</div>
							<div class="col-md-4">
								<label>Estado </label>
								<select class="form-control estado" name="estado">
											<option value="">Selecione</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espirito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MT">Mato Grosso</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
								</select>
								<br>
							</div>
						</div>

						<div class="row">
							<div clas="col-md-4">
								<button class="btn btn-success" type="submit">
									Cadastrar <i class="glyphicon glyphicon-ok"></i>
								</button>
								<br>
							</div>
							<div class="row col-xs-3 pull-left">
								<p><h6>Os campos com o sinal <span class="obrigatorio">'*'</span> são obrigatórios</h6></p>
							</div>
							<br>
							</form>
					</div>
				 </div>
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

	<!--JQuery plugin-->
	<script src="../js/plugin/src/jquery.mask.js">

	</script>
	<script src="../js/plugin/mask.js"></script>
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

	<script>
	    $(".cep").on('blur', function(){
	      var cep = $(this).val();
	      var novoCEP = cep.replace(/[\.-]/g, "");
	      $.ajax({
	        type: "GET",
	        url : "//viacep.com.br/ws/" + novoCEP + "/json/",
	        dataType : "json",
	        success : function(data){
	          console.log(data);
	          $(".logradouro").val(data.logradouro);
	          $(".bairro").val(data.bairro);
	          $(".numero").val(data.numero);
	          $(".complemento").val(data.complemento);
	          $(".cidade").val(data.localidade);
	          $(".estado").val(data.uf);

	        }, error: function(erro){
	          alert('não foi possivel buscar o produto');
	        }
	      });
	    })

	</script>
</body>

</html>
