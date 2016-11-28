<?php
session_start();
include '../conexao.php';
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);



if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    $verifica1 = mysql_query("SELECT * FROM usuario WHERE nome = '$login'") or die("erro ao selecionar");
    $verifica2 = mysql_query("SELECT * FROM usuario WHERE senha = '$senha'") or die("erro ao selecionar");

    if (mysql_num_rows($verifica1)<=0 && mysql_num_rows($verifica2)<=0 ){
        header("location:../index.php?msg=errado_login");
        die();
    }
    if (mysql_num_rows($verifica1)<=0){
        header("location:../index.php?msg=errado_usuario");
        die();
    }
    if (mysql_num_rows($verifica2)<=0){
        header("location:../index.php?msg=errado_senha");
        die();
    }
    else{
        $_SESSION['loginSession'] = $login;
        $_SESSION['senhaSession'] = $senha;
        setcookie("login",$login);
        header("Location:../welcome.php");
    }
}
?>
