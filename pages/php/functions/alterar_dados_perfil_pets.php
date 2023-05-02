<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');

//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$id = $_POST['id'];
$nome = $_POST['nome'];
$tipagem = $_POST['tipagem'];
$raca = $_POST['raca'];
$ano = $_POST['ano_nasc'];
$genero = $_POST['genero'];

//atualiza os dados na tabela pets
$sql = "UPDATE pets SET nome = '".$nome."', raca = '".$raca."', ano_nasc = '".$ano."', tipagem = '".$tipagem."', genero = '".$genero."'  WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  //redireciona para a seguinte pagina apos concluir a alteracao
  header('location:../admin/home_admin.php');

} else {
  //mensagem de erro em caso de erro
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>