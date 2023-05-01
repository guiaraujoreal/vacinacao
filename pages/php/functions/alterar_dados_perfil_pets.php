<?php
include_once('funcoes.php');
$mysqli = query_db();

$id = $_POST['id'];
$nome = $_POST['nome'];
$tipagem = $_POST['tipagem'];
$raca = $_POST['raca'];
$ano = $_POST['ano_nasc'];
$genero = $_POST['genero'];

$sql = "UPDATE pets SET nome = '".$nome."', raca = '".$raca."', ano_nasc = '".$ano."', tipagem = '".$tipagem."', genero = '".$genero."'  WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  header('location:../admin/home_admin.php');

} else {
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>