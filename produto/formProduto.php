<?php
		session_start();
		if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
				header("Location: index.php");
				exit;
		}
include '../conexao.php';
$query = mysql_query("SELECT codigo, nome FROM grupo ORDER BY nome");
$query1 = mysql_query("SELECT codigo, nome FROM fornecedor ORDER BY nome");
$query2 = mysql_query("SELECT codigo, marca FROM marca ORDER BY marca");
$query3 = mysql_query("SELECT codigo, modelo FROM modelo ORDER BY modelo");
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
	<script
		src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

	<!-- mensagens -->
	<script src="../js/mensagens.js"></script>


<!-- Theme CSS -->
<link href="../css/agency2.css" rel="stylesheet">

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
								<i class="glyphicon glyphicon-floppy-disk"></i> Produto
							</h2>
							<a href="index_produto.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="cadastro_produto.php" method="post">
								<div class="form-group">
									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Dados do Produto</h4>
									</div>

									<div class="col-md-4">
										<label>* <i class="glyphicon glyphicon-barcode"></i> Código de barras <span class="obrigatorio">*</span></label>
										<input id = "codigo_barra" required type="text" name="codigo_barra" class="form-control" placeholder="Digite o código de barras" maxlength="50">
									</div>

									<div class="col-md-4">
										<label>* Nome <span class="obrigatorio">*</span></label>
										<input required type="text" name="nome" class="form-control" placeholder="nome" maxlength="25">
									</div>

									<div class="col-md-4">
										<label class="control-label">* Quantidade <span class="obrigatorio">*</span></label>
										<input required type="number" name="quantidade" class="form-control quantidade" placeholder="Quantidade do Produto" v-model="amount" min="0" maxlength="">
										<br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Selecione o grupo</label>
										<select class="form-control" name="grupo">
											<option value="">Escolha o grupo</option>
											<?php
											while($grupo = mysql_fetch_array($query)) { ?>

											<option value="<?=$grupo['codigo'] ?>">
												<?=$grupo['nome'] ?>
											</option>
											<?php } ?>

										</select> <br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Selecione a marca</label>
										<select
												class="form-control" name="marca">
												<option value="">Escolha a marca</option>
												<?php while($marca = mysql_fetch_array($query2)) { ?>
														<option value="<?=$marca['codigo'] ?>">
												<?=$marca['marca'] ?>
												</option>
												<?php } ?>
										</select> <br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Selecione o Modelo</label>
										 <select class="form-control" name="modelo">
												<option value="">Escolha o modelo</option>
													<?php while($modelo = mysql_fetch_array($query3)) { ?>
												<option value="<?=$modelo['codigo'] ?>">
													<?=$modelo['modelo'] ?>
												</option>
													<?php } ?>
										</select> <br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Selecione o fornecedor</label>
										 <select class="form-control" name="fornecedor">
												<option value="">Escolha o fornecedor</option>
													<?php while($fornecedor = mysql_fetch_array($query1)) { ?>
												<option value="<?=$fornecedor['codigo'] ?>">
													<?=$fornecedor['nome'] ?>
												</option>
													<?php } ?>
										</select> <br>
									</div>


									<div class="col-md-4">
										<label>* Data de entrada <span class="obrigatorio">*</span></label>
										<input required type="date" name="data_entrada" class="form-control data_entrada" placeholder="Data do cadastro">
									</div>

									<div class="col-md-4">
										<label class="control-label">Tamanho do produto</label>
										<input  type="text" name="tamanho" class="form-control" placeholder="tamanho">
									</div>
					</div>


									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Preço do
											Produto</h4>
									</div>

									<div class="row">
										<label class="col-md-3">Margem de lucro</label>
									</div>

									<div class="row">
										<div class="col-md-3">
											<input type="checkbox" name="botao-de-check" checked>
										</div>
									</div>
