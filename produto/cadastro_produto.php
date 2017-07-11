<?php

 $codigo_barra = $_POST['codigo_barra'];
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
 $modelo = $_POST['modelo'];

include '../conexao.php';

$sql = "INSERT INTO produto(codigo_barra, nome, preco_custo, margem_lucro, preco_venda, grupo, marca, fornecedor, quantidade, data_entrada, tamanho, valor_total, descricao, modelo)
values('$codigo_barra', '$nome', '$preco_custo', '$margem_lucro', '$preco_venda','$grupo', '$marca', '$fornecedor', '$quantidade', '$data_entrada', '$tamanho', '$valor_total', '$descricao','$modelo')";


$result = @mysql_query($sql);
if ($result){
   header("location:index_produto.php?msg=cadastro_sucesso");
}else{
  header("location:index_produto.php?msg=erro");
}
