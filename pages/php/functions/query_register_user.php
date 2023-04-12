<?php

include_once('funcoes.php');
$mysqli = query_db();

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha1 = $_POST['senha'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$ativo = $_POST['seletor01'];
$e_cliente = $_POST['seletor02'];

$sql = 'INSERT INTO plogin (cpf,nome,senha1,telefone,email,ativo,e_cliente) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssii",$cpf, $nome, $senha1,$telefone,$email,$ativo,$e_cliente);

// s: para 'string'
// i: para 'inteiro'
// d: para 'double'
// b: para 'blob'

$stmt->execute();

$subject = 'VacinaCao - Confirmacao de cadastro de usuario';
$body = '<html><meta charset="utf-8"> <font size="9" face="arial"><b>✅👤Você foi cadastrado no nosso sistema! Seu acesso ja está
liberado no sistema.</b></font></html>';
$altbody = 'Você foi cadastrado no nosso sistema! Seu acesso ja está
liberado no sistema.';

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
		echo "<script>window.location.assign('../register_pets.php')</script>";
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>