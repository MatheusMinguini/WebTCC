<?php
    session_start();
    if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
        header("Location: index.php");
        exit;
    }

include '../conexao.php';

$query = mysql_query("SELECT codigo, nome FROM cliente ORDER BY nome");
$query1 = mysql_query("SELECT codigo, descricao, acrescimo FROM forma_pagamento ORDER BY descricao");

?>

<!-- sweet alert -->
<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

<!-- mensagens -->
<script src="../js/mensagens.js"></script>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mara Modas - Software</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- sweet alert -->
  	<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

    <!-- Theme CSS -->
    <link href="../css/agency2.css" rel="stylesheet">

    <link href="../css/bootstrap-select.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- mensagens -->
    <script src="../js/mensagens.js"></script>

</head>

<body id="page-top" class="index">

    <script type="text/javascript">
      var onload ='setFocusToTextBox()';
    </script>


    <?php
			include ("../menu.php");
    	@$msg = $_REQUEST['msg'];
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
                    <div class="panel panel-default">
                        <div id="panel-heading" class="panel-heading">
                          <h2 id="clientes_titulo" class="panel-title"><i class = "fa fa-cart-plus"></i> Venda</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="form-group col-md-4">
                                  <div class="form-group">
                                    <label for="client_id">Selecione o cliente <span class="obrigatorio">*</span></label>
                                    <select  required id="client_id" name="client_id" class="selectpicker client_id" data-live-search="true" title="Selecione o cliente.">
                                      <?php
                                        while($cliente = mysql_fetch_array($query)) { ?>
                                        <option value="<?=$cliente['codigo'] ?>"><?=$cliente['nome'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group col-md-4">
                                    <label class="control-label">Data da compra <span class="obrigatorio">*</span></label>
                                    <input required type="date" id="data_compra" name="data_compra" class="form-control data_compra">
                              </div>

                              <div class="form-group col-md-4">
                                  <label class="control-label">Forma de pagamento <span class="obrigatorio">*</span></label>
                                  <select  required class="form-control forma_pagamento" id="formaPagamento" name="forma_pagamento">
                                    <option value="">Forma de pagamento</option>
                                    <?php
                                        while($forma_pagamento = mysql_fetch_array($query1)) {

                                          if ($forma_pagamento['descricao'] == "crediario"){?>
                                            <option name="crediario" value="<?=$forma_pagamento['codigo'] ?>"><?=$forma_pagamento['descricao']?></option>
                                          <?php  }else{?>
                                        <option value="<?=$forma_pagamento['codigo'] ?>"><?=$forma_pagamento['descricao']?>

                                        </option>
                                    <?php }}?>
                                  </select>
                              </div>

                            </div>


                              <div class="row" id="crediarioForm">
                                <fieldset id="dados_crediario">
                                  <legend>Dados do crediário </legend>
                                <div>
                                  <div class="col-md-4">
                                    <label for="parcelas">Números de parcelas</label>
                                    <input class="form-control" id="parcelas" name="parcelas" placeholder="Números de parcelas" />
                                  </div>
                                  <div class="col-md-4">
                                    <label for="parcelas">Dias entre as parcelas</label>
                                    <input class="form-control" id="numero_dias" name="numero_dias" placeholder="Números de dias" />
                                  </br>
                                  </div>
                                </div>
                                </fieldset>
                              </div>
</br>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label"><i class="glyphicon glyphicon-barcode"></i> Código de barras do produto <span class="obrigatorio">*</span></label>
                                    <input required="required" type="text" class="form-control" id="codigo_barra"  name="codigo_barra">
                                </div>
                            </div>

                            <!-- js vue
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success pull-right" id="addProduto">Adicionar Produto</button>
                                </div>
                            </div>-->

                            <table id="produtosVenda" class="table">
                              <thead>
                                <tr>
                                  <th>
                                    <center>Produto</center>
                                  </th>
                                  <th>
                                  <center> Preço </center>
                                  </th>
                                  <th>
                                    <center>Opções</center>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>

                        <div class="row md-12">
                            <div class="form-group col-xs-2 pull-right">
                              <label for="inputlg">Total da venda</label>
                              <input readonly class="form-control input-lg disabled total_venda" id="total" type="number" step=0.01 >
                            </div>
                            <div class="form-group col-xs-0 pull-right">
                            <h3 id="simbolo">=</h3>
                            </div>

                            <div class="form-group col-xs-2 pull-right  ">
                              <label for="inputlg">Desconto</label>
                              <input class="form-control input-lg desconto" id="total" type="number" value="00.00" step=0.01>
                            </div>
                            <div class="form-group col-xs-2 pull-left  ">
                              <label for="inputlg">Acréscimo</label>
                              <input class="form-control input-lg disabled acrescimo" id="total" type="number" disabled>
                            </br>
                              <button id="button_plus" class="btn formTabs" style="background-color: #808080; color: white; border-color: #A9A9A9;"><i clas="fa fa-dolar"></i>Incluir acréscimo</button>
                            </div>

                        </div>

                        </div>
                      </div>
                    </div>




                    <div class="form-actions right pull-right">
                      <button class="btn formTabs" style="background-color: red; color: white;">Cancelar venda</button>

                      <button class="btn formTabs" style="background-color: green; color: white;" id="finalizarVenda">Finalizar venda</button>
                    </div>



                    <br>



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


      <?php
      include ("../footer.php")
       ?>





    <!-- js vue -->
    <script src="../js/vue.min.js"></script>
    <script src="../js/venda.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- JS Moment -->
  	<script src="../js/moment.js"></script>

    <!-- Bootbox -->
  	<script src="../js/bootbox.min.js"></script>

    <!-- sweet alert -->
  	<script src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/agency.min.js"></script>


    <script>

        $("#formaPagamento").change(function(){
            //window.onload = function(){
            $("#codigo_barra").focus();
            //document.getElementById('codigo_barra').focus();
        //};
       });


    document.getElementById('data_compra').valueAsDate = new Date();

      $('.data_compra').on('change', function() {
        var dataEntrada = moment($(this).val(), 'YYYY-MM-DD');

        if (dataEntrada.isAfter()) {
           sweetAlert("Oops...", "A data de entrada não deve ser maior do que a data de hoje", "error");
            $(this).val('');
          }
      });

        $("#formaPagamento").change(function(){
            $(this).find("option:selected").each(function(){
                if($(this).attr("name")=="crediario"){
                    console.log(this);
                    $("#crediarioForm").show();
                }
                else{
                    $("#crediarioForm").hide();
                }
            });
        }).change();



        $("#finalizarVenda").on('click', function(){
          var dadosDoForm = {};

          dadosDoForm.id_client = $("#client_id option:selected").val();
          dadosDoForm.forma_pagamento = $("#formaPagamento option:selected").val();
          dadosDoForm.data_venda = $("#data_compra").val();
          dadosDoForm.valor_pago = $("#valor_pago").val();
          dadosDoForm.parcelas = $("#parcelas").val();
          dadosDoForm.numero_dias = $("#numero_dias").val();
          dadosDoForm.total = $("#total").val();
          dadosDoForm.itensVenda = itensVenda;

          var dadosString = JSON.stringify(dadosDoForm);
          console.log(dadosString);
           $.ajax({
                type: "POST",
                url: "http://localhost:8080/maraloja/venda/cadastro_venda.php",
                data: {data : dadosString},
                cache: false,
                success: function(data){
                  console.log(data);
                    var dialog = bootbox.dialog({
                        title: 'Enviando requisição para o Banco de dados',
                        message: '<p><i class="fa fa-spin fa-spinner"></i> Carregando...</p>'
                    });
                      dialog.init(function(){
                          setTimeout(function(){
                            dialog.find('.bootbox-body').html('Venda registrada com sucesso!');

                    }, 4000);

                  });
                }
            });
        });


//busca a forma de pagamento no banco
        var acrescimo = 0;
         $('.forma_pagamento').on('change', function(){
           var forma_pagamento_id = $(this).val();
           $.ajax({
             url: "http://localhost:8080/maraloja/venda/buscaAcrescimo.php?codigo=" + forma_pagamento_id,
             dataType: "json",
             success : function(data){
               if(data){
                 acrescimo = parseFloat(data[1]);
                 $('.acrescimo').val(acrescimo);
               } else {
                 alert('O Ajax não retornou nada');
               }
             },
             error: function(err){
               alert('Erro ao trazer o acréscimo!');
             }
           });
         });

         var total = 0;
         var itensVenda = [];
         var desconto = 0;
         var total_inicio = 0;

         $("#codigo_barra").on('change', function() {
           var codigoBarra = $('#codigo_barra').val();
           var cliente = $('#client_id').val();
           var forma_pagamento = $('#formaPagamento').val();




           if (codigoBarra && cliente && forma_pagamento){
             $.ajax({
               url : "http://localhost:8080/maraloja/venda/buscaProduto.php?codigoBarra=" + codigoBarra,
                 dataType : "json",
                 success : function(data){
                   if (data) {
                       total = total + parseFloat(data[3]);
                       total_inicio =  total;
                       $('#total').val(parseFloat(total));
                       itensVenda.push(data[0]);
                       $('#produtosVenda tbody').append('<tr class="child"><td align="center">' + data[2] +'</td><td align="center">' +  data[3] +'</td><td align="center"><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td></tr>');
                       $('.client_id').attr('disabled', true);
                       $('.data_compra').attr('disabled', true);
                       $('#formaPagamento').attr('disabled', true);
                       $('#codigo_barra').val("");
                   } else {
                     alert('errado');
                   }
                 },
                 error: function(err){
                   alert('não foi possivel buscar o produto');
                 }
             });
           } else {
              erro_preenchimento_venda();
           }
         })

         var total1 = 0;
         var total_venda = 0;



//calcula acrescimo no total e o desconto
         var desconto = 0;
         var acrescimo = 0;
         var total_antigo = 0;
         var total_atual = 0;
         var novo_total = 0;
         var total_desconto = 0;
         $('#button_plus').on('click', function() {
                       acrescimo = $('.acrescimo').val();
                       total_atual = $('#total').val();
                       novo_total = parseFloat(total_atual) +  parseFloat(acrescimo);
                       $('#total').val(parseFloat(novo_total));
                       bootbox.alert("O acréscimo foi adicionado ao total da compra'");
                       $('.desconto').on('change', function() {
                         desconto = $(this).val();
                         if (desconto == 0) {
                           total_antigo = parseFloat(total_inicio) + parseFloat(acrescimo);
                           $('#total').val(total_antigo);
                          } else {
                           total_venda = parseFloat(total_inicio);
                           total_desconto = parseFloat(total_venda) + parseFloat(acrescimo) -  parseFloat(desconto);
                           $('#total').val(total_desconto);
                         }

                       });

         });


  	</script>


  <!-- /importaçao select bootstrap - pesquisar -->
  <script src="../js/bootstrap-select.min.js"></script>

</body>

</html>
