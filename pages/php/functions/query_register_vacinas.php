<?php

include_once('funcoes.php');
$mysqli = query_db();

$vacina = $_POST['vacina'];
$lab = $_POST['lab'];
$lote = $_POST['lote'];
$validade = $_POST['validade'];
$qntd = $_POST['qntd'];

$sql = 'INSERT INTO vacina_reg (nome_vacina,lote,laboratorio,validade,quantidade) values (?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssssi",$vacina, $lote, $lab, $validade, $qntd);

if($stmt->execute()){
    header('location:../admin/home_admin.php');
}

?>