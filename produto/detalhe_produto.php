<?php
		session_start();
		if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
		    header("Location: index.php");
		    exit;
		}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "select * from produto WHERE codigo=".$id;

$query2 = "SELECT g.nome FROM grupo g
INNER JOIN produto p ON g.codigo = p.grupo
WHERE p.codigo=".$id;

$query3 = "SELECT m.marca FROM  marca m
INNER JOIN produto p ON m.codigo = p.marca
WHERE p.codigo=".$id;

$query4 = "SELECT f.nome FROM  fornecedor f
INNER JOIN produto p ON f.codigo = p.fornecedor
WHERE p.codigo =".$id;


$query5 = "SELECT m.modelo FROM  modelo m
INNER JOIN produto p ON m.codigo = p.modelo
WHERE p.codigo =".$id;

$dados = mysql_query($query);
$dados2 = mysql_query($query2);
$dados3 = mysql_query($query3);
$dados4 = mysql_query($query4);
$dados5 = mysql_query($query5);
$resultado = mysql_fetch_object($dados);
$resultado2 = mysql_fetch_object($dados2);
$resultado3 = mysql_fetch_object($dados3);
$resultado4 = mysql_fetch_object($dados4);
$resultado5 = mysql_fetch_object($dados5);


$codigo_barra = $resultado->codigo_barra;
$nome = $resultado->nome;
$preco_custo = $resultado->preco_custo;
$margem_lucro = $resultado->margem_lucro;
$preco_venda = $resultado->preco_venda;
@$grupo = $resultado2->nome;
@$marca  = $resultado3->marca;
@$fornecedor = $resultado4->nome;
@$modelo = $resultado5->modelo;
$quantidade = $resultado->quantidade;
$data_entrada = $resultado->data_entrada;
$tamanho = $resultado->tamanho;
$valor_total = $resultado->valor_total;
@$status = $resultado->vendido;
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
								<i class="glyphicon glyphicon-floppy-disk"></i>Informações do
								Produto
							</h2>
							<a href="index_produto.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="page-header">
									<h4 id="cabecalho-form-cliente" align="left">Dados do
										produto</h4>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Código de barras: </b><span id="dados_cliente"> <?=$codigo_barra?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>nome: </b><span id="dados_cliente"> <?=$nome?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Preço Custo: </b><span id="dados_cliente"> <?=$preco_custo?></span>
									</h5>
								</div>
							</div>
							<br>
							<div class="col-md-4">
								<h5>
									<b>Margem lucro: </b><span id="dados_cliente"> <?=$margem_lucro?></span>
								</h5>
							</div>
							<div class="col-md-4">
								<h5>
									<b>Preço Venda: </b><span id="dados_cliente"> <?=$preco_venda?></span>
								</h5>
							</div>

<?php
		if ($grupo == ''){
		$grupo = "Nenhum grupo vinculado!";
		}
?>
							<div class="col-md-4">
								<h5>
									<b>Grupo: </b><span id="dados_cliente"> <?=$grupo?></span>
								</h5>
								<br>
							</div>

<?php
		if ($marca == ''){
		$marca = "Nenhuma marca vinculada!";
		}
?>
							<div class="col-md-4">
								<h5>
									<b>Marca: </b><span id="dados_cliente"><center> <?=$marca?></center></span>
								</h5>
								<br>
							</div>

							<?php
									if ($modelo == ''){
									$modelo = "Nenhum modelo vinculado!";
									}
							?>
														<div class="col-md-4">
															<h5>
																<b>Modelo: </b><span id="dados_cliente"><center> <?=$modelo?></center></span>
															</h5>
															<br>
														</div>


<?php
	if ($fornecedor == ''){
		$fornecedor = "Nenhum fornecedor vinculado!";
	}
 ?>
							<div class="col-md-4">
								<h5>
									<b>Fornecedor: </b><span id="dados_cliente"><center> <?=$fornecedor?></center></span>
								</h5>
								<br>
							</div>

							<div class="col-md-4">
								<h5>
									<b>Quantidade: </b><span id="dados_cliente"> <?=$quantidade?></span>
								</h5>
							</div>
						</div>




						<?php

								if($data_entrada == '0000-00-00'){
									$data_nascimento = 'data não cadastrada!';
								}else{
									$data_entrada = date('d/m/Y', strtotime($data_entrada));
								}
						 ?>

							<div class="row">
								<div class="col-md-4">
									<h5>
										<b>Data de entrada: </b><span id="dados_cliente"> <?=$data_entrada?></span>
									</h5>
								</div>
								<div class="col-md-4">
									<h5>
										<b>Tamanho: </b><span id="dados_cliente"> <?=$tamanho?></span>
									</h5>
								</div >

								<div class="col-md-4">
									<h5>
										<b>Valor: </b><span id="dados_cliente"> <?=$valor_total?></span>
									</h5>
									<br>
								</div >

								<?php
										if ($status == 'n'){
												$status = "Não";
										}
												if($status == 's'){
													$status = "Sim";
												}
								?>
															<div class="col-md-4">
																<h5>
																	<b>Vendido:</b>
																	<span id="dados_cliente"><center> <?=$status?></center></span>
																</h5>
																<br>
															</div>

								<div class="row">
								<div class="col-md-4">
									<h5>
										<b>Descrição: </b>
										<span id="dados_cliente"> <?=$descricao?></span>
									</h5>
								</div>

							<div class="row">


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

</body>

</html>
