<?php

include_once('funcoes.php');
$mysqli = query_db();

$cpf = $_POST['cpf_dono'];
$nome = $_POST['nome'];
$raca = $_POST['raca'];
$tipagem = $_POST['tipagem'];
$idade = $_POST['idade'];
$genero = $_POST['genero'];
$id = $_POST['id_do_dono'];

$sql = 'INSERT INTO pets (cpf_dono,id_dono,nome,raca,tipagem,idade_est,genero) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sisssss",$cpf, $id, $nome, $raca, $tipagem, $idade, $genero);

if($stmt->execute()){
    header('location:../admin/home_admin.php');
}

?>