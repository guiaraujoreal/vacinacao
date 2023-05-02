<?php
//incluir arquivo de funcoes
include_once('funcoes.php');
//obter as variaveis de retorno da página
$email = $_GET['email'];
$ret_email = $_GET['ret_email'];

//verifica o retorno do valor da pagina para especificar o conteudo do email
if($ret_email==0){
	//funcao apenas para pegar o primeiro nome do usuario do email
	$nome = $_GET['nome'];
    $primeiro_nome = explode(' ', $nome);
    $user_fname = $primeiro_nome[0];

	$subject = 'VacinaCao - Confirmacao de cadastro de usuario';
	$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅👤Olá '. $user_fname .'! Você foi cadastrado no nosso sistema! Em breve, seu acesso será
	liberado no sistema.</b></font></html>';
	$altbody = 'Você foi cadastrado no nosso sistema! Em breve, seu acesso será liberado no sistema.';
}
elseif($ret_email==1){
	$nome_pet = $_GET['nome_pet'];
	$subject = 'VacinaCao - Confirmacao de cadastro de animal';
	$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅🐶Sucesso! '.$nome_pet.' foi cadastrado(a) no seu registro! 
	Em breve, você poderá acompanhar seu cartão de vacina no nosso site oficial.</b></font></html>';
	$altbody = 'Um novo animal foi cadastrado no seu registro! 
	Em breve, você poderá acompanhar seu cartão de vacina no nosso site oficial.';
}
else{
	$subject = 'VacinaCao - Animal vacinado';
	$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅💉Muito bem! Seu animalzinho foi vacinado hoje. Em breve, você terá acesso as informações mais detalhadas.</b></font></html>';
	$altbody = 'Muito bem! Seu animalzinho foi vacinado hoje. Em breve, você terá acesso as informações mais detalhadas';
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
		echo "<script>window.location.assign('confirm_email_register.php')</script>";
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>