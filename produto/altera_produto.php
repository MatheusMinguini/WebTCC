<?php

include '../conexao.php';

$id = $_REQUEST['codigo'];
$codigo_barra = $_REQUEST['codigo_barra'];
$nome = $_POST['nome'];
$preco_custo = $_POST['preco_custo'];
$margem_lucro = $_POST['margem_lucro'];
$preco_venda = $_POST['preco_venda'];
$grupo = $_POST['grupo'];
$marca = $_POST['marca'];
$fornecedor = $_POST['fornecedor'];
$quantidade = $_POST['quantidade'];
$data_entrada = $_POST['data_entrada'];
$tamanho = $_POST['tamanho'];
$valor_total = $_POST['valor_total'];
$descricao = $_POST['descricao'];
$query  = "update produto set codigo_barra='".$codigo_barra."', nome='".$nome."', preco_custo='".$preco_custo."', margem_lucro='".$margem_lucro."', preco_venda='".$preco_venda."', grupo='".$grupo."', marca='".$marca."', fornecedor='".$fornecedor."', quantidade='".$quantidade."', data_entrada='".$data_entrada."', tamanho='".$tamanho."', valor_total='".$valor_total."' where codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());

$ok = mysql_query($query);

if ($ok){
  header("Location:index_produto.php?msg=alterado_sucesso");
}else{
  header("Location:index_produto.php?msg=erro");
}
