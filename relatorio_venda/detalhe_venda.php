<?php
			session_start();
			if(!isset($_SESSION['loginSession']) AND !isset($_SESSION['senhaSession']) ){
					header("Location: index.php");
					exit;
			}
include '../conexao.php';
$id = $_REQUEST['codigo'];

$query = "SELECT u.login as usuario, c.nome, f.descricao, v.codigo, v.data_venda, v.total  FROM venda v
INNER JOIN cliente c ON c.codigo = v.id_cliente
INNER JOIN usuario u ON u.codigo = v.id_usuario
LEFT JOIN forma_pagamento f ON v.forma_pagamento = f.codigo WHERE v.codigo=".$id;
$query1 = "SELECT p.nome, p.preco_venda,v.codigo FROM produto p
INNER JOIN itens_venda i ON p.codigo = i.id_produto
INNER JOIN venda v ON i.id_venda = v.codigo
WHERE v.codigo=".$id;

$dados = mysql_query($query);
$dados1 = mysql_query($query1);
$resultado = mysql_fetch_object($dados);
$resultado1 = mysql_fetch_object($dados1);

$codigo = $resultado->codigo;
$cliente = $resultado->nome;
$forma_pagamento = $resultado->descricao;
$data_venda = $resultado->data_venda;
$total = $resultado->total;
$usuario = $resultado->usuario;

$produto = $resultado1->nome;
$preco_venda= $resultado1->preco_venda;


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
								<i class="glyphicon glyphicon-floppy-tag"></i>Detalhes da venda
							</h2>
							<a href="relatorio_venda_index.php" id="botao-adicionar"
								class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
						</div>
						<div class="panel-body">
								<div class="col-md-4">
									<h5>
										<b>Código da venda: </b><span id="dados_cliente"> <?=$codigo?></span>
									</h5>
								</div>

								<div class="col-md-4">
									<h5>
										<b>Cliente: </b><span id="dados_cliente"> <?=$cliente?></span>
									</h5>
								</div>

								<?php
									if ($forma_pagamento == ''){
										$forma_pagamento = "Nenhuma forma de pagamento vinculada ou a mesma foi apagada!";
									}
								 ?>

								<div class="col-md-4">
									<h5>
										<b>Forma de pagamento: </b><span id="dados_cliente"> <?=$forma_pagamento?></span>
									</h5>
								</div>

								<?php
										if($data_venda == '0000-00-00'){
											$data_venda = 'data não cadastrada!';
										}else{
											$data_venda = date('d/m/Y', strtotime($data_venda));
										}
								 ?>

                <div class="col-md-4">
									<h5>
										<b>Data da venda: </b><span id="dados_cliente"> <?=$data_venda?></span>
									</h5>
								</div>

								<div class="col-md-4">
									<h5>
										<b>Usuário que cadastrou:</b><span id="dados_cliente"> <?=$usuario?></span>
									</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center">



          <div class="row">
    				<div class="col-lg-12 text-center">
    					<form class="control">
    						<div class="input-"></div>
    					</form>
    					<div class="panel panel-default">
    						<div id="panel-heading" class="panel-heading">
    							<h2 id="clientes_titulo" class="panel-title">
    								<i class="fa fa-tag"></i> Produtos da venda
    							</h2>
    						</div>
    						<div class="panel-body">
    							<table class="table table-bordered">
    								<thead id="titulo">
    									<tr>
    										<th id="opcoes">
    											<center>Produto</center>
    										</th>
                        <th>
    											<center>Preço de venda</center>
    										</th>
    									</tr>
    								</thead>
    								<?php
                                    @include("../conexao.php");
                                      $sql = mysql_query(
                                              "SELECT p.nome, p.preco_venda,v.codigo FROM produto p
                                              INNER JOIN itens_venda i ON p.codigo = i.id_produto
                                              INNER JOIN venda v ON i.id_venda = v.codigo
                                              WHERE v.codigo=".$id
                                    );
                                      $row = mysql_num_rows($sql);
                                        if($row == 0){
                                          ?>
                                								<div class="white_content" id="div">
                                									Nenhuma Busca Encontrada!<br>
                                									<img id="imgcerto" src="../images/erro.png" alt=""><br/>
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
    											<?=$linha['nome']?>
    										</td>
    										<td>
                          <?=$linha['preco_venda']?>
    										</td>
    									</tr>

    								</tbody>
                    <?php }
                      mysql_close();
                    ?>
                  </table>
                  <div class="form-group col-xs-3 pull-right">
  									<h5>
  										<b id="total_venda">Total da compra: R$</b> <span id="total_venda"> <?=$total?></span>
  									</h5>
  								</div>
                </div>
              </div>
            </div>
          <div class="row text-center"></div>
        </div>
      </div>
    </div>
  </section>

      <?php
          include ("../footer.php");
       ?>
