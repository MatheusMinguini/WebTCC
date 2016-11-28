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

    <title>Mara Modas - Clientes</title>

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
    swal({
      title: "Sucesso!",   text: "Cliente cadastrado com sucesso!",   type: "success",   confirmButtonText: "Fechar"
    });
    </script>
    <?php
  }
    ?>
<?php
  if($msg=='alterado_sucesso'){

  ?>
    <script type="text/javascript">
      swal({
          title: "Sucesso!",   text: "Usuário alterado com sucesso!",   type: "success",   confirmButtonText: "Fechar"
        });
    </script>
    <?php
  }
  ?>
  <?php
    if($msg=='erro'){

    ?>
      <script type="text/javascript">
        sweetAlert ("Oops...", "Something went wrong!", "error");
      </script>
      <?php
    }
    ?>



    <script type="text/javascript">
    function confirmExcluir(id)
          {
          swal({
              title: "Excluir",
              text: "Confirma a exclusão?",
              type: "error",
              showCancelButton: false,
              confirmButtonClass: 'btn-success',
              confirmButtonText: 'OK!',
              closeOnConfirm: false
           }, function () {
              window.location.href = 'deletrow.php?id=' + id;
           });
}
    </script>
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
                          <h2 id="clientes_titulo" class="panel-title">Opções</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-4">
                                  <a class="btn btn-info btn-lg" href=".php" type="button" name="button" style="background-color: black; color: white;"><i class="fa fa-usd"></i> Receber de um cliente</a>
                              </div>
                              <div class="col-md-4">
                                  <a class="btn btn-info btn-lg" href="index_pagamento.php" type="button" name="button" style="background-color: black; color: white;"><i class="fa fa-credit-card"></i> Cadastrar forma de pagamento</a>
                              </div>
                              <div class="col-md-4">
                                  <a class="btn btn-info btn-lg" href="" type="button" name="button" style="background-color: black; color: white;"><i class="glyphicon glyphicon-list-alt"></i> Consultar contas em aberto</a>
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
