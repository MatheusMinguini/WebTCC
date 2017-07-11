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

<title>Mara Modas - Produto</title>

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

</head>

<body id="page-top" class="index">

	<?php
    include ("../menu.php");
		@$pagina = $_GET['pag'];
    @$msg = $_REQUEST['msg'];
		$limite = 5;
		if(!$pagina)
		{
				$pagina = 1;
		}

		$inicio = ($pagina * $limite) - $limite;

     ?>


	</script>
	<!-- Header -->
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-lead-in"></div>

			</div>
	</header>

	<section id="clients">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="panel panel-default">

						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="fa fa-tags"></i> Produtos
							</h2>
						</div>


						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th style="width: 300px;">
											<center><i class="glyphicon glyphicon-barcode"></i> Código de barras</center>
										</th>
										<th>
											<center>Nome</center>
										</th>
                    <th>
											<center>Marca</center>
										</th>
                    <th>
											<center>Modelo</center>
										</th>
										<th>
											<center>Tamanho</center>
										</th>
                    <th>
											<center>Quantidade</center>
										</th>
                    <th>
											<center>Preço</center>
										</th>
									</tr>
								</thead>
								<?php
																@include("../conexao.php");

																@$opcao = $_POST['opcoes'];
                                @$buscar = $_POST['buscar'];
                                @$tamanho = $_POST['tamanho'];


																if ($opcao == 'nome') {
    																$sql = mysql_query("SELECT p.nome, p.codigo_barra, p.marca,p.modelo, p.tamanho, p.quantidade, p.preco_venda FROM produto p
    																			INNER JOIN modelo m ON p.modelo = m.codigo
                                          INNER JOIN marca ma ON p.marca = ma.codigo
    																			WHERE p.vendido = 'n'
    																			AND p.nome LIKE '%".$buscar."%'
    																			ORDER BY p.nome LIMIT $inicio, $limite");
    																$row = mysql_num_rows($sql);
																};
                                if ($opcao == 'modelo') {
    																$sql = mysql_query("SELECT p.nome, p.codigo_barra, ma.marca, m.modelo, p.tamanho, p.quantidade, p.preco_venda FROM produto p
    																			INNER JOIN modelo m ON p.modelo = m.codigo
                                          INNER JOIN marca ma ON p.marca = ma.codigo
    																			WHERE p.vendido = 'n'
    																			AND m.modelo LIKE '%".$buscar."%'
    																			ORDER BY p.nome LIMIT $inicio, $limite");
    																$row = mysql_num_rows($sql);
																};

																if($row == 0){
								?>

      								<div class="white_content" id="div">
          									Nenhuma Busca Encontrada!<br>
          									<img id="imgcerto" src="../images/erro.png" alt=""><br/>
      								</div>
      								<div class="black_overlay"></div>
								<?php
                  }
  										$consulta = mysql_query("SELECT codigo FROM produto WHERE vendido = 'n'");
  										$total_registros = mysql_num_rows($consulta);
                      while($linha = mysql_fetch_array($sql)){
                ?>
								<tbody>
									<tr>



										<td id="link_cliente">
											<?=$linha['codigo_barra']?>
										</td>
										<td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['nome']?>
											</a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['marca']?>
											</a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['modelo']?>
											</a>
										</td>
										<td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['tamanho']?>
											</a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['quantidade']?>
											</a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_produto.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['preco_venda']?>
											</a>
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
								echo '<li class="previous"><a href="index_produto.php?pag=1"> Primeira página</a></li>';
										for($i=1; $i <= $total_paginas; $i++)

										if ($pagina == $i) {
											echo "<li class='active'><a href='index_produto.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										else
										{
											echo "<li><a href='index_produto.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										echo '<li class="previous"><a href="index_produto.php?pag='.$total_paginas.'"> Última página</a></li>';
								echo '</ul>';
							?>
					</div>
				</div>
			</div>
			<div class="row text-center"></div>
		</div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>



</body>

</html>
