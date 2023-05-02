<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');

//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$id = $_POST['id'];
$vacina = $_POST['nome_vacina'];
$lote = $_POST['lote'];
$lab = $_POST['lab'];
$validade = $_POST['validade'];
$qntd = $_POST['qntd'];
$int_dose = $_POST['int_dose'];

//atualiza os dados na tabela vacina_regs
$sql = "UPDATE vacina_reg SET nome_vacina = '".$vacina."', lote = '".$lote."', laboratorio = '".$lab."', validade = '".$validade."', quantidade = '".$qntd."', int_doses = '".$int_dose."' WHERE id = '".$id."'"; 
if(mysqli_query($mysqli, $sql)) {
  //redireciona para a seguinte pagina apos concluir a alteracao
  header('location:../admin/painel_vacinas.php');
} else {
  //mensagem de erro em caso de erro
  echo "Erro ao atualizar registro: " . mysqli_error($mysqli);
}



?>