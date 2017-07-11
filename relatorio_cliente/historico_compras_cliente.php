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
  <title>Relatório</title>
	<!-- sweet alert -->
	<script
		src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

	<!-- mensagens -->
	<script src="../js/mensagens.js"></script>
</head>

<body id="page-top" class="index">

	<?php
    include ("../menu.php");
		@include("../conexao.php");
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

			<br>

			<div class="row">
				<div class="col-lg-12 text-center">
					<form class="control">
						<div class="input-"></div>
					</form>
					<div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
							<h2 id="clientes_titulo" class="panel-title">
								<i class="fa fa-tag"></i> Histórico de compras
							</h2>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th id="opcoes">
											<center>Data</center>
										</th>
										<th>
											<center>Descrição da atividade</center>
										</th>

									</tr>
								</thead>

								<?php
                                  @$data_inicial = $_POST['data_inicial'];
                                  @$data_final = $_POST['data_final'];
                                  @$nome = $_POST['nome'];
                                  @$sobrenome = $_POST['sobrenome'];
																


                                  $sql = mysql_query("SELECT c.nome, c.sobrenome, f.descricao, v.codigo, v.data_venda, v.total FROM venda v
                                    INNER JOIN cliente c ON c.codigo = v.id_cliente
                                    INNER JOIN forma_pagamento f ON v.forma_pagamento = f.codigo
                                    WHERE c.nome LIKE '%".$nome."%' AND c.sobrenome LIKE '%".$sobrenome."%'
                                    AND v.data_venda BETWEEN '$data_inicial' AND '$data_final' ORDER BY v.codigo");

                  								$row = mysql_num_rows($sql);

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
                                while($linha = mysql_fetch_array($sql)){
                            ?>
								<tbody>
									<tr>
                    <?php
                        $data = $linha['data_venda'];
                        $linha['data_venda'] = date('d/m/Y', strtotime($data));
                     ?>
										<td>
											<a id="link_cliente"><?=$linha['data_venda']?></a>
										</td>
                    <td>
											<a id="link_cliente" >Comprou R$ <?=number_format($linha['total'],2, ',','.')?> e pagou no <?=$linha['descricao']?></a>
										</td>

                    <td>
											<a id="link_cliente" ><?=$linha['codigo']?></a>
										</td>
									</tr>
								</tbody>
								<?php
                  }
                  mysql_close();
                ?>
							</table>

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
