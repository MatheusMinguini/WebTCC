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

		if(!$pagina)
		{
		    $pagina = 1;
		}

		$inicio = ($pagina * $limite) - $limite + 1;

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
			<form class="form-inline" action="vendas_listadas.php" method="post">
				<div class="input-group col-md-5 col-md-offset-4">
					<span class="input-group-addon">
						<span	class="glyphicon glyphicon-search">	</span>
					</span>
					<input type="text" name="buscar" placeholder="Tentarei buscar para você ..." class="form-control" />
					<span class="input-group-btn">
						<button type="submit" class="btn btnRight">Pesquisar</button>
					</span>
					<select class="form-control" name="opcao">
						<option value="nome">Nome</option>
						<option value="sobrenome">Sobrenome</option>
						<option value="codigo">Código da venda</option>
					</select>
				</div>
				<br>
			</form>
			<br>

			<div class="row">
				<div class="col-lg-12 text-center">
					<form class="control">
						<div class="input-"></div>
					</form>
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="fa fa-tag"></i> Vendas
							</h2>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>

										<th id="opcoes">
											<center>Código da venda</center>
										</th>
										<th>
											<center>Cliente</center>
										</th>
										<th>
											<center>Forma de pagamento</center>
										</th>
                    <th>
											<center>Data</center>
										</th>
                    <th>
											<center>Total</center>
										</th>

									</tr>
								</thead>
								<?php
																@$buscar = $_REQUEST['buscar'];
																@$opcao = $_REQUEST['opcao'];
                                @$data_inicial = $_REQUEST['data_inicial'];
                                @$data_final = $_REQUEST['data_final'];

																	if ($opcao == ''){

																		$sql = mysql_query("SELECT c.nome, f.descricao, v.codigo, v.data_venda, v.total FROM venda v
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												INNER JOIN forma_pagamento f ON v.forma_pagamento = f.codigo
																												WHERE v.data_venda BETWEEN '$data_inicial' AND '$data_final'
																												ORDER BY v.codigo");
																		$row = mysql_num_rows($sql);
																	};

																	if ($opcao == 'nome'){
																		$sql = mysql_query("SELECT c.nome, f.descricao, v.codigo, v.data_venda, v.total FROM venda v
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												INNER JOIN forma_pagamento f ON v.forma_pagamento = f.codigo
																												WHERE c.nome LIKE '%".$buscar."%'");
																		$row = mysql_num_rows($sql);
																	}

																	if ($opcao == 'sobrenome'){
																		$sql = mysql_query("SELECT c.nome, f.descricao, v.codigo, v.data_venda, v.total FROM venda v
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												INNER JOIN forma_pagamento f ON v.forma_pagamento = f.codigo
																												WHERE c.sobrenome LIKE '%".$buscar."%'
																												ORDER BY v.codigo");
																		$row = mysql_num_rows($sql);
																	}

																	if ($opcao == 'codigo'){
																		$sql = mysql_query("SELECT c.nome, f.descricao, v.codigo, v.data_venda, v.total FROM venda v
																												INNER JOIN cliente c ON c.codigo = v.id_cliente
																												INNER JOIN forma_pagamento f ON v.forma_pagamento = f.codigo
																												WHERE v.codigo = $buscar
																												ORDER BY v.codigo");
																		$row = mysql_num_rows($sql);
																	}



            if($row == 0){
            ?>
								<div class="white_content" id="div">
									Nenhuma Busca Encontrada!<br>
									<img id="imgcerto" src="../images/erro.png" alt=""><br />
								</div>
								<div class="black_overlay"></div>
							</ul>
					<?php
          }
							$consulta = mysql_query("SELECT codigo FROM venda WHERE data_venda BETWEEN '$data_inicial' AND '$data_final'");
							$total_registros = mysql_num_rows($consulta);
              while($linha = mysql_fetch_array($sql)){
          ?>
								<tbody>
									<tr>

										<td>
										<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"><?=$linha['codigo']?></a>
										</td>
										<td>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"><?=$linha['nome']?></a>
										</td>
										<td>
											<?php
													if($linha['data_venda'] == '0000-00-00'){
														$linha['data_venda'] = 'data não cadastrada!';
													}else{
														$linha['data_venda'] = date('d/m/Y', strtotime($linha['data_venda']));
													}
											 ?>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"><?=$linha['descricao']?></a>
										</td>

                    <td>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"><?=$linha['data_venda']?></a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"> R$ <?=number_format($linha['total'],2, ',','.')?></a>
										</td>
									</tr>
								</tbody>
								<?php
										}
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
