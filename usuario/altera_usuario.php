<?php
include '../conexao.php';
$id = $_REQUEST['codigo'];
$nome = $_POST['nome'];
$senha = md5($_POST['senha']);
$nova_senha = md5($_POST['nova_senha']);
$confsenha = md5($_POST['confsenha']);

$query = "select * from usuario WHERE codigo=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);
$senha_antiga = $resultado->senha;
if ($senha_antiga==$senha){
  $query  = "update usuario set nome='".$nome."', senha='".$nova_senha."', confsenha='".$confsenha."' where codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());
header("Location:index_usuario.php?msg=alterado_sucesso");
} else{
  header("Location:index_usuario.php?msg=erro");
}
