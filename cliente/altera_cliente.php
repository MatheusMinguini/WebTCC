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
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$usuario = $_POST['login_usuario'];
$data_alteracao = $_POST['data_alteracao'];

$query  = "UPDATE cliente SET nome='".$nome."', sobrenome='".$sobrenome."', cpf='".$cpf."', rg='".$rg."',
 data_nascimento='".$data_nascimento."', telefone='".$telefone."', celular='".$celular."',
 logradouro='".$logradouro."', bairro='".$bairro."', numero='".$numero."', complemento='".$complemento."', cep='".$cep."',
 cidade='".$cidade."', estado='".$estado."',
 email='".$email."', data_ultima_alteracao='".$data_alteracao."', id_usuario_alteracao = $usuario WHERE codigo=".$id;

$result = mysql_query($query);
if($result){
  header("Location:index_cliente.php?msg=alterado_sucesso");
}else{
  echo mysql_error();
}
