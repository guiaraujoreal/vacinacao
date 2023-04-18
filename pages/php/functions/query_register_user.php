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
$confirmsenha = $_POST['confirmsenha'];

$sql = 'INSERT INTO plogin (cpf,nome,senha1,telefone,email,ativo,e_cliente) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssii",$cpf, $nome, $senha1,$telefone,$email,$ativo,$e_cliente);

if($senha1 != $confirmsenha){
	echo "As senhas não correspondem";
}
else{
	$sql = 'INSERT INTO plogin (cpf,nome,senha1,telefone,email,ativo,e_cliente) values (?,?,?,?,?,?,?)';
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("sssssii",$cpf, $nome, $senha1,$telefone,$email,$ativo,$e_cliente);

	// s: para 'string'
	// i: para 'inteiro'
	// d: para 'double'
	// b: para 'blob'

if($stmt->execute()){
	header('location:../home_admin.php');
}
}
?>