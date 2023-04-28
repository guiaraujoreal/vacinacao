<?php
include_once('funcoes.php');
$mysqli = query_db();

$id_pet = $_POST['id_pet'];
$vacina = $_POST['vacina'];
$dose = $_POST['dose'];

$sql = 'SELECT quantidade FROM vacina_reg WHERE id= "'. $vacina. '"';
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
  $estoque = $row['quantidade'];
}

$estoque_out = intval($estoque) - 1;

$sql2 = 'INSERT INTO historico_vacinas (id_pet, id_vacina, dose) VALUES (?,?,?)';
$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("iis",$id_pet,$vacina,$dose);

if($stmt->execute()){
    $sql3 = "UPDATE vacina_reg SET quantidade = '".$estoque_out."' WHERE id = '".$vacina."'";
    if(mysqli_query($mysqli, $sql3)) {
        header('location:../admin/home_admin.php');
      }
}


?>