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

<title>Mara Modas - Fornecedores</title>

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
		@$pagina = $_GET['pag'];
    @$msg = $_REQUEST['msg'];
		$limite = 5;
		if(!$pagina)
		{
				$pagina = 1;
		}

		$inicio = ($pagina * $limite) - $limite;

     ?>
	<?php
      if($msg=='cadastro_sucesso'){
  ?>
		<script type="text/javascript">
			sucesso_cadastro_fornecedor();
		</script>
	<?php
  	}
  ?>

	<?php
  if($msg=='alterado_sucesso'){
  ?>
		<script type="text/javascript">
			sucesso_altera_fornecedor();
		</script>
	<?php
  }
  ?>

	<?php
    if($msg=='sucesso_exclusao'){
  ?>
		<script type="text/javascript">
			sucesso_exclusao_fornecedor();
		</script>
	<?php
    }
  ?>

	<?php
    if($msg=='erro'){
  ?>
		<script type="text/javascript">
			erro_fornecedor();
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
	</header>

	<section id="clients">
		<div class="container">
			<form class="form-inline" action="index_fornecedor.php" method="post">
				<div class="input-group col-md-5 col-md-offset-4">
					<span class="input-group-addon"> <span
						class="glyphicon glyphicon-search"></span>
					</span> <input type="text" name="buscar" placeholder="Buscar fornecedor..."
						class="form-control" /> <span class="input-group-btn">
						<button type="submit" class="btn btnRight">Buscar</button>
					</span> <select class="form-control" name="opcao">
						<option value="nome">Nome</option>
						<option value="cnpj">CNPJ</option>
					</select>
				</div>
				<br>
			</form>
			<br>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="glyphicon glyphicon-sort"></i> Fornecedores
							</h2>


							<div class="row">
								<a id="botao-adicionar" class="btn btn-default"
									href="formFornecedor.php"><i class="fa fa-plus"></i> Adicionar</a>

							</div>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th id="opcoes"><center>
												<i class="fa fa-cog"></i>
											</center></th>
										<th style="width: 300px;"><center>Nome</center></th>
										<th><center>Telefone</center></th>
									</tr>
								</thead>
								<?php
                                @include("../conexao.php");
																@$buscar = $_REQUEST['buscar'];
                                @$opcao = $_REQUEST['opcao'];
                                if ($opcao == '') {
                                  $opcao = 'nome';
                                }
                                  $sql = mysql_query("SELECT * FROM fornecedor WHERE $opcao LIKE '%".$buscar."%' ORDER BY nome  LIMIT $inicio,$limite ");

                                $row = mysql_num_rows($sql);
                                if($row == 0){
                                 ?>
								<div class="white_content" id="div">
									Nenhuma Busca Encontrada!<br>
									<img id="imgcerto" src="../images/erro.png" alt=""><br />
								</div>
								<div class="black_overlay"></div>
								<?php
                                }
																$consulta = mysql_query("SELECT codigo FROM fornecedor");
																$total_registros = mysql_num_rows($consulta);
                                while($linha = mysql_fetch_array($sql)){
                            ?>
								<tbody>
									<tr>
										<td>
											<a href="formAlteraFornecedor.php?codigo=<?=$linha['codigo']?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
											<a href="#" onclick="confirma_excluir_fornecedor(<?=$linha['codigo']?>);" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
										<td>
											<a id="link_cliente"
												href="detalhe_fornecedor.php?codigo=<?=$linha['codigo']?>">
													<?=$linha['nome']?>
											</a>
										</td>
										<td>
											<a id="link_cliente"
												href="detalhe_fornecedor.php?codigo=<?=$linha['codigo']?>">
												<?=$linha['telefone']?>
										</a>
									</td>

									</tr>
								</tbody>
								<?php }
                              mysql_close();
                            ?>
							</table>

						</div>

						<div class="panel-footer">
							<?php
								$total_paginas = Ceil($total_registros / $limite);

								// .pagination>.active>a {
								// 	background-color: #,
								// 	border-color: #374
								// }
								echo '<ul class="pagination">';
								echo '<li class="previous"><a href="index_fornecedor.php?pag=1"> Primeira página</a></li>';
										for($i=1; $i <= $total_paginas; $i++)

										if ($pagina == $i) {
											echo "<li class='active'><a href='index_fornecedor.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										else
										{
											echo "<li><a href='index_fornecedor.php?pag=" .$i."'>" .$i. "</a></li>";
										}
										echo '<li class="previous"><a href="index_fornecedor.php?pag='.$total_paginas.'"> Última página</a></li>';
								echo '</ul>';
							?>

						</div>
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
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>

</body>

</html>
