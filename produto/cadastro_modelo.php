<?php

$modelo = $_POST['modelo'];
$confmodelo = $_POST['confmodelo'];

include '../conexao.php';

if ($modelo == $confmodelo){
    $sql = "INSERT INTO modelo(modelo, confmodelo) values('$modelo', '$confmodelo')";
    $result = @mysql_query($sql);
    header("location:index_produto.php?msg=cadastro_sucesso");
} else {
    header("location:index_produto.php?msg=erro");
}
