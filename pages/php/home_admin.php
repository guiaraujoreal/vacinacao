<?php
include('functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:home_admin.php");
        exit();
	}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../styles/home_admin.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Página do admin.</title>
    <link rel="icon" type="image/png" href="../../icons/logo.png"/>
</head>
<body>

        <div id="cabecalho">    
            <img src="../../icons/logo.png" class="logotipo">
            <img src="../../icons/text_logo.png" class="texto_logo">
            <div id="user_menu">
                 <h1 class="user"> <?php user_cabec() ?> </h1>
                <h2 class="category_a">
                <?php
                categoria_user();
                if(categoria_user() == 0){
                    $cat = 'Administrador';
                    }
                else{
                    $cat = 'Cliente';
                    }
                echo $cat;
                ?>
                </h2> 
            </div>
            <button id="botao_logout" onclick="logout()">
                <div class="text">
                    <span>Log</span>
                    <span>Out</span>
                </div>
                <div class="clone">
                    <span>Log</span>
                    <span>Out</span>
                </div>
                <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>
        <div id="table_users">
            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data/Hora de Inscrição</th>
                        <th scope="col">Telefone de Contato</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = query_db();
                    $sql = "SELECT id,nome,cpf,email,data_criacao,telefone FROM plogin order by nome";
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){
                        echo "<form action='functions/alterar_dados.php' method='post'>";
                        echo "<tr>";
                        echo '<td><input type="text" class="campo_form" value="' . $dados['nome'] . '" name="nome"></td>';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<td><input type="text" value="' . $dados['cpf'] . '" name="cpf"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['email'] . '" name="email"></td>';
                        echo '<td> '. $dados['data_criacao'] . '</td>';
                        echo '<td><input type="text" value="' . $dados['telefone'] . '" name="telefone"></td>';
                        echo "<td><button class='btn btn-danger' formaction='functions/excluir_dados_home.php' id='" . $dados['id'] . "'>Excluir</button>
                        <button class='btn btn-success' type='submit' id='" . $dados['id'] . "'>Alterar Dados</button></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="inf_box">
            <button class="button_user" onclick="window.location.href='register_users.php'"> Adicionar usuário</button>
            <button class="button_pet" onclick="window.location.href='register_pets.php'"> Adicionar animal</button>       
        </div>

        <footer>
            <p>&copy; 2023 Meu Site</p>
        </footer>

</body>
<script>
   function logout() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "functions/funcoes.php", true);
      xhr.send();
      window.location = "index.php";
   }
</script>



</html>