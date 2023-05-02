<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');

//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//recebe o id do usuario da pagina anterior
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Executa a consulta SQL para excluir o animal com o ID fornecido
    $sql = "DELETE FROM historico_vacinas WHERE id_pet = $id";
    if ($mysqli->query($sql) === TRUE) {
      //caso a acao seja verdadeira, elel tambem apagará o historico da vacina desse pet
      $sql2 = "DELETE FROM pets WHERE id = $id";
      if ($mysqli->query($sql2) === TRUE) {
      //caso a acao seja verdadeira, redirecionara para tal pagina
      header('location:../admin/home_admin.php');
      }
    } else {
      echo "Erro ao excluir usuário: " . $mysqli->error;
    }
  } else {
    echo "ID do usuário não fornecido";
  }
  //fecha a conexao
  $mysqli->close();

  ?>