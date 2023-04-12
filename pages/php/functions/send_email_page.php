<?php
include_once('funcoes.php');
$email = send_email();
$ret_email = 
if($ret_email==0){
	$subject = 'VacinaCao - Confirmacao de cadastro de usuario';
	$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅👤Você foi cadastrado no nosso sistema! Seu acesso ja está
	liberado no sistema.</b></font></html>';
	$altbody = 'Você foi cadastrado no nosso sistema! Seu acesso ja está
	liberado no sistema.';
}
else{
	$subject = 'VacinaCao - Confirmacao de cadastro de animal';
	$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅🐶Um novo animal foi cadastrado no seu registro! 
	Você pode acompanhar seu cartão de vacina no nosso site oficial.</b></font></html>';
	$altbody = 'Um novo animal foi cadastrado no seu registro! 
	Você pode acompanhar seu cartão de vacina no nosso site oficial.';
}


require_once('mail/PHPMailer.php');
require_once('mail/SMTP.php');
require_once('mail/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'porqueseraoficial2020@gmail.com';
	$mail->Password = 'dpvlpwpiqiuiconc';
	$mail->Port = 587;

	$mail->setFrom('porqueseraoficial2020@gmail.com');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AltBody = $altbody;

	if($mail->send()) {
		echo "<script>window.location.assign('../../php/confirm_email_register.php')</script>";
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>