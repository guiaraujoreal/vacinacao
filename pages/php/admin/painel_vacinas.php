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
    <link rel="stylesheet" type="text/css" href="../../../styles/painel_vacinas.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Painel de Vacinação</title>
    <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
</head>
<body>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>
    <main>
        <section id="section01" class="container-fluid">
        <div id="table_users" class="d-flex justify-content-center">
            <table class="table table-bordered table-hover table-striped table-responsive">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Vacina</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Disponibilidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = query_db();

                    $sql = "SELECT * FROM vacina_reg";
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){
                        $qntd = $dados['quantidade'];
                        if($qntd > 10){
                            $qntd_out = 'Disponível<br>(' . $qntd . ' und. em estoque)';
                            $style = 'color: rgb(1, 203, 1);';
                        }
                        elseif($qntd > 0 or $qntd == 10){
                            $qntd_out = 'Estoque baixo!<br>(' . $qntd . ' und. em estoque)';
                            $style = 'color: rgb(255, 109, 25);';
                        }
                        else{
                            $qntd_out = 'Indisponível<br>(estoque zerado)';
                            $style = 'color: red;';
                        }

                        echo "<form action='../functions/alterar_dados_register_vacinas.php' method='post'>";
                        echo "<tr>";
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['nome_vacina'] . '" name="nome_vacina"></td>';
                        echo '<td><input type="text" value="' . $dados['lote'] . '" name="lote"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['laboratorio'] . '" name="lab"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['validade'] . '" name="validade"></td>';
                        echo '<td><div style="' . $style .'"><b>' . $qntd_out . '</b></div></td>';
                        echo "<td class=' d-flex align-items-center'>

                        <button class='btn btn-success botao_acoes' type='submit' id='" . $dados['id'] . "'>Alterar Dados</button>
                        </form>
                        <form action='../functions/excluir_dados_register_vacinas.php' method='post'>
                        <input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id'>
                        <button type='submit' class='btn btn-danger botao_acoes'>Excluir</button>
                        </form>
                        <form action='../register_pets.php' method='post'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id'>";
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
                    <button class="button_register_vacinas" onclick="window.location.href='register_vacinas.php'">Registrar Vacina</button>    
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