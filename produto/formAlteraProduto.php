<?php
			session_start();
			if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
					header("Location: index.php");
					exit;
			}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "SELECT * FROM produto WHERE codigo=".$id;
$query2 = "SELECT g.nome, g.codigo, p.codigo FROM produto p INNER JOIN grupo g ON p.grupo = g.codigo WHERE p.codigo =".$id;
$query3 = "SELECT m.marca, m.codigo, p.codigo FROM produto p INNER JOIN marca m ON p.marca = m.codigo WHERE p.codigo =".$id;
$query4 = "SELECT f.nome, f.codigo, p.codigo FROM produto p INNER JOIN fornecedor f ON p.fornecedor = f.codigo WHERE p.codigo =".$id;
$query5 = mysql_query("SELECT * FROM fornecedor ORDER BY nome");
$query6 = mysql_query("SELECT * FROM marca ORDER BY marca");
$query7 = mysql_query("SELECT * FROM grupo ORDER BY nome");
$query8 = "SELECT * FROM grupo";
$query9 = "SELECT * FROM fornecedor";
$query10 = "SELECT * FROM marca";

$dados = mysql_query($query);
$dados2 = mysql_query($query2);
$dados3 = mysql_query($query3);
$dados4 = mysql_query($query4);
$dados5 = mysql_query($query8);
$dados6 = mysql_query($query9);
$dados7 = mysql_query($query10);

$resultado = mysql_fetch_object($dados);
$resultado2 = mysql_fetch_object($dados2);
$resultado3 = mysql_fetch_object($dados3);
$resultado4 = mysql_fetch_object($dados4);
$resultado5 = mysql_fetch_object($dados5);
$resultado6 = mysql_fetch_object($dados6);
$resultado7 = mysql_fetch_object($dados7);

$codigo_barra = $resultado->codigo_barra;
$nome = $resultado->nome;
$preco_custo = $resultado->preco_custo;
$margem_lucro = $resultado->margem_lucro;
$preco_venda = $resultado->preco_venda;
@$grupo = $resultado2->nome;
@$grupo2 = $resultado5->codigo;
@$marca = $resultado3->marca;
@$marca2 = $resultado7->codigo;
@$fornecedor = $resultado4->nome;
@$fornecedor2 = $resultado6->codigo;
$quantidade = $resultado->quantidade;
$data_entrada = $resultado->data_entrada;
$tamanho = $resultado->tamanho;
$valor_total = $resultado->valor_total;
$descricao = $resultado->descricao;
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
<link
	href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
	rel='stylesheet' type='text/css'>

<!-- Theme CSS -->
<link href="../css/agency2.css" rel="stylesheet">

