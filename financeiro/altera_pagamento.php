<?php
include '../conexao.php';

$id = $_REQUEST['codigo'];
$descricao = $_POST['descricao'];
$numero_parcelas = $_POST['numero_parcelas'];
$numero_dias = $_POST['numero_dias'];
$acrescimo = $_POST['acrescimo'];

$query  = "UPDATE forma_pagamento SET descricao='".$descricao."', numero_parcelas='".$numero_parcelas."', numero_dias='".$numero_dias."', acrescimo='".$acrescimo."' WHERE codigo=".$id;

//mysql_query($query) or die($query."<br>".mysql_error());
$ok = mysql_query($query);
  if($ok){
    header("Location:index_pagamento.php?msg=alterado_sucesso");
  }else{
    header("Location:index_pagamento.php?msg=erro");
    $erro = mysql_error();
  }
  mysql_close();
