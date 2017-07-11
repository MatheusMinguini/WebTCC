<?php
session_start();
if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
    header("Location: index.php");
    exit;
}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "SELECT * FROM parcelas WHERE id=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);

$numero_parcela = $resultado->posicao_parcelas;
$valor_parcela = $resultado->valor_parcela;

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Mara Modas - Pagamento</title>

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
								<i class="glyphicon glyphicon-usd"></i> Parcela
							</h2>
							<a href="index_crediario.php" id="botao-adicionar" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
              <table class="table table-bordered">
								<thead id="titulo">
									<tr>
										<th>
											<center>Número da Parcela</center>
										</th>
										<th >
											<center>Número da venda</center>
										</th>
										<th>
											<center>Valor da parcela</center>
										</th>
                  </tr>
                </thead>
                <tbody>
									<tr>
										<td>
										    <a id="link_cliente"><?=$numero_parcela?></a>
										</td>
                    <td>
										    <a id="link_cliente"><?=$id_venda?></a>
										</td>
                    <td>
										    <a id="link_cliente">R$ <?=$valor_parcela?></a>
										</td>
                  </tr>
                </tbody>
              </table>
							<form class="form-horizontal" action="pagamento.php" method="post">
								<div class="form-group">
									<div class="page-header">
										<h4 id="cabecalho-form-cliente" align="left">Formulário de pagamento</h4>
									</div>
                  <input type="hidden" name="codigo" value="<?php echo $id;?>">
                  <input type="hidden" name="valor_parcela" value="<?=$valor_parcela?>">
                  <input type="hidden" name="id_usuario" value="<?= $_SESSION['idSession'] ?>">

									<div class="col-md-4">
										<label>Data Pagamento</label>
                    <input id="data_pagamento" type="date" name="data_pagamento" class="form-control information_input">
									</div>
									<div class="col-md-4">
										<label>Valor pago: </label>
                    <input required  type="number" step= 0.01 name="valor_pago" class="form-control valor_pagamento information_input" maxlength="15">
									</div>
									<div class="col-md-4">
										<label>Resíduo</label>
                    <input  align="center" type="number" step= 0.01 name="residuo" class="form-control total_restante information_input" maxlength="15">
									</div>
								</div>
						 </div>


								<div class="row"	>
								    <div clas="col-md-4">
										    <button class="btn btn-success" type="submit">
											        Efetuar pagamento <i class="glyphicon glyphicon-ok"></i>
								        </button>
									  </div>
							</form>

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
	<script src="../js/plugin/src/jquery.mask.js"></script>
	<script src="../js/plugin/mask.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

  <!-- JS Moment -->
  <script src="../js/moment.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/contact_me.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/agency.min.js"></script>

  <script>
        $('#data_pagamento').on('change', function() {
          var dataEntrada = moment($(this).val(), 'YYYY-MM-DD');

          if (dataEntrada.isAfter()) {
             sweetAlert("Oops...", "A data de entrada não deve ser maior do que a data de hoje", "error");
              $(this).val('');
            }
        });
        document.getElementById('data_pagamento').valueAsDate = new Date();

        <!-- Verifica se valor pago é menor que valor da parcela -->
            var valor = "<?php print $valor_parcela; ?>";
            $('.valor_pagamento').on('change', function() {
                var total_pago = $('.valor_pagamento').val();
                if( total_pago < valor){
                    sweetAlert("Cuidado...", "O valor pago é menor que o valor da parcela, a parcela não será quitada enquanto o valor nao atingir o total", "error");
                }
                var residuo = valor - total_pago;
                $('.total_restante').val(parseFloat(residuo));
            });
        <!-- Insere no input o valor do resíduo da parcela -->

  </script>

</body>
</html>
