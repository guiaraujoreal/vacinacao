<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$vacina = $_POST['vacina'];
$lab = $_POST['lab'];
$lote = $_POST['lote'];
$validade = $_POST['validade'];
$qntd = $_POST['qntd'];
$int_dose = $_POST['int_dose'];

//cadastra a nova vacina no banco
$sql = 'INSERT INTO vacina_reg (nome_vacina,lote,laboratorio,validade,quantidade,int_doses) values (?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssssii",$vacina, $lote, $lab, $validade, $qntd, $int_dose);

if($stmt->execute()){
    header('location:../admin/home_admin.php');
}

?>