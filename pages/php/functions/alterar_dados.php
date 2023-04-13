<?php
include_once('funcoes.php');
$mysqli = query_db();

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "UPDATE clientes SET nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', telefone = '".$telefone."' WHERE cpf = '".$cpf."'"; 
if(mysqli_query($mysqli, $sql)) {
  header('location:home.php');
} else {
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>