<?php

    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];

include '../conexao.php';

$sql = "INSERT INTO fornecedor(nome, cnpj, cidade, estado, email, telefone, celular) VALUES('$nome', '$cnpj', '$cidade', '$estado','$email', '$telefone', '$celular')";
$result = @mysql_query($sql);
if ($result){
    header("location:index_fornecedor.php?msg=cadastro_sucesso");
} else {
    mysql_error();
}
