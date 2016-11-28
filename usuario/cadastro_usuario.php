<?php


$nome = $_POST['nome'];
$senha = md5($_POST['senha']);
$confsenha = md5($_POST['confsenha']);



include '../conexao.php';

if ($senha == $confsenha){
    $sql = "insert into usuario(nome, senha, confsenha ) values('$nome', '$senha', '$confsenha')";
    $result = @mysql_query($sql);
    header("location:index_usuario.php?msg=cadastro_sucesso");
} else {
    header("location:index_usuario.php?msg=erro");
}
