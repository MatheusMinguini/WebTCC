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
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


		<!-- sweet alert -->
		<script
			src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

		<!-- mensagens -->
		<script src="../js/mensagens.js"></script>

    <!-- Theme CSS -->
    <link href="../css/agency2.css" rel="stylesheet">
</head>

<body id="page-top" class="index">

    <?php
    include ("../menu.php");
     ?>
<!-- Header -->
    <header>
        <div class="container">

            <div class="intro-text">
                <div class = "intro-lead-in">

                </div>

            </div>
        </div>
    </header>

    <section id="clients">
          <div class="container">



              <div class="row">
                  <div class="col-lg-12 text-center">
                    <form class="control">
                        <div class="input-">

                        </div>
                    </form>
                    <div class="panel panel-default">
                        <div id="panel-heading" class="panel-heading">
                          <h2 id="clientes_titulo" class="panel-title"><i class = "fa fa-list-alt"></i> Histórico do cliente</h2>
                        </div>
                        <div class="panel-body">

                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Histórico de compras POR PERÍODO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="historico_compras_cliente.php" method="post">
                                    <div class="row">
																				<div class="col-md-3">
																					<label>Nome</label>
																					<input class="form-control" type="text" name="nome">
																				</div>
																				<div class="col-md-3">
																					<label>Sobrenome</label>
																					<input class="form-control" type="text" name="sobrenome">
																				</div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>
																				<div class="pull-right">
																					<br>
																						<button class="btn btn-success btn-lg" type="submmit" name="button" >Gerar</button>
																				</div>
                                    </div>
                                  </form>
                                </form>
                                </div>
                              </div>
                            </div>


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Histórico de pagamentos POR PERÍODO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
																	<form class="form-horizontal" action="historico_pagamentos_clientes.php" method="post">
                                    <div class="row">
																			<div class="col-md-3">
																				<label>Nome</label>
																				<input class="form-control" type="text" name="nome">
																			</div>
																			<div class="col-md-3">
																				<label>Sobrenome</label>
																				<input class="form-control" type="text" name="sobrenome">
																			</div>
																			<div class="col-md-3">
																				<label>Data Inicial</label>
																					<input class="form-control data_inicial" type="date" name="data_inicial">
																			</div>
																			<div class="col-md-3">
																				<label>Data Final</label>
																					<input class="form-control data_final" type="date" name="data_final">
																			</div>
																			<div class="pull-right">
																				<br>
																					<button class="btn btn-success btn-lg" type="submmit" name="button" >Gerar</button>
																			</div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>





                        </div>
                      </div>
                    </div>
                  </div>
              <div class="row text-center">

              </div>
          </div>
      </section>



<!-- Modais -->
      <div class="modal fade" id="headingFour" tabindex="-1" role="dialog" arial-labelleby="MyModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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

    <!-- JS Moment -->
    <script src="../js/moment.js"> </script>

    <!-- sweet alert -->
    <script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>

    <script>
    $('.data_inicial').on('change', function () {
       var dataInicial = moment($(this).val(), 'YYYY-MM-DD');

       var dataFinal = moment($('.data_final').val(), 'YYYY-MM-DD');

       if (dataInicial.isAfter(dataFinal)) {
         sweetAlert("Oops...", "A DATA FINAL NÃO DEVE SER MENOR DO QUE A INICIAL", "error");
           $(this).val('');
       }

   });

   $('.data_final').on('change', function () {
       var dataFinal = moment($(this).val(), 'YYYY-MM-DD');

       var dataInicial = moment($('.data_inicial').val(), 'YYYY-MM-DD');

       if (dataInicial.isAfter(dataFinal)) {
           sweetAlert("Oops...", "A DATA FINAL NÃO DEVE SER MENOR DO QUE A INICIAL", "error");
           $(this).val('');
       }

   });

    </script>

</body>

</html>
