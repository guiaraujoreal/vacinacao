<?php
include('functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../styles/home_admin.css" media="screen" />
    <title>Página do admin.</title>
    <link rel="icon" type="image/png" href="../../icons/logo.png"/>
</head>
<body>
        <div id="cabecalho">    
            <img src="../../icons/logo.png" class="logotipo">
            <img src="../../icons/text_logo.png" class="texto_logo">
        </div>
        <div id="user_menu">
			<h1 class="user"><?php echo "Olá " . $_SESSION['user'] . "!" ?> </h1>
            <h2 class="category_a">Adminstrador</h2> 
		</div>
        <div id="table_users">
            <table class="table table-bordered table-hover table-sm table-striped">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de Inscrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = query_db();
                    $sql = "SELECT nome,cpf,email,data_criacao FROM plogin order by nome";
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){
                        echo "<tr>";
                        echo '<td>: ' . $dados['nome'] . '';
                        echo '<td> ' . $dados['cpf'] . '';
                        echo '<td> ' . $dados['email'] . '';
                        echo '<td> ' . $dados['data_criacao'] . '';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="inf_box">
            d
        </div>
        <div id="rodape">
            
            <p class="copyright"><b> © Copyright 2023</b></p>
        </div>
</body>
</html>