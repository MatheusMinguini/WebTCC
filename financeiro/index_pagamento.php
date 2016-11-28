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

<title>Mara Modas - Financeiro</title>

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
<link rel="stylesheet" type="text/css"
	href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

	<!-- mensagens -->
	<script src="../js/mensagens.js"></script>

<!-- Theme CSS -->
<link href="../css/agency2.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

	<?php
    include ("../menu.php");
    @$msg = $_REQUEST['msg'];

     ?>

	<?php
      if($msg=='cadastro_sucesso'){
  ?>
			<script type="text/javascript">
				sucesso_cadastro_pagamento();
			</script>
	<?php
  		}
  ?>

	<?php
  		if($msg=='alterado_sucesso'){
  ?>
		<script type="text/javascript">
				sucesso_altera_pagamento();
		</script>
	<?php
  	}
  ?>
	<?php
    if($msg=='sucesso_excluir_pagamento'){
    ?>
	<script type="text/javascript">
		sucesso_exclusao_pagamento();
	</script>
	<?php
    }
  ?>
	<?php
    if($msg=='erro_excluir_pagamento'){
    ?>
	<script type="text/javascript">
		erro_excluir_pagamento();
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
			<section id="clients">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="panel panel-default">
								<div id="panel-heading" class="panel-heading">
									<h2 id="clientes_titulo" class="panel-title">
										<i class="glyphicon glyphicon-credit-card"></i>  Forma de pagamento <i class="glyphicon glyphicon-usd"></i>
									</h2>
									<a id="botao-adicionar" class="btn btn-default"
										href="formPagamento.php"><i class="fa fa-plus"></i>
										Adicionar</a>
								</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<thead id="titulo">
											<tr>
												<th id="opcoes">
													<center>
														<i class="fa fa-cog"></i>
													</center>
												</th>
												<th>
													<center>Descrição</center>
												</th>
											</tr>
										</thead>
										<?php
                                @include("../conexao.php");
                                @$buscar = $_REQUEST['buscar'];
                                $sql = mysql_query("SELECT * FROM forma_pagamento ORDER BY descricao");
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
                                while($linha = mysql_fetch_array($sql)){
                            ?>
										<tbody>
											<tr>
												<td>
													<a href="formAlteraPagamento.php?codigo=<?=$linha['codigo']?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
													<a href="#" onclick="confirma_excluir_pagamento(<?=$linha['codigo']?>);" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
												</td>
												<td>
													<a id="link_cliente" href="detalhe_pagamento.php?codigo=<?=$linha['codigo']?>"><?=$linha['descricao']?></a>
												</td>
											</tr>
										</tbody>
										<?php }
                      mysql_close();
                    ?>
									</table>

								</div>
							</div>
						</div>
					<div class="row text-center"></div>
				</div>
			</div>
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
