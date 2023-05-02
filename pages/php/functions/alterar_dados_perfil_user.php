<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');

//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$status = $_POST['status'];
$posicao = $_POST['posicao'];
$senha = $_POST['senha'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

//atualiza os dados na tabela plogin
$sql = "UPDATE plogin SET nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', rua = '".$rua."', bairro = '".$bairro."', cidades = '".$cidade."', estado = '".$estado."', telefone = '".$telefone."', ativo = '".$status."', e_cliente = '".$posicao."', senha1 = '".$senha."'  WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  //atualiza a tabela pets caso haja alteracao na tabela plogin
  $sql2 = "UPDATE pets SET cpf_dono = '".$cpf."'";
  if(mysqli_query($mysqli, $sql2)) {
    //redireciona para a seguinte pagina apos concluir a alteracao
    header('location:../admin/home_admin.php');
  }
} else {
   //mensagem de erro em caso de erro
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>