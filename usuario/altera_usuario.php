<?php
include '../conexao.php';
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$id = $_REQUEST['codigo'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nova_senha = md5($_POST['nova_senha']);
$email = $_POST['email'];
$perfil = $_POST['perfil'];


$query = "SELECT senha FROM usuario WHERE codigo=".$id;
$dados = mysql_query($query);
$resultado = mysql_fetch_object($dados);
$senha_antiga = $resultado->senha;

if ($senha_antiga==$senha){
  $query  = "UPDATE usuario SET nome='".$nome."', sobrenome='".$sobrenome."', login='".$login."', senha='".$nova_senha."', email='".$email."',
  perfil=$perfil WHERE codigo=".$id;

mysql_query($query) or die($query."<br>".mysql_error());
header("Location:index_usuario.php?msg=alterado_sucesso");
} else{
  header("Location:index_usuario.php?msg=erro");
}
