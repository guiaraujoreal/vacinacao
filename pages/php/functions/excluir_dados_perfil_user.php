<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados

$mysqli = query_db();

//recebe o id do usuario da pagina anterior
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    

    // Executa a consulta SQL para excluir o usuário com o ID fornecido
    $sql2 = "DELETE FROM plogin WHERE id = $id";
    
    //verifica se há algum pet cadastrado
    if ($mysqli->query($sql2) === TRUE) {
      $sql = "SELECT * FROM pets WHERE id_dono = $id";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $id_pet = $row['id'];
      }
        //caso a acao seja verdadeira, ele tambem deletará o pet do usuario deletado
        $sql3 = "DELETE FROM historico_vacinas WHERE id_pet = $id_pet";
        if($mysqli->query($sql3) === TRUE){
          //caso a acao seja verdadeira, ele deletará o hsitorico de vacinacao do pet deletado
          $sql4 = "DELETE FROM pets WHERE id_dono = $id ";
          if($mysqli->query($sql4) === TRUE){
            header('location:../admin/home_admin.php');
          }
        }
    }else{
      header('location:../admin/home_admin.php');
    }
    } else {
      echo "Erro ao excluir usuário: " . $mysqli->error;
    }
  } else {
    echo "ID do usuário não fornecido";
  }
  
  $mysqli->close();

  ?>