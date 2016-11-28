<?php

$nome = $_POST['nome'];
$confnome = $_POST['confnome'];

include '../conexao.php';

if ($nome == $confnome){
    $sql = "insert into grupo(nome, confnome ) values('$nome', '$confnome')";
    $result = @mysql_query($sql);
    header("location:index_produto.php?msg=cadastro_sucesso");
} else {
    header("location:index_produto.php?msg=erro");
}
