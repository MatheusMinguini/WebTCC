<?php
$id = $_GET["codigo"];

include '../conexao.php';
$query = mysql_query("SELECT nome, sobrenome, email FROM cliente WHERE codigo = ". $id);
$row = mysql_fetch_object($query);
$nome = $row->nome;
$sobrenome = $row->sobrenome;
$email = $row->email;


$assunto = 'Pagamento nao efetuado!';
$mensagem	= 'Olá, ' .$nome.' '.$sobrenome.', tudo bem? Notamos que você possui um débito conosco! Por favor, entre em contato para assim, podermos negociar! Desde já agradecemos!' .
' Em caso de pagamento existente, por favor, aceite as nossas desculpas e desconsidere esse Email.';


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
        header("location:../cliente/index_cliente.php?msg=sucesso_email_cobranca");
    }else{
        header("location:../cliente/index_cliente.php?msg=erro_email_cobranca");
    }
?>
