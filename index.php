

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Mara Modas - Software</title>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!-- sweet alert -->
<script src="css/sweetalert-master/sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert-master/sweetalert-master/dist/sweetalert.css">

<!-- mensagens -->
<script src="js/mensagens.js"></script>

<!-- Theme CSS -->
<link href="css/login.css" rel="stylesheet">

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
          if($msg=='errado_usuario'){
          ?>
          <script type="text/javascript">
             erro_login_usuario();
          </script>
          <?php
          }
          ?>

          <?php
          if($msg=='errado_senha'){
          ?>
          <script type="text/javascript">
             erro_login_senha();
          </script>
          <?php
          }
          ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>Entre com o usuário</label>
                    <input type="text" placeholder="Usuário" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" name="login"/>
                </div>
            </div>

            <div class="wrap">
                <p class="form-title">Entrar</p>
                <form class="login" action="login/login.php" method="POST">
                <input type="text" placeholder="Usuário" name="login" />
                <input type="password" placeholder="Senha" name="senha" />
                <input type="submit" value="Entrar" class="btn btn-success btn-sm" name="entrar" />

                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Lembrar-me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascript:void(0)" class="forgot-pass">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>


                </form>
            </div>
        </div>
    </div>
    <div class="posted-by">Feito por: <a href="http://www.jquery2dotnet.com">Minguini's</a></div>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/login.js"></script>
