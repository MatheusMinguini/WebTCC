<?php


date_default_timezone_set('Australia/Melbourne');
$date = date('Y-d-m', time());
$usuario = $_POST['login_usuario'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$login = $_POST['login'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$confsenha = md5($_POST['confsenha']);
$perfil = $_POST['perfil'];

echo $usuario;
include '../conexao.php';

if ($senha == $confsenha){
    $sql = "INSERT INTO usuario (nome, sobrenome, login, email, senha, perfil, usuario_cadastro, data_cadastro, usuario_alteracao, data_alteracao)
    VALUES ('$nome', '$sobrenome','$login', '$email', '$senha', $perfil, $usuario, $date, $usuario, $date)";
    echo $sql;
    $result = @mysql_query($sql);

}

if($result){
  header("location:index_usuario.php?msg=cadastro_sucesso");
}else {
  echo mysql_error();
  //header("location:index_usuario.php?msg=erro");
}
?>
