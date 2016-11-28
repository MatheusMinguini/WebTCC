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

    <!-- Theme CSS -->
    <link href="../css/agency2.css" rel="stylesheet">
    <!-- sweet alert -->
    <script
    	src="../css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
    	href="../css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <?php
    include ("../menu.php")
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
            <form class="" action="index_cliente.php" method="post">
              <div class="input-group col-md-4 col-md-offset-4">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-search"></span>
                          </span>
                      <input type="text" name="buscar" placeholder="Buscar por nome do cliente" class="form-control"/>
                          <span class="input-group-btn">
                              <button type="submit" class="btn btnRight">Buscar</button>
                          </span>
                  </div><br>
            </form>


              <div class="row">
                  <div class="col-lg-12 text-center">
                    <div class="panel panel-default">
                        <div id="panel-heading" class="panel-heading">
                          <h2 id="clientes_titulo" class="panel-title"><i class = "fa fa-cart-plus"></i> Vendas</h2>
                          <a id = "botao-adicionar" class="btn btn-default" href="formVenda.php"><i class="fa fa-plus"></i> Adicionar</a>
                        </div>
                        <div class="panel-body">
                          <table class= "table table-bordered">
                            <thead id="titulo">
                                <tr>
                                  <th id ="opcoes"><center><i class="fa fa-cog"></i></center></th>
                                  <th><center>Nome</center></th>

                                </tr>
                            </thead>
                            <?php
                                @include("../conexao.php");
                                @$buscar = $_REQUEST['buscar'];
                                $sql = mysql_query("SELECT * FROM cliente WHERE nome LIKE '%".$buscar."%' ORDER BY nome ");
                                $row = mysql_num_rows($sql);
                                if($row == 0){
                                 ?>
                                    <div class="white_content" id="div">Nenhuma Busca Encontrada!<br><img id="imgcerto" src="../images/erro.png" alt=""><br/></div>
                                    <div class="black_overlay"></div>
                                <?php
                                }
                                while($linha = mysql_fetch_array($sql)){
                            ?>
                            <tbody>
                              <tr>
                                <td>
                                      <a href="#" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                <td><?=$linha['nome']?></td>
                              </tr>
                            </tbody>
                            <?php }
                              mysql_close();
                            ?>
                          </table>

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
