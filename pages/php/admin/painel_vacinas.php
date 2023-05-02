<?php
//verificar se o usuário está logado
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
        <!--seção do menu atual correspondente a página -->
    <section id="section0" class="container-fluid">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <a href="home_admin.php"> <img src="../../../icons/arrow_back-google.png"></a>
                </div>
                <div class="col_text_top col">
                    <p class="text_top "><b>Planilha de Vacinas</b></p>
                </div>
            </div>
        </section>

        <!--tabela que mostra vacinas cadastradas no sistema-->
        <section id="section01" class="container-fluid">
        <div id="table_users" class="d-flex justify-content-center">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Vacina</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Entre doses(dias)</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Disponibilidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = query_db();

                    //selecionar as vacinas cadastradas no sistema
                    $sql = "SELECT * FROM vacina_reg ORDER BY quantidade DESC";
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){
                        $qntd = $dados['quantidade'];
                        //status e estilo do estoque de acordo com o valor do retorno do banco
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

                        //formulario do tipo 'hidden' apenas para enviar dados exigidos na p'roxima página
                        echo "<form action='../functions/alterar_dados_register_vacinas.php' method='post'>";
                        echo "<tr>";
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['nome_vacina'] . '" name="nome_vacina"></td>';
                        echo '<input type="hidden" value="' . $dados['lote'] . '" name="lote">';
                        echo '<td>' . $dados['lote'] . '</td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['laboratorio'] . '" name="lab"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['int_doses'] . '" name="int_dose"></td>';
                        echo '<td><input type="text" class="campo_form" value="' . $dados['validade'] . '" name="validade"></td>';
                        echo '<td class="align_text"><div style="' . $style .'"><b>' . $qntd_out . '</b></div></td>';
                        echo '<input type="hidden" value="'.$qntd.'" name="qntd">';
                        echo "<td class=' d-flex align-items-center justify-content-around'>

                        <button class='btn btn-success botao_acoes' type='submit' id='" . $dados['id'] . "'>Alterar Dados</button>
                        </form>
                        <form action='../functions/excluir_dados_register_vacinas.php' method='post'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id'>";
                        echo "<button class='btn btn-danger botao_acoes' id='botao_adicionar'>Excluir</button>
                        </form></td>";
                        echo "</tr>";
                        //formulario que envia os dados necessarios na página Animais Registrados
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </section>

        <!--seção do infobox que possui botões de redirecionamento a outras páginas-->
        <section id="section02" class="container-fluid">
            <div class="row">
                <div class="inf_box col d-flex justify-content-around">
                    <button class="button_register_vacinas" onclick="window.location.href='register_vacinas.php'">Registrar Vacina</button>    
                </div>
            </div>
        </section>
    </main>

    <!--inclusão do rodapé em um arquivo diferente-->
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>

</body>
</html>