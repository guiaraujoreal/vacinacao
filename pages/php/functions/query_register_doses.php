<?php
include_once('funcoes.php');
$mysqli = query_db();

$id_pet = $_POST['id_pet'];
$vacina = $_POST['vacina'];
$dose = $_POST['dose'];

$sql = 'INSERT INTO historico_vacinas (id_pet, id_vacina, dose) VALUES (?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iis",$id_pet,$vacina,$dose);

if($stmt->execute()){
    header('location:../admin/home_admin.php');
}


?>