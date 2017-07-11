<?php
$email = $_POST["email"];

include '../conexao.php';
$query = mysql_query("SELECT codigo, login, nome, sobrenome, email FROM usuario WHERE email  = '$email'");
$row = mysql_fetch_object($query);
$codigo = $row->codigo;
$nome = $row->nome;
$sobrenome = $row->sobrenome;
$login = $row->login;
$email = $row->email;
$novasenha = rand(0, 10000);

$update = mysql_query("UPDATE usuario SET senha = '" .md5($novasenha). "' WHERE codigo =" .$codigo);

$assunto = "Troca de senha!";
$mensagem	= "Olá, " .$nome. " " .$sobrenome. ". Notamos que solicitou uma nova senha para o login: " .$login. ". A nova senha é: " .$novasenha;

require_once("../PHPMailer_5.2.4/class.phpmailer.php");


function smtpmailer($remetente, $destinatario, $assunto, $mensagem) {
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 2;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'tls';;	// TLS REQUERIDO pelo GMail, SE MUDAR PRA SSL VAI FUDER
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = $remetente;
	$mail->Password = 'zeroberto';
	$mail->SetFrom($remetente);
	$mail->Subject = $assunto;
	$mail->Body = $mensagem;
	$mail->AddAddress($destinatario);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo;
		return false;
	} else {
		return true;
	}
}
    if (smtpmailer('maralojapissara@gmail.com', $email, $assunto, $mensagem)){
        header("location:../index.php?msg=sucesso_recupera_senha");
    }else{
        header("location:../index.php?msg=erro_recupera_senha");
    }
?>
