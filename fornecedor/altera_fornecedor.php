<?php
include '../conexao.php';
$id = $_REQUEST['codigo'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

$query  = "UPDATE fornecedor set nome='".$nome."', cnpj='".$cnpj."',
logradouro='".$logradouro."', bairro='".$bairro."', numero='".$numero."', complemento='".$complemento."', cep='".$cep."',
cidade='".$cidade."', estado='".$estado."', email='".$email."', telefone='".$telefone."', celular='".$celular."' where codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());
$result = mysql_query($query);
if($result){
  header("Location:index_fornecedor.php?msg=alterado_sucesso");
}else{
  echo mysql_error();
}
