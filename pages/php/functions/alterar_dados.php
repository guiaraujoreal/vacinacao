<?php
include_once('funcoes.php');
$mysqli = query_db();

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "UPDATE plogin SET nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', telefone = '".$telefone."' WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  header('location:../admin/home_admin.php');
} else {
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>