<?php
include '../conexao.php';

$id = $_REQUEST['codigo'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];



$query  = "update cliente set nome='".$nome."', sobrenome='".$sobrenome."', cpf='".$cpf."', rg='".$rg."', data_nascimento='".$data_nascimento."', telefone='".$telefone."', celular='".$celular."', rua='".$rua."', bairro='".$bairro."', numero='".$numero."', cep='".$cep."', cidade='".$cidade."', estado='".$estado."' where codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());
header("Location:index_cliente.php?msg=alterado_sucesso");
