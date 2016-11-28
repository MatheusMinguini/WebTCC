<?php

$marca = $_POST['marca'];
$confmarca = $_POST['confmarca'];

include '../conexao.php';

if ($marca == $confmarca){
    $sql = "insert into marca(marca, confmarca) values('$marca', '$confmarca')";
    $result = @mysql_query($sql);
    header("location:index_produto.php?msg=cadastro_sucesso");
} else {
    header("location:index_produto.php?msg=erro");
}
