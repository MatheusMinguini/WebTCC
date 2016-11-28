<?php
$id = intval($_REQUEST['codigo']);

include '../conexao.php';

$sql1 = "SELECT id_cliente, COUNT(*) FROM venda WHERE id_cliente = $id GROUP BY id_cliente";

$dados = mysql_query($sql1);
$total_registros = mysql_num_rows($dados);

   if ($total_registros > 0){
    header("location:index_cliente.php?msg=erro_exclusao");
       } else{
          $sql = "DELETE FROM cliente WHERE codigo=$id";
          $ok = mysql_query($sql, $conn);
          header("location:index_cliente.php?msg=sucesso_exclusao");
        }
mysql_close();
