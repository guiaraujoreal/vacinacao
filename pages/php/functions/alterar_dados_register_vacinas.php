<?php
include_once('funcoes.php');
$mysqli = query_db();

$id = $_POST['id'];
$vacina = $_POST['nome_vacina'];
$lote = $_POST['lote'];
$lab = $_POST['lab'];
$validade = $_POST['validade'];
$qntd = $_POST['qntd'];

$sql = "UPDATE vacina_reg SET nome_vacina = '".$vacina."', lote = '".$lote."', laboratorio = '".$lab."', validade = '".$validade."', quantidade = '".$qntd."' WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  header('location:../admin/painel_vacinas.php');
} else {
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>