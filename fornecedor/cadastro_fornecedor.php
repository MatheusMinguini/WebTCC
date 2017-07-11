<?php

    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


include '../conexao.php';

$sql = "INSERT INTO fornecedor(nome, cnpj, cidade, estado, email, telefone, celular, logradouro, bairro, numero, complemento, cep)
VALUES('$nome', '$cnpj', '$cidade', '$estado','$email', '$telefone', '$celular',
'$logradouro', '$bairro', '$numero', '$complemento', '$cep')";

$result = @mysql_query($sql);
if ($result){
    header("location:index_fornecedor.php?msg=cadastro_sucesso");
} else {
  echo  mysql_error();
}