</br>
									<div class="col-md-4">
										<label>* Preço de custo <span class="obrigatorio">*</span></label>
										<input required type="number" step= 0.01 name="preco_custo" class="form-control preco_custo" placeholder="R$ Preço de custo"> <br>
									</div>

									<div class="col-md-4">
										<label>* <i readonly class="glyphicon glyphicon-usd"></i> Margem de Lucro <span class="obrigatorio">*</span></label>
										<input type="number" step=0.01 name="margem_lucro" class="form-control margem_lucro" placeholder="%">
									</div>

									<div class="col-md-4">
										<label>* Preco de venda <span class="obrigatorio">*</span></label>
										<input readonly  type="number" step=0.01 name="preco_venda" class="form-control preco_venda" placeholder="R$ Preço de venda">
									</div>

								</div>

								<div class="page-header">
									<h4 id="cabecalho-form-cliente" align="left">Diversos</h4>
								</div>

								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label">Descrição
											<span class="required"></span>
										</label>
										<textarea name="descricao" rows="10" cols="100"></textarea>
									</div>
								</div>


						</div>

						<div id="campo_mensagem" class="col-xs-3 pull-left">
							<p><h6>Os campos com o sinal <span class="obrigatorio">' * '</span> são obrigatórios</h6></p>
						</div>

						<div class="row">
							<div class="col-md-2 col-md-offset-10">
								<label id="total1">Valor total da compra</label>
								<input align = "right" type="number" name="valor_total" class="form-control total pull-right" placeholder="Valor Total" readonly>
							</div>
						</div>

						</br>

							<div class="row">
									<div class="col-md-2 col-md-offset-10">
											<button class="btn btn-success" type="submit">Cadastrar <i class="glyphicon glyphicon-ok"></i></button>
									</div>
							</div>
									<br>
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


	<script>

<!-- Trazer a data de hoje na data da compra -->

    document.querySelector('.data_entrada').valueAsDate = new Date();

	window.onload = function(){
		document.getElementById('codigo_barra').focus();
	};

	<!-- Botão de escolha -->
	$("[name='botao-de-check']").bootstrapSwitch();

	$(window).load(function(){
		verifica(true);
	});

	$("[name='botao-de-check']").on('switchChange.bootstrapSwitch', function() {
		verifica($(this).prop("checked"));
		mensagem($(this).prop("checked"));

		function mensagem(check){
			if(check == true){
					bootbox.alert("O preço de venda será Calculado pela Margem de lucro'");
					//alert ('O preço de venda será feito pelo cálculo: preço de custo * margem de lucro');
			}else{
					bootbox.alert("A Margem de lucro será calculada de acordo com o preço de venda");
					//alert ('A margem de lucro será feita pelo cálculo: preço de venda - preçco de custo');
			}
		}

	});




 	function verifica(check){
		if(check == true){
				$('.preco_venda').attr('readonly', true);
				$('.margem_lucro').attr('readonly', false);
				$('.margem_lucro').val("");
				$('.preco_venda').val("");
					calcula_preco_venda();
		}else{
				$('.margem_lucro').attr('readonly', true);
				$('.preco_venda').attr('readonly', false);
				$('.margem_lucro').val("");
				$('.preco_venda').val("");
					calcula_margem();
		}
	}


	<!-- data nao pode ser maior que a data atual -->
		$('.data_entrada').on('change', function() {
		 	var dataEntrada = moment($(this).val(), 'YYYY-MM-DD');

		 	if (dataEntrada.isAfter()) {
					 sweetAlert("Oops...", "A data de entrada não deve ser maior do que a data de hoje", "error");
				 		$(this).val('');
		 	}
 		});


	<!-- Calcula o total da compra -->
		var precoCusto = '';
		var quantidade = '';
		var total = '';

		$('.preco_custo').on('change', function() {
			precoCusto = $(this).val();

			$('.quantidade').on('change', function() {
				quantidade = $(this).val();
				total = precoCusto * quantidade;

				$('.total').val(total);

			});
});

	$('.quantidade').on('change', function() {
		quantidade = $(this).val();
	$('.preco_custo').on('change', function() {
		precoVenda = $(this).val();
		total = precoCusto * quantidade;
		$('.total').val(total);
	});
});

