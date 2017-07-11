<?php
$id = intval($_REQUEST['codigo']);

include '../conexao.php';
$sql = mysql_query("DELETE FROM usuario WHERE codigo =".$id);

if($sql){
  header("location:index_usuario.php?msg=sucesso_exclusao");
}else{
  header("location:index_usuario.php?msg=erro");
}

mysql_close();
