<?php
include '../conexao.php';

$id = $_REQUEST['codigo'];
$descricao = $_POST['descricao'];
$acrescimo = $_POST['acrescimo'];

$query  = "UPDATE forma_pagamento SET descricao='".$descricao."', acrescimo='".$acrescimo."' WHERE codigo=".$id;

//mysql_query($query) or die($query."<br>".mysql_error());
$ok = mysql_query($query);
  if($ok){
    header("Location:index_pagamento.php?msg=alterado_sucesso");
  }else{
    header("Location:index_pagamento.php?msg=erro");
    $erro = mysql_error();
  }
  mysql_close();
