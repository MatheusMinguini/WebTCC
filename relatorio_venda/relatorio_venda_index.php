<?php
      session_start();
      if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
          header("Location: index.php");
          exit;
      }
  include '../conexao.php';
  $query = mysql_query("SELECT * FROM forma_pagamento");

  $query1 = mysql_query("SELECT * FROM cliente ORDER BY nome");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mara Modas - Relatório</title>

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
                          <h2 id="clientes_titulo" class="panel-title"><i class = "fa fa-list-alt"></i> Relatórios de Venda</h2>
                        </div>
                        <div class="panel-body">

                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Relatório do total vendido por periodo
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="total_vendido.php" method="post">
                                    <div class="row">
                                      <div class="col-md-3">

                                      </div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>

                                        <div class="col-md-2">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    RELATÓRIO DO TOTAL VENDIDO POR FORMA DE PAGAMENTO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="total_forma_pagamento.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-4">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>
                                        <div class=" col-md-4">
                      										<label class="control-label">Selecione  forma de pagamento</label>
                      										 <select class="form-control" name="forma_pagamento">
                      												<option value="">Escolha a forma de pagamento</option>
                      													<?php while($forma_pagamento = mysql_fetch_array($query)) { ?>
                      												<option value="<?=$forma_pagamento['codigo'] ?>">
                      													<?=$forma_pagamento['descricao'] ?>
                      												</option>
                      													<?php } ?>
                      										</select> <br>
                      									</div>
                                        <div class="form-group col-xs-2 pull-right">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    RELATÓRIO DO GRUPO DE PRODUTOS MAIS VENDIDO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="grupo_mais_vendido.php" method="post">
                                    <div class="row">
                                      <div class="col-md-3">

                                      </div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>
                                        <div class="col-md-2">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingFour">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    RELATÓRIO DO GRUPO DE PRODUTOS MENOS VENDIDO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="grupo_menos_vendido.php" method="post">
                                    <div class="row">
                                      <div class="col-md-3">

                                      </div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>
                                        <div class="col-md-2">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingFive">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    RELAÇÃO DE VENDAS POR PERÍODO
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="vendas_listadas.php" method="post">
                                    <div class="row">
                                      <div class="col-md-3">

                                      </div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>
                                        <div class="col-md-2">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingSix">
                              <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Cliente que mais comprou na loja por período
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                <div class="panel-body">
                                  <form class="form-horizontal" action="#" method="post">
                                    <div class="row">
                                      <div class="col-md-3">

                                      </div>
                                        <div class="col-md-3">
                                          <label>Data Inicial</label>
                                            <input class="form-control data_inicial" type="date" name="data_inicial">
                                        </div>
                                        <div class="col-md-3">
                                          <label>Data Final</label>
                                            <input class="form-control data_final" type="date" name="data_final">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                              <label for="client_id">Selecione o cliente <span class="obrigatorio">*</span></label>
                                              <select  required id="client_id" name="client_id" class="selectpicker client_id" data-live-search="true" title="Selecione o cliente.">
                                                <?php
                                                  while($cliente = mysql_fetch_array($query1)) { ?>
                                                  <option value="<?=$cliente['codigo'] ?>"><?=$cliente['nome'] ?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                          <br>
                                            <button class="btn btn-success btn-sm" type="submmit" name="button" >Gerar</button>
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

    <!-- /importaçao select bootstrap - pesquisar -->
    <script src="../js/bootstrap-select.min.js"></script>

</body>

</html>
