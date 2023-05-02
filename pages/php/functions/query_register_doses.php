<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$id_pet = $_POST['id_pet'];
$vacina = $_POST['vacina'];
$dose = $_POST['dose'];

//seleciona apenas os dados de quantidade da tabela vacina_reg
$sql = 'SELECT quantidade FROM vacina_reg WHERE id= "'. $vacina. '"';
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
  $estoque = $row['quantidade'];
}
//reduz o estoque de vacina a cada animal vacinado
$estoque_out = intval($estoque) - 1;

//insere os dados da vacinacao na tabela historico_vacinas para gerar um historico
$sql2 = 'INSERT INTO historico_vacinas (id_pet, id_vacina, dose) VALUES (?,?,?)';
$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("iis",$id_pet,$vacina,$dose);

//executa a query
if($stmt->execute()){
  //caso execute, atualiza a quantidade/estoque na tabela
    $sql3 = "UPDATE vacina_reg SET quantidade = '".$estoque_out."' WHERE id = '".$vacina."'";
    if(mysqli_query($mysqli, $sql3)) {
        header('location:../admin/home_admin.php');
      }
}


?>