<!-- Calcula o preco de venda de acordo com a margem de lucro e o preco de custo -->
function calcula_preco_venda(){
var precoCusto1 = '';
var precoVenda1 = '';
var precoVenda2 = '';
var margemLucro = '';

$('.preco_custo').on('change', function() {
	precoCusto1 = $(this).val();
		$('.margem_lucro').on('change', function() {
				margemLucro = $(this).val();
				precoVenda1 = (precoCusto1 * (margemLucro/100));
				precoVenda2 = parseFloat(precoCusto1) + parseFloat(precoVenda1);
				$('.preco_venda').val(precoVenda2);
	});
});

$('.margem_lucro').on('change', function() {
margemLucro = $(this).val();
	$('.preco_custo').on('change', function() {
				precoCusto1 = $(this).val();
				precoVenda1 = (precoCusto1 * (margemLucro/100));
				precoVenda2 = parseFloat(precoCusto1) + parseFloat(precoVenda1);
		$('.preco_venda').val(precoVenda2);
	});
});

$('.preco_custo').on('change', function() {
	precoCusto1 = $(this).val();
		$('.margem_lucro').on('change', function() {
				margemLucro = $(this).val();
				precoVenda1 = (precoCusto1 * (margemLucro/100));
				precoVenda2 = parseFloat(precoCusto1) + parseFloat(precoVenda1);
				$('.preco_venda').val(precoVenda2);
	});
});

$('.margem_lucro').on('change', function() {
margemLucro = $(this).val();
	$('.preco_custo').on('change', function() {
				precoCusto1 = $(this).val();
				precoVenda1 = (precoCusto1 * (margemLucro/100));
				precoVenda2 = parseFloat(precoCusto1) + parseFloat(precoVenda1);
		$('.preco_venda').val(precoVenda2);
	});
});


}


<!-- Calcula a margem de lucro de acordo com o preco de custo e o preco de venda-->
function calcula_margem(){
var precoCusto1 = '';
var precoVenda1 = '';
var margemLucro1 = '';
var margemLucro2 = '';

$('.preco_custo').on('change', function() {
	precoCusto1 = $(this).val();
		$('.preco_venda').on('change', function() {
				precoVenda1 = $(this).val();
				margemLucro1 = ((precoVenda1/precoCusto1) - 1);
				margemLucro2 = margemLucro1 * 100;
				$('.margem_lucro').val(margemLucro2);
	});
});

$('.preco_venda').on('change', function() {
	precoVenda1 = $(this).val();
	$('.preco_custo').on('change', function() {
				precoCusto1 = $(this).val();
				margemLucro1 = ((precoVenda1/precoCusto1) - 1);
				margemLucro2 = margemLucro1 * 100;
		$('.margem_lucro').val(margemLucro2);
	});
});

$('.preco_venda').on('change', function() {
	precoVenda1 = $(this).val();
	$('.preco_custo').on('change', function() {
				precoCusto1 = $(this).val();
				margemLucro1 = ((precoVenda1/precoCusto1) - 1);
				margemLucro2 = margemLucro1 * 100;
		$('.margem_lucro').val(margemLucro2);
	});
});
$('.preco_custo').on('change', function() {
	precoCusto1 = $(this).val();
		$('.preco_venda').on('change', function() {
				precoVenda1 = $(this).val();
				margemLucro1 = ((precoVenda1/precoCusto1) - 1);
				margemLucro2 = margemLucro1 * 100;
				$('.margem_lucro').val(margemLucro2);
	});
});
}
	</script>

<script src="../js/plugin/mask.js"></script>
</body>
</html>
