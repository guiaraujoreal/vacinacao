<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//recebe o id da vacina da pagina anterior
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Executa a consulta SQL para excluir a vacina com o ID fornecido
    $sql = "DELETE FROM vacina_reg WHERE id = $id";
    
    if ($mysqli->query($sql) === TRUE) {
      //caso dê certo, ele também apagará o histórico daquela vacina
      $sql2 = "DELETE FROM historico_vacinas WHERE id_vacina = $id";
      if ($mysqli->query($sql2) === TRUE) {
        header('location:../admin/painel_vacinas.php');
        //casos de erro  
    } else {
      echo "Erro ao excluir usuário: " . $mysqli->error;
    }
  } else {
    echo "ID do usuário não fornecido";
  }
}
  $mysqli->close();

  ?>