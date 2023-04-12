<?php
include_once('funcoes.php');
$mysqli = query_db();

$id = $_POST["id"];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$telefone = $_POST['telefone'];

$sql = "UPDATE clientes SET nome = '".$nome."', cpf = '".$cpf."', data_nasci = '".$data."', celular = '".$telefone."' WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  header('location:home.php');
} else {
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>