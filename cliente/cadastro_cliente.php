<?php


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
$data_cadastro = $_POST['data_cadastro'];
$data_ultima_alteracao = $_POST['data_cadastro'];


include '../conexao.php';

$sql = "INSERT INTO cliente (id_usuario, id_usuario_alteracao, nome, sobrenome, cpf, rg, data_nascimento, telefone, celular, logradouro, bairro, numero, complemento, cep, cidade, estado, email, data_cadastro, data_ultima_alteracao)
VALUES($usuario, $usuario, '$nome', '$sobrenome', '$cpf','$rg', '$data_nascimento', '$telefone', '$celular', '$logradouro', '$bairro', '$numero', '$complemento', '$cep', '$cidade', '$estado', '$email', '$data_cadastro', '$data_ultima_alteracao')";

$result = @mysql_query($sql);

if ($result){
    header("location:index_cliente.php?msg=cadastro_sucesso");
} else {
    echo mysql_error();
}
