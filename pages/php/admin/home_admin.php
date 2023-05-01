<?php
include('../functions/funcoes.php');
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
    <link rel="stylesheet" type="text/css" href="../../../styles/home_admin.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Página Inicial - Admin.</title>
    <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
</head>
<body>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>
    <main>
        <section id="section01" class="container-fluid">
        <div id="table_users">
            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Qnt. Animais</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_user = id_atribute();
                    $mysqli = query_db();

                    $sql = "SELECT * FROM plogin WHERE id != '". $id_user . "' order by nome" ;
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){

                        $sql2 = "SELECT * FROM pets WHERE id_dono ='" .$dados['id']."'";
                        $query2 = $mysqli->query($sql2);
                        if($query2->num_rows==0){
                            $rows = 'Nenhum';
                        }
                        else{
                            $rows = $query2->num_rows;
                        }

                        
                        $ativo = $dados['ativo'];
                        if($ativo==0){
                            $status = 'Inativo';
                        }
                        else{
                            $status = 'Ativo';
                        }
                        echo "<form action='perfil_user.php' method='post'>";
                        echo "<tr>";

                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['ativo'] . '" name="status">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['telefone'] . '" name="telefone">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['nome'] . '" name="nome">';
                        echo '<input type="hidden" value="' . $dados['cpf'] . '" name="cpf">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['email'] . '" name="email">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['e_cliente'] . '" name="posicao">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['data_criacao'] . '" name="data">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['senha1'] . '" name="senha">';

                        echo '<td>' . $dados['nome'] . '</td>';
                        echo '<td>' . $dados['cpf'] . '</td>';
                        echo '<td>' . $dados['email'] . '</td>';
                        echo '<td class="align_text">' . $status . '</td>';
                        echo '<td class="align_text">' . $rows . '</td>';

                        echo "<td class='d-flex align-items-center justify-content-around'>

                        <button class='btn btn-dark botao_acoes' type='submit' id='" . $dados['id'] . "'>Mais Informações</button>
                        </form>

                        <form action='painel_pets.php' method='post'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['nome'] . "' name='nome_pet'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['cpf'] . "' name='cpf'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id_dono'>";
                        echo "<button class='btn btn-primary botao_acoes' id='botao_adicionar'>Animais Registrados</button>
                        </form></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </section>
        
        <section id="section02" class="container-fluid">
            <div class="row">
            <div class="inf_box col d-flex justify-content-around">
                <div class="col col-md-4">
                    <button class="button_user" onclick="window.location.href='register_users.php'"> Adicionar usuário</button>
                </div>
                <div class="col col-md-4">
                    <button class="button_vacinas-painel" onclick="window.location.href='painel_vacinas.php'">Painel de Vacinas</button>  
                </div>     
            </div>
            </div>
        </section>
        
    </main>
        <footer>
            <?php include('../includes/rodape.php') ?>
        </footer>

        <script src="../../../js/logout.js"></script>
        <script>
            var meuBotao = document.getElementById("botao_adicionar");

            meuBotao.addEventListener("click", function() {
                window.location.href = "register_pets.php";
        });
        </script>
</body>
</html>