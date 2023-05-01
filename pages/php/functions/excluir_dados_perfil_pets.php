<?php
include_once('funcoes.php');
$mysqli = query_db();

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Executa a consulta SQL para excluir o usuário com o ID fornecido
    $sql = "DELETE FROM pets WHERE id = $id";
    
    if ($mysqli->query($sql) === TRUE) {
      header('location:../admin/home_admin.php');
    
    } else {
      echo "Erro ao excluir usuário: " . $mysqli->error;
    }
  } else {
    echo "ID do usuário não fornecido";
  }
  
  $mysqli->close();

  ?>