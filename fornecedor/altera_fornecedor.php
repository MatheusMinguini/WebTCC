<?php
include '../conexao.php';
$id = $_REQUEST['codigo'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

$query  = "update fornecedor set nome='".$nome."', cnpj='".$cnpj."', cidade='".$cidade."', estado='".$estado."', email='".$email."', telefone='".$telefone."', celular='".$celular."' where codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());
header("Location:index_fornecedor.php?msg=alterado_sucesso");
