<?php
session_start();
include '../conexao.php';
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);



if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'");
    $resultado = mysql_fetch_object($verifica);
    $id = $resultado->codigo;

    if (mysql_num_rows($verifica) <= 0){
      header("location:../index.php?msg=errado_login");
      die();
    }

    else{
        $_SESSION['idSession'] = $id;
        $_SESSION['loginSession'] = $login;
        $_SESSION['senhaSession'] = $senha;
        setcookie("login", $login);
        header("Location:../welcome.php");
    }
}
?>
