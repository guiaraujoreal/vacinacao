<?php
include('../functions/funcoes.php');
if (esta_logado()==1) {
	header("location:register.php");
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../styles/painel_pets.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Vacinar Pet</title>
    <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
</head>
<body>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>

        <section id="section02" class="container">

            <div id="table_add_doses">
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Responsável/Dono</th>
                        <th scope="col">Nome do Animal</th>
                        <th scope="col">Idade Estimada</th>
                        <th scope="col">Raça</th>
                        <th scope="col">Tipagem Animal</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = query_db();

                    $id_dono = $_POST['id_dono'];
                    $nome_dono = $_POST['nome'];
                    $cpf_dono = $_POST['cpf'];
                    $sql = "SELECT * FROM pets WHERE id_dono = '". $id_dono . "' order by nome" ;
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){


                        $idade = $dados['idade_est'];
                        if($idade=='1'){
                            $idade_est = 'Até 1 ano';
                        }
                        elseif($idade=='2'){
                            $idade_est = 'Entre 1 a 3 anos';
                        }
                        elseif($idade=='3'){
                            $idade_est = 'Entre 3 a 5 anos';
                        }
                        else{
                            $idade_est = 'Acima de 5 anos';
                        }

                        echo "<form action='../functions/alterar_dados_home_admin.php' method='post'>";
                        echo "<tr>";
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<td><input type="text" class="campo_form" value="' . $nome_dono . '" name="nome_dono"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['nome'] . '" name="nome_pet"></td>';
                        echo '<td><input type="text" value="' . $idade_est . '" name="idade"></td>';
                        echo '<td><input type="text" value="' . $dados['raca'] . '" name="raca"></td>';
                        echo '<td><input type="text" value="' . $dados['tipagem'] . '" name="tipagem"></td>';
                        echo '<td><input type="text" value="' . $dados['genero'] . '" name="genero"></td>';
                        echo "<td class=' d-flex align-items-center'>

                        <button class='btn btn-success botao_acoes' type='submit' id='" . $dados['id'] . "'>Alterar Dados</button>
                        </form>
                        <form action='../functions/excluir_dados_home_admin.php' method='post'>
                        <input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id'>
                        <button type='submit' class='btn btn-danger botao_acoes'>Excluir</button>
                        </form>
                        <form action='register_pets.php' method='post'>";
                        echo "<input type='hidden' class='campo_form' value='" . $cpf_dono . "' name='cpf'>";
                        echo "<input type='hidden' class='campo_form' value='" . $id_dono . "' name='id_dono'>";
                        echo "<button type='submit' class='btn btn-primary botao_acoes' id='botao_adicionar'>Animais Registrados</button>
                        </form></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </section>

        <section id="section02" class="cotainer">
            <div class="row">
                <div class="inf_box col">
                    <form action="register_pets.php" method="post">
                        <?php echo "<input type='hidden' class='campo_form' value='" . $cpf_dono . "' name='cpf'>";
                            echo "<input type='hidden' class='campo_form' value='" . $id_dono . "' name='id_dono'>"; ?>
                        <button class="button_register_pets" type="submit"> Cadastrar Animal</button>
                    </form>     
                </div>
            </div>
        </section>

    </main>
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    
</body>
</html>