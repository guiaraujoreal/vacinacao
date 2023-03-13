<?php


// Dados do servidor 
$usuario = 'noite01';
$password = 'Noite123456';
$banco = 'academia';
$hostname = '127.0.0.1';

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// tenta conectar na base de dados
$mysqli = new mysqli($hostname,$usuario,$password,$banco);
//caso não funcione exibe a mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$sql = 'INSERT INTO plogin (cpf,nome,senha,telefone,email,status_user,e_cliente) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssii",$cpf, $nome, $senha,$telefone,$email,$status_user,$e_cliente);

// s: para 'string'
// i: para 'inteiro'
// d: para 'double'
// b: para 'blob'

$stmt->execute();
 
//Enviar email de confirmação

require_once('PHP_Mail/PHPMailer.php');
require_once('PHP_Mail/SMTP.php');
require_once('PHP_Mail/Exception.php');

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
	$mail->addAddress('joaoguilhermearaujo1617@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Confirmacao de solicitacao de acesso';
	$mail->Body = 'Chegou o email teste do <strong>Canal TI</strong>';
	$mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		header ("location: confirm_email_register.html");
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>