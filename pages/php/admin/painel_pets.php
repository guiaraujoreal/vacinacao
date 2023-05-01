<?php
//verificar se o usuário está logado
include('../functions/funcoes.php');
if (esta_logado()==1) {
	header("location:register.php");
}
//atribuir a função 'query_db' paraconexão ao banco de dados
$mysqli = query_db();
$nome_dono = $_POST['nome_pet'];
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
    <title>Animais Cadastrados</title>
    <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
</head>
<body>
    <header>
	    <!-- adicionar cabecalho geral do site-->
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>
	    <!--seção para subtitulo da página-->
    <section id="section0" class="container-fluid">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <a href="home_admin.php"> <img src="../../../icons/arrow_back-google.png"></a>
                </div>
                <div class="col_text_top col">
                    <p class="text_top "><b> Animais de <?php echo $nome_dono ?> </b></p>
                </div>
            </div>
        </section>
	    
	    <!--formulario para mostrar animais acadastrados na tela-->
        <section id="section01" class="container-fluid">

            <div id="table_add_doses">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr class="table_cabec">
                        <th scope="col">Nome do Animal</th>
                        <th scope="col">Idade Aprox.</th>
                        <th scope="col">Tipagem Animal</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
	
	//selecionar animais acadastrados de acordo com a id do dono
                    $mysqli = query_db();

                    $id_dono = $_POST['id_dono'];
                    $cpf_dono = $_POST['cpf'];
                    $sql = "SELECT * FROM pets WHERE id_dono = '". $id_dono . "' order by nome" ;
                    $query = $mysqli->query($sql);
                    while ($dados = mysqli_fetch_assoc($query)){

			    //calcular idade do animal
                        $ano = $dados['ano_nasc'];
                        $dt_nascimento = DateTime::createFromFormat('Y-m-d', $ano . '-01-01');
                        if ($dt_nascimento !== false) {
                            $dt_atual = new DateTime();
                            $intervalo = $dt_atual->diff($dt_nascimento);
                            $idade = $intervalo->y;
                            if($idade==1){
                                $idade_out=$idade . ' ano';
                            }
                            else{
                                $idade_out=$idade . ' anos';
                            }
                        }



			    //formulário do tipo 'hidden' apenas para enviar dados a próxima página
                        echo "<form action='perfil_pets.php' method='post'>";
                        echo "<tr>";
                        echo '<input type="hidden" class="campo_form" value="' . $dados['id'] . '" name="id">';
                        echo '<input type="hidden" class="campo_form" value="' . $dados['nome'] . '" name="nome_pet">';
                        echo '<input type="hidden" value="' . $idade . '" name="idade">';
                        echo '<input type="hidden" value="' . $ano . '" name="ano_nasc">';
                        echo '<input type="hidden" value="' . $dados['tipagem'] . '" name="tipagem">';
                        echo '<input type="hidden" value="' . $dados['genero'] . '" name="genero">';
                        echo '<input type="hidden" value="' . $nome_dono . '" name="nome_dono">';
                        echo '<input type="hidden" value="' . $dados['raca'] . '" name="raca">';
                        echo '<input type="hidden" value="' . $dados['data_reg'] . '" name="data_reg">';
                        echo '<input type="hidden" value="' . $dados['genero'] . '" name="genero">';
                        echo '<input type="hidden" value="' . $id_dono . '" name="id_dono">';
                        echo '<input type="hidden" value="' . $cpf_dono . '" name="cpf_dono">';
			    
			    //mostrar dados na tela
                        echo '<td>' . $dados['nome'] . '</td>';
                        echo '<td class="align_text">' . $idade_out . '</td>';
                        echo '<td class="align_text">' . $dados['tipagem'] . '</td>';
                        echo '<td class="align_text">' . $dados['genero'] . '</td>';
                        echo "<td class='col d-flex align-items-center justify-content-around'>

                        <button class='btn btn-dark botao_acoes' type='submit' >Mais Informações</button>
                        </form>
			
			//formulario para enviar dados a pagina 'Vacinar este animal'
                        <form action='register_doses_vacina.php' method='post'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['nome'] . "' name='nome_pet'>";
                        echo "<input type='hidden' class='campo_form' value='" . $dados['id'] . "' name='id_pet'>";
                        echo "<button type='submit' class='btn btn-primary botao_acoes' id='botao_adicionar'>Vacinar este animal</button>
                        </form>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </section>
	    
	    <!--Seção para enviar dados a página 'Cadastrar Animal'-->
        <section id="section02" class="container-fluid">
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
	<!--importar scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
	<!--incluir arquivo de rodapé universal do site-->
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>

    
</body>
</html>
