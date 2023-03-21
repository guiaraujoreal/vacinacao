<?php

include_once('funcoes.php');
$mysqli = query_db();

$cpf = $_POST['dono'];
$nome = $_POST['nome'];
$raca = $_POST['raca'];
$tipagem = $_POST['tipagem'];
$idade = $_POST['idade'];
$email = $_POST['email'];


$sql = 'INSERT INTO pets (cpf,nome,raca,tipagem,idade_est) values (?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("issss",$cpf, $nome, $raca, $tipagem, $idade);

$stmt->execute();


//email de confirmação

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
	$mail->Subject = 'VacinaCão - Confirmacao de solicitacao de acesso';
	$mail->Body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅Solicitacao de Acesso enviada com sucesso!
	Aguarde o administrador liberar seu acesso.</b></font></html>';
	$mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		echo "<script>window.location.assign('../../html/confirm_email_register.html')</script>";
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>