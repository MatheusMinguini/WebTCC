
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Commerce - Software</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <script src="js/jquery.js"></script>
    <!-- sweet alert -->
    <script src="css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

    <!-- Materealize-->
    <script src="materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">

    <!-- mensagens -->
    <script src="js/mensagens.js"></script>

    <!-- Theme CSS -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include ("conexao.php");
    @$msg = $_REQUEST['msg'];
      echo $msg;

              if($msg=='errado_login'){
              ?>
                 <script type="text/javascript">
                     		erroLogin();
                 </script>
              <?php
                 }
              ?>
              <?php
              if($msg=='sucesso_recupera_senha'){
              ?>
                 <script type="text/javascript">
                  sucessoRecuperaSenha();
                 </script>
              <?php
                 }
              ?>
              <?php
              if($msg=='erro_recupera_senha'){
              ?>
                 <script type="text/javascript">
                  erroRecuperaSenha();
                 </script>
              <?php
                 }
              ?>


               <div class="container" style="background-color: rgba(14, 14, 14, 0.37); width: 50%; margin-top: 10%;">
                      <form class="col s12" action="login/login.php" method="post">
                        <div class="row">
                          <div class="input-field col s6">
                            <input  type="password" id="login" class="validate" name="login">
                            <label for="login">Login</label>
                          </div>
                          <div class="input-field col s6s">
                            <input id="senha" type="password" class="validate" name="senha">
                            <label for="senha">Senha</label>
                          </div>
                        </div>
                        <div class="row">
                          <button class="btn btn-success" name="entrar" type="submit">Entrar</button>
                          <br><br>
                          <a style="color:  white; font-weight:bold;" data-toggle="modal" data-target="#myModal"> Problemas com a senha? </a>
                        </div>
                      </form>
              </div>


        <div class="posted-by">Feito por: <a href="http://www.jquery2dotnet.com">Minguini's</a></div>


    <!-- Modal -->
  <form class="form-horizontal" action="email/recuperacaoSenha.php" method="post">
    <div id="myModal" class="modal fade" role="dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Recuperação de senha</h4>
         </div>
         <div class="modal-body">
           <p>Para recuperar a sua conta, digite o Email cadastrado, enviaremos uma nova senha</p>
           <div class="row">
             <div class="col-md-4">
                 <input required type="text" name="email" class="form-control" placeholder="Email" maxlength="25">
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-success">Recuperar</button>
         </div>
       </div>
    </div>
  </form>

</body>

  <!-- Bootstrap Core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/login.js"></script>
</html>
