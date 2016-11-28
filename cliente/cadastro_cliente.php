<?php


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



include '../conexao.php';

$sql = "insert into cliente (nome, sobrenome, cpf, rg, data_nascimento, telefone, celular, rua, bairro, numero, cep, cidade, estado)
values('$nome', '$sobrenome', '$cpf', '$rg', '$data_nascimento', '$telefone', '$celular', '$rua', '$bairro', '$numero', '$cep', '$cidade', '$estado')";
$result = @mysql_query($sql);

if ($result){
    header("location:index_cliente.php?msg=cadastro_sucesso");
} else {
    header("location:index_cliente.php");
}
