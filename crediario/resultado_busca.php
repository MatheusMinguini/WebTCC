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
		$limite = 10;
		@$pagina = $_GET['pag'];
    @$msg = $_REQUEST['msg'];

		if(!$pagina)	{
		    $pagina = 1;
		}

		$inicio = ($pagina * $limite) - $limite;

     ?>

		 <?php
		     if($msg=='sucesso_pagamento_residuo'){
		 ?>
		 		<script type="text/javascript">
		 				sucesso_pagamento_residuo();
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
					<form class="control">
						<div class="input-"></div>
					</form>
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="fa fa-tag"></i> Crediario
							</h2>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th id="opcoes">
											<center>Código da venda</center>
										</th>
										<th >
											<center id="colors">Valor da compra</center>
										</th>
										<th id="colors">
											<center>Cliente</center>
										</th>
                    <th id="colors">
											<center>Data da Compra</center>
										</th>
                    <th id="colors">
											<center>Parcela</center>
										</th>
                    <th id="colors">
											<center>Data de vencimento</center>
										</th>
                    <th id="colors">
											<center>Valor da parcela</center>
										</th>

                    <th id="opcoes">
											<center>Receber</center>
                    </th>

									</tr>
								</thead>
								<?php
																@$buscar = $_REQUEST['buscar'];
																@$opcao = $_REQUEST['opcao'];

																	if ($opcao == 'nome'){
																		$data = date('Y-m-d');
																		$sql = mysql_query("SELECT c.nome, p.id, p.id_venda, c.sobrenome, p.data_vencimento, p.valor_parcela, v.data_venda, v.total, p.posicao_parcelas, p.numero_parcelas FROM parcelas p
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												WHERE c.nome LIKE '%".$buscar."%'
																												AND p.pago = 'n'
																												ORDER BY p.id LIMIT $inicio, $limite");

																		$sql1 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												WHERE c.nome LIKE '%".$buscar."%'
																												AND  '$data ' > p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																 	$sql2 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												WHERE c.nome LIKE '%".$buscar."%'
																												AND  '$data' < p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql3 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												WHERE c.nome LIKE '%".$buscar."%'
																												AND p.pago = 'n'
																												GROUP BY c.codigo	
																												ORDER BY p.id LIMIT $inicio, $limite");
																		$row = mysql_num_rows($sql);
																		$row1 = mysql_num_rows($sql1);
																		$row2 = mysql_num_rows($sql2);
																		$row3 = mysql_num_rows($sql3);
																	};

																	if ($opcao == 'sobrenome'){
																		$data = date('Y-m-d');
																		$sql = mysql_query("SELECT c.nome, p.id, p.id_venda, c.sobrenome, p.data_vencimento, p.valor_parcela, v.data_venda, v.total, p.posicao_parcelas, p.numero_parcelas FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE c.sobrenome LIKE '%".$buscar."%'
																												AND p.pago = 'n'
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql1 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.sobrenome LIKE '%".$buscar."%'
																												AND  '$data ' > p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql2 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.sobrenome LIKE '%".$buscar."%'
																												AND  '$data' < p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql3 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.nome LIKE '%".$buscar."%'
																												AND p.pago = 'n'
																												GROUP BY c.codigo
																												ORDER BY p.id LIMIT $inicio, $limite");

																		$row = mysql_num_rows($sql);
																		$row1 = mysql_num_rows($sql1);
																		$row2 = mysql_num_rows($sql2);
																		$row3 = mysql_num_rows($sql3);
																	};

																	if ($opcao == 'cpf'){
																		$data = date('Y-m-d');
																		$sql = mysql_query("SELECT c.nome, p.id, p.id_venda, c.sobrenome, p.data_vencimento, p.valor_parcela, v.data_venda, v.total, p.posicao_parcelas, p.numero_parcelas FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE c.cpf = '$buscar'
																												AND p.pago = 'n'
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql1 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.cpf = '$buscar'
																												AND  '$data' > p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql2 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.cpf = '$buscar'
																												AND  '$data' < p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql3 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												WHERE c.cpf = '$buscar'
																												AND p.pago = 'n'
																												GROUP BY c.codigo
																												ORDER BY p.id LIMIT $inicio, $limite");

																		$row = mysql_num_rows($sql);
																		$row1 = mysql_num_rows($sql1);
																		$row2 = mysql_num_rows($sql2);
																		$row3 = mysql_num_rows($sql3);
																	};

																	if ($opcao == 'codigo'){
																		$data = date('Y-m-d');
																		$sql = mysql_query("SELECT c.nome, p.id, p.id_venda, c.sobrenome, p.data_vencimento, p.valor_parcela, v.data_venda, v.total, p.posicao_parcelas, p.numero_parcelas FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE v.codigo = '$buscar'
																												AND p.pago = 'n'
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql1 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE v.codigo = '$buscar'
																												AND  '$data' > p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql2 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE v.codigo = '$buscar'
																												AND  '$data' < p.data_vencimento
																												AND p.pago = 'n'
																												GROUP BY p.id_venda
																												ORDER BY p.id LIMIT $inicio, $limite");

																	$sql3 = mysql_query("SELECT SUM(p.valor_parcela) FROM parcelas p
																												INNER JOIN cliente c ON c.codigo = p.id_cliente
																												INNER JOIN venda v ON v.codigo = p.id_venda
																												WHERE v.codigo = '$buscar'
																												AND p.pago = 'n'
																												GROUP BY c.codigo
																												ORDER BY p.id LIMIT $inicio, $limite");

																		$row = mysql_num_rows($sql);
																		$row1 = mysql_num_rows($sql1);
																		$row2 = mysql_num_rows($sql2);
																		$row3 = mysql_num_rows($sql3);
																	};




                                $row = mysql_num_rows($sql);
                                if($row == 0){
															            ?>
																							<div class="white_content" id="div"> Nenhuma Busca Encontrada! Verifique se colocou as informações corretamente nos filtros.<br>
																									<img id="imgcerto" src="../images/erro.png" alt=""><br />
																							</div>
																								<div class="black_overlay"></div>
																							</ul>
																					<?php
	                    				 }
											$consulta = mysql_query("SELECT * FROM parcelas");
											$total_registros = mysql_num_rows($consulta);
											$linha1 = mysql_fetch_array($sql1);
											$linha2 = mysql_fetch_array($sql2);
											$linha3 = mysql_fetch_array($sql3);
	                    while($linha = mysql_fetch_array($sql)){
                ?>
								<tbody>
									<tr>
										<td>
										<a id="link_cliente"><?=$linha['id_venda']?></a>

										</td>
										<td>
											<a id="link_cliente"> R$ <?=number_format($linha['total'],2, ',','.')?></a>
										</td>
										<td>
											<a id="link_cliente"><?=$linha['nome'] . ' ' .  $linha['sobrenome']?></a>
										</td>
											<?php
													if($linha['data_venda'] == '0000-00-00'){
														$linha['data_venda'] = 'data não cadastrada!';
													}else{
														$linha['data_venda'] = date('d/m/Y', strtotime($linha['data_venda']));
													}
											 ?>
                    <td>
											<a id="link_cliente"><?=$linha['data_venda']?></a>
										</td>
                    <td>
											<a id="link_cliente"><?=$linha['posicao_parcelas'] . '/' . $linha['numero_parcelas']?></a>
										</td>
                    <td>
                      <?php
														$linha['data_vencimento'] = date('d/m/Y', strtotime($linha['data_vencimento']));
											 ?>
                      <a id="link_cliente"><?=$linha['data_vencimento']?></a>
                    </td>
                    <td>
                      <a id="link_cliente"><?=$linha['valor_parcela']?></a>
                    </td>
                    <td>
											<a id="ptqp" href="formPagamento.php?codigo=<?=$linha['id']?>"class="btn btn-default"></a>

										</td>
									</tr>
								</tbody>

								<?php
										}
								?>
								<div class="form-group col-xs-4 pull-left">
									<h6 align = "left" >
										<b id = "total_parcelas_vencidas">Valor das parcelas vencidas:	R$ </b> <span id="total_parcelas_vencidas">	<?=number_format($linha1['SUM(p.valor_parcela)'], 2, ',', '.');?></span>

									</br>

									<h6 align = "left" >
										<b id = "total_parcelas_nao_vencidas">Valor das parcelas não vencidas:	R$ </b> <span id="total_parcelas_nao_vencidas">	<?=number_format($linha2['SUM(p.valor_parcela)'], 2, ',', '.');?></span>

									</br>

									<h6 align = "left" >
										<b id = "total_parcelas_geral">Total em parcelas:	R$ </b> <span id="total_parcelas_geral">	<?=number_format($linha3['SUM(p.valor_parcela)'], 2, ',', '.');?></span>

								</div>

                <?php
									mysql_close();
                ?>
							</table>

						</div>
						<div class="panel-footer">
							<?php
								$total_paginas = Ceil($total_registros / $limite);

								echo '<ul class="pagination">';
								echo '<li class="previous"><a href="vendas_listadas.php?pag=1"> Primeira página</a></li>';
										for($i=1; $i <= $total_paginas; $i++)

										if ($pagina == $i) {
											echo "<li class='active'><a href='vendas_listadas.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										else
										{
											echo "<li><a href='vendas_listadas.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										echo '<li class="previous"><a href="vendas_listadas.php?pag='.$total_paginas.'"> Última página</a></li>';
								echo '</ul>';
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row text-center"></div>
		</div>
	</section>

	<?php
      include ("../footer.php");
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

	<!-- sweet alert -->
	<script
		src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>

</body>

</html>
