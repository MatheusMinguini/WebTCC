<?php

$id = intval($_REQUEST['codigo']);

include '../conexao.php';

$sql = "delete from fornecedor where codigo=$id";
$ok = mysql_query($sql, $conn);

if ($ok) {
    header("location:index_fornecedor.php?msg=sucesso_exclusao");
}else{
    echo "erro";
}

mysql_close();
