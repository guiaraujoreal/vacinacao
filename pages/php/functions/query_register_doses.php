<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$id_pet = $_POST['id_pet'];
$vacina = $_POST['vacina'];
$dose = $_POST['dose'];
$ret_email = '2';
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

$sql3 = "SELECT id_dono FROM pets WHERE id = $id_pet";
$query = $mysqli->query($sql3);
while ($row = mysqli_fetch_assoc($query)){
  $id_dono = $row['id_dono'];
}

//executa a query
if($stmt->execute()){
  //caso execute, atualiza a quantidade/estoque na tabela
    $sql4 = "UPDATE vacina_reg SET quantidade = '".$estoque_out."' WHERE id = '".$vacina."'";
    if(mysqli_query($mysqli, $sql4)) {
      //apos isso, ele selecionará o email do dono para confirmar a vacinacao
      $sql5 = "SELECT email FROM plogin WHERE id=$id_dono";
      $query = $mysqli->query($sql5);
      while ($row = mysqli_fetch_assoc($query)){
        $email = $row['email'];
      }
        header('location:send_email_page.php?ret_email='.urldecode($ret_email). '&email='.urldecode($email));
      }
}


?>