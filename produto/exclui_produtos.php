<?php

$id = intval($_REQUEST['codigo']);

include '../conexao.php';

$sql = "delete from produto where codigo=$id";
$ok = mysql_query($sql, $conn);

if ($ok) {
    header("location:index_produto.php?msg=sucesso_exclusao");
}else{
    echo "erro";
}

mysql_close();
