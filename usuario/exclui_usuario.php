<?php


$id = intval($_REQUEST['codigo']);
@$login = $_POST['nome'];
@$senha = md5($_POST['senha']);
 echo $login;
 echo $senha;

include '../conexao.php';
$sql = "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'";
$verifica = mysql_num_rows($sql);
echo $verifica;

mysql_close();
