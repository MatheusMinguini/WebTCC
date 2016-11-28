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
								<i class="fa fa-tag"></i> Grupo mais vendido
							</h2>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th id="opcoes">
											<center>Grupo mais vendido</center>
										</th>
										<th>
											<center>Valor total em vendas</center>
										</th>
									</tr>
								</thead>

								<?php
                                  @$data_inicial = $_POST['data_inicial'];
                                  @$data_final = $_POST['data_final'];
                                  $sql = mysql_query("SELECT g.nome, SUM(v.total) FROM venda v
                                                      INNER JOIN itens_venda i ON v.codigo = i.id_venda
                                                      INNER JOIN  produto p  ON p.codigo = i.id_produto
                                                      INNER JOIN grupo g ON g.codigo = p.grupo
                                                        WHERE v.data_venda BETWEEN '$data_inicial' AND '$data_final'
                                                      GROUP BY g.nome
                                                      ORDER BY sum(v.total) DESC LIMIT 1");
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

										<td>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"><?=$linha['nome']?></a>
										</td>
                    <td>
											<a id="link_cliente" href="detalhe_venda.php?codigo=<?=$linha['codigo']?>"> R$ <?=number_format($linha['SUM(v.total)'],2, ',','.')?></a>
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