<!-- sweet alert -->
<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
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
							<h2 id="clientes_titulo" class="panel-title"><i class="glyphicon glyphicon-floppy-save"></i> Alterar Produto</h2>
							<a href="index_produto.php" id="botao-adicionar" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="altera_produto.php" method="post">
								<input type="hidden" name="codigo" value="<?php echo $id;?>">
								<div class="form-group">

									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Dados do Produto</h4>
									</div>

                  <div class="col-md-4">
										<label>* <i class="glyphicon glyphicon-barcode"></i> Código de barras  <span class="obrigatorio">*</span></label>
                    <input  required type="text" name="codigo_barra" class="form-control" placeholder="Código de barras"	value="<?=$codigo_barra?>" maxlength="50">
									</div>

									<div class="col-md-4">
										<label>* Nome  <span class="obrigatorio">*</span></label><input required type="text" name="nome" class="form-control" placeholder="Nome" value="<?=$nome?>" maxlength="25">
									</div>

									<div class="col-md-4">
										<label>* Quantidade  <span class="obrigatorio">*</span></label>
										<input required  type="number" name="quantidade" class="form-control quantidade" value="<?=$quantidade?>">
									</br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Altere o grupo</label>
										 <select class="form-control" name="grupo">
											 <option value="<?=$grupo2?>"><?=$grupo?></option>
											 <option>----------------------------------------------------</option>
												 <?php while($grupo1 = mysql_fetch_array($query7)) { ?>
											 <option value="<?=$grupo1['codigo'] ?>">
												 <?=$grupo1['nome'] ?>
											 </option>
												 <?php } ?>
										</select>
									</br>
									</div>

									<div class=" col-md-4">
										<label class="control-label">Altere a marca</label>
										 <select class="form-control" name="marca">
											 <option value="<?=$marca2?>"><?=$marca?></option>
											 <option>----------------------------------------------------</option>
												 <?php while($marca1 = mysql_fetch_array($query6)) { ?>
											 <option value="<?=$marca1['codigo'] ?>">
												 <?=$marca1['marca'] ?>
											 </option>
												 <?php } ?>
										</select>
									</div>

                  <div class=" col-md-4">
										<label class="control-label">Altere o fornecedor</label>
										 <select class="form-control" name="fornecedor">
											 <option value="<?=$fornecedor2?>"><?=$fornecedor?></option>
											 <option>----------------------------------------------------</option>
												 <?php while($fornecedor1 = mysql_fetch_array($query5)) { ?>
											 <option value="<?=$fornecedor1['codigo'] ?>">
												 <?=$fornecedor1['nome'] ?>
											 </option>
												 <?php } ?>
										</select>
									</div>

							<div class="row md-12">
								<div class="col-lg-12 text-center">
                  <div class="col-md-4">
                    <label>* Data de entrada  <span class="obrigatorio">*</span></label>
                    <input required  type="date" name="data_entrada" class="form-control data_entrada" value="<?=$data_entrada?>">
                  </div>

									<div class="col-md-4">
										<label class="control-label">Tamanho do produto</label>
										<input  type="text" name="tamanho" class="form-control" value="<?=$tamanho?>">
									</div>

								</div>
							</div>



									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Preço do	Produto</h4>
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
										<label>* Preço de custo  <span class="obrigatorio">*</span></label>
										<input  required	type="number" name="preco_custo" class="form-control preco_custo" placeholder="Preço de custo"	value="<?=$preco_custo?>">
										<br>
									</div>

									<div class="col-md-4">
										<label>* Margem de lucro  <span class="obrigatorio">*</span></label>
										<input type="number" name="margem_lucro" class="form-control margem_lucro" placeholder="Margem de lucro" >
									</div>

									<div class="col-md-4">
										<label>Preço de venda  <span class="obrigatorio">*</span></label>
										<input required type="number"	name="preco_venda" class="form-control preco_venda" placeholder="Preço de venda" >
									</div>
								</div>

									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Diversos</h4>
									</div>

			                  <div class="row">
			  									<div class="form-group col-md-12">
			  										<label class="control-label">Descrição
			                        <span class="required" ></span>
			                      </label>
			  										<textarea name="descricao" rows="10" cols="100" value="<?=$descricao?>"><?=$descricao?></textarea>
			  									</div>
			  								</div>
							</div>


					</div>
				</div>

									<div id="campo_mensagem" class="col-xs-3 pull-left">
										<p><h6>Os campos com o sinal <span class="obrigatorio">'*'</span> são obrigatórios</h6></p>
									</div>



								<div class="row">
									<div class="col-md-2 col-md-offset-10">
                    <label id="total1"> Valor total</label>
                    <input readonly required  type="number" name="valor_total" class="form-control total" value="<?=$valor_total?>">
                    <br>
                  </div>
								</div>

							</br>

							<div class="row">
								<div class="col-md-2 col-md-offset-10">
									<button  class="btn btn-success" type="submit"> Alterar <i class="glyphicon glyphicon-ok"></i></button>
								</div>
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

  <!-- JS Moment -->
  <script src="../js/moment.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>

	<script>

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
					alert ('O preço de venda será feito pelo cálculo: preço de custo * margem de lucro');
			}else{
					alert ('A margem de lucro será feita pelo cálculo: preço de venda - preçco de custo');
			}
		}

	});




 	function verifica(check){
		if(check == true){
				$('.preco_venda').attr('disabled', true);
				$('.margem_lucro').attr('disabled', false);
				$('.margem_lucro').val("<?=$margem_lucro?>");
				$('.preco_venda').val("<?=$preco_venda?>");
					calcula_preco_venda();
		}else{
				$('.margem_lucro').attr('disabled', true);
				$('.preco_venda').attr('disabled', false);
				$('.margem_lucro').val("<?=$margem_lucro?>");
				$('.preco_venda').val("<?=$preco_venda?>");
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

	$('.quantidade').on('change', function() {
		quantidade = $(this).val();
	$('.preco_custo').on('change', function() {
		precoCusto = $(this).val();
		total = precoCusto * quantidade;
		$('.total').val(total);
	});
});

$('.preco_custo').on('change', function() {
	precoCusto = $(this).val();

	$('.quantidade').on('change', function() {
		quantidade = $(this).val();
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

</body>

</html>
