<?php

include_once('funcoes.php');
$mysqli = query_db();

$cpf = $_POST['dono'];
$nome = $_POST['nome'];
$raca = $_POST['raca'];
$tipagem = $_POST['tipagem'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$genero = $_POST['genero'];


$sql = 'INSERT INTO pets (cpf_dono,nome,raca,tipagem,idade_est,genero) values (?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("isssss",$cpf, $nome, $raca, $tipagem, $idade, $genero);

$stmt->execute()

?>