<?php
session_start();
if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
    header("Location: index.php");
    exit;
}

include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "select * from cliente WHERE codigo=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);

$nome = $resultado->nome;
$sobrenome = $resultado->sobrenome;
$cpf = $resultado->cpf;
$rg = $resultado->rg;
$data_nascimento = $resultado->data_nascimento;
$telefone = $resultado->telefone;
$celular = $resultado->celular;
$email = $resultado->email;
$logradouro = $resultado->logradouro;
$bairro = $resultado->bairro;
$numero = $resultado->numero;
$cep = $resultado->cep;
$complemento = $resultado->complemento;
$cidade = $resultado->cidade;
$estado = $resultado->estado;
$email = $resultado->email;

?>
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
								<i class="glyphicon glyphicon-floppy-save"></i> Alterar Clientes
							</h2>
							<a href="index_cliente.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
              <form class="form-horizontal" action="altera_cliente.php" method="post">
                <input type="hidden" name="login_usuario" value="<?= $_SESSION['idSession'] ?>" />
                <div class="form-group">
                  <input type="hidden" name="codigo" value="<?php echo $id;?>">
                  <div class="page-header">
                    <h4 id="cabecalho-form-cliente" align="left">Dados
                      Pessoais</h4>
                  </div>

                  <input type="date" name="data_alteracao" id="data_atual"/>

                  <div class="col-md-4">
                    <label>* Nome <span class="obrigatorio">*</span></label><input required type="text" name="nome"
                      class="form-control" placeholder="Nome" maxlength="25" value="<?=$nome?>">
                  </div>
                  <div class="col-md-4">
                    <label>Sobrenome</label><input  type="text"
                      name="sobrenome" class="form-control" placeholder="Sobrenome" maxlength="25"
                      value="<?=$sobrenome?>">
                  </div>
                  <div class="col-md-4">
                    <label>* CPF <span class="obrigatorio">*</span></label><input readonly required id="cpf"
                      type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="20"
                      value="<?=$cpf?>">
                      </br>
                  </div>
                  <div class="col-md-4">
                    <label>* RG <span class="obrigatorio">*</span></label><input readonly required type="text" name="rg"
                      class="form-control" placeholder="RG" maxlength="20" value="<?=$rg?>">
                  </div>
                  <div class="col-md-4">
                    <label>Data de nascimento</label><input id="data" type="date"
                      name="data_nascimento" class="form-control"
                      placeholder="data de nascimento"
                      value="<?=$data_nascimento?>">
                  </div>
                  <div class="col-md-4">
                    <label>* Telefone <span class="obrigatorio">*</span></label>
                    <input required id="telefone" type="text" name="telefone" class="form-control" maxlength="15" value="<?=$telefone?>">
                  </br>
                 </div>

                 <div class="row">
                     <div class="col-md-4">
                       <label>Celular</label>
                       <input id="celular" type="text" name="celular" class="form-control"  maxlength="15" value="<?=$celular?>">
                     </div>
                     <div class="col-md-4">
                       <label>Email</label>
                       <input id="celular" type="text" name="email" class="form-control"  maxlength="30" value="<?=$email?>">
                     </div>
                 </div>

                <div class="page-header">
                  <h4 id="cabecalho-form-cliente" align="left">Localização</h4>
                </div>

                <div class="container">
                  <div class="row pull-left">
                    <p><h6>Digite o <span class="obrigatorio">CEP</span>, buscaremos o endereço baseado nele!</h6></p>
                  </div>
                </div>

                <div class="row col-md-12">
                  <div class="col-md-4">
                    <label>CEP <span class="obrigatorio">*</span></label>
                    <input required id="cep" type="text" name="cep" class="form-control cep" placeholder="CEP" value="<?=$cep?>">
                    <br>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label> Logradouro <span class="obrigatorio">*</span></label><input required type="text" name="logradouro"
                      class="form-control logradouro" placeholder="Rua" maxlength="30" value="<?=$logradouro?>">
                  </div>
                  <div class="col-md-4">
                    <label>Bairro <span class="obrigatorio">*</span></label><input required type="text" name="bairro"
                      class="form-control bairro" placeholder="Bairro" maxlength="30" value="<?=$bairro?>">
                  </div>
                  <div class="col-md-4">
                    <label>Número <span class="obrigatorio">*</span></label><input required type="text" name="numero"
                      class="form-control numero" placeholder="Número" maxlength="10" value="<?=$numero?>">
                    </br>
                  </div>
                  <div class="col-md-4">
                    <label>Complemento </label><input type="text" name="complemento"
                      class="form-control complemento" placeholder="Número" maxlength="10" value="<?=$complemento?>">
                    </br>
                  </div>
                  <div class="col-md-4">
                    <label>Cidade <span class="obrigatorio">*</span></label><input required type="text" name="cidade"
                      class="form-control cidade" placeholder="Cidade" maxlength="25" value="<?=$cidade?>">
                  </div>
                  <div class="col-md-4">
                    <label>Estado <span class="obrigatorio">*</span></label>
                    <select class="form-control estado" name="estado">
                          <option value="<?=$estado?>"><?=$estado?></option>
                          <option value="AC">Acre</option>
                          <option value="AL">Alagoas</option>
                          <option value="AP">Amapá</option>
                          <option value="AM">Amazonas</option>
                          <option value="BA">Bahia</option>
                          <option value="CE">Ceará</option>
                          <option value="DF">Distrito Federal</option>
                          <option value="ES">Espirito Santo</option>
                          <option value="GO">Goiás</option>
                          <option value="MA">Maranhão</option>
                          <option value="MS">Mato Grosso do Sul</option>
                          <option value="MT">Mato Grosso</option>
                          <option value="MG">Minas Gerais</option>
                          <option value="PA">Pará</option>
                          <option value="PB">Paraíba</option>
                          <option value="PR">Paraná</option>
                          <option value="PE">Pernambuco</option>
                          <option value="PI">Piauí</option>
                          <option value="RJ">Rio de Janeiro</option>
                          <option value="RN">Rio Grande do Norte</option>
                          <option value="RS">Rio Grande do Sul</option>
                          <option value="RO">Rondônia</option>
                          <option value="RR">Roraima</option>
                          <option value="SC">Santa Catarina</option>
                          <option value="SP">São Paulo</option>
                          <option value="SE">Sergipe</option>
                          <option value="TO">Tocantins</option>
                    </select>
                  </div>
                </div>
                <div class="row">
    							<div clas="col-md-4">
    								<button class="btn btn-success" type="submit">	Alterar <i class="glyphicon glyphicon-ok"></i></button>
    							</div>
    							<div class="row col-xs-3 pull-left">
    								<p><h6>Os campos com o sinal <span class="obrigatorio">' * '</span> são obrigatórios</h6></p>
    							</div>
    						</div>
              </form>
						</div>

						</br>


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
	<script src="../js/plugin/src/jquery.mask.js">

	</script>
	<script src="../js/plugin/mask.js"></script>
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

  <script>

  $(document).ready(function(){
      document.getElementById('data_atual').valueAsDate = new Date();
      $('#data_atual').hide();
  });

      $(".cep").on('blur', function(){
        var cep = $(this).val();
        var novoCEP = cep.replace(/[\.-]/g, "");
        $.ajax({
          type: "GET",
          url : "//viacep.com.br/ws/" + novoCEP + "/json/",
          dataType : "json",
          success : function(data){
            console.log(data);
            $(".logradouro").val(data.logradouro);
            $(".bairro").val(data.bairro);
            $(".numero").val(data.numero);
            $(".complemento").val(data.complemento);
            $(".cidade").val(data.localidade);
            $(".estado").val(data.uf);

          }, error: function(erro){
            alert('não foi possivel buscar o produto');
          }
        });
      })

  </script>
</body>

</html>
