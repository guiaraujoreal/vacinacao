<?php
//verificar se o usuário está logado
include('../functions/funcoes.php');
if (esta_logado()==1) {
	header("location:register.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="pt">
        <link rel="stylesheet" type="text/css" href="../../../styles/register_pets.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>
            VacinaCão - Registro de Animal
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <bory>
        <!--incluir cabecalho-->
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>
    <main>

    <!--Animacao e titulo da pagina-->
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col">
                        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInLeft"><b>Vamos adicionar algumas <br> informações sobre o Pet</b></h1> </div>

                        <div id="animation">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_syqnfe7c.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
                        </div>
                </div>
                <!-- Formulário para registrar os animais no banco-->
                <div class="col d-flex justify-content-end">
                    <div id="form_register" class="animate__animated animate__bounceInLeft">
                        <form action="../functions/query_register_pets.php" method="post">

                            <p class="titulo_register"><b>Cadastrar Animal(Pet)</b></p>

                            <p class="text_nome_register">Nome do animal:</p> 
                            <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Bob" maxlength="45" required/>

                            <p class="text_seletor02">Tipagem animal:</p>
                            <select name="tipagem" class="seletor02">
                            <?php
                            //obtem a tipagem animal do banco
                            $mysqli = query_db();
                            $sql = "SELECT * FROM categoria_pet";
                            $query = $mysqli->query($sql);
                            while ($row = mysqli_fetch_assoc($query)){
                                $categoria = $row["id"];
                                echo '<option value="' . $categoria . '">' . $row["categoria"] . '</option>';
                                if($categoria==1){
                                    $raca = 1;
                                }
                                elseif($categoria==2){
                                    $raca = 2;
                                }
                                elseif($categoria==3){
                                    $raca = 3;
                                }
                                elseif($categoria==4){
                                    $raca = 4;
                                }
                                else{
                                    $raca = 5;
                                }
                            }

                            ?>
                            </select>


                            <p class="text_raca">Raça: </p>
                            <select type="text" name="raca" class="box_raca">
                            <?php
                            //correlacionar duas tabelas com dados dependentes entre elas
                            $mysqli = query_db();
                            $sql = "SELECT * FROM racas INNER JOIN categoria_pet ON racas.id_categoria = categoria_pet.id ORDER BY racas.racas";
                            $query = $mysqli->query($sql);
                            while ($row = mysqli_fetch_assoc($query)){
                                $id_raca = $row['idracas'];
                                echo '<option value="' . $id_raca . '">' . $row["racas"] . '</option>';
                            }
                            ?>
                            </select>
                            <p class="text_seletor03">Ano de nascimento:</p>
                            <!-- Ano de nascimento do animal-->
                            <input type="text" name="idade" class="seletor03" minlength="4" maxlength="4" required>

                            <p class="text_seletor04">Gênero:</p>
                            <!--Determina o genero em string no banco-->
                            <select name="genero" class="seletor04">
                                <option value="Nao Definido">Não definido</option>
                                <option value="Macho">Macho</option>
                                <option value="Femea">Fêmea</option>
                            </select>

                            <p class="text_seletor01">Dono selecionado:</p>
                            <div name="dono" class="seletor01">
                            <?php
                            //resgata o nome do dono atraves de seu cpf e id 
                            $cpf_duo = $_POST['cpf'];
                            $id_dono = $_POST['id_dono'];
                            $mysqli = query_db();
                            $sql2 = "SELECT nome FROM plogin WHERE cpf = '". $cpf_duo . "'" ;
                            $query2 = $mysqli->query($sql2);
                            while ($dados = mysqli_fetch_assoc($query2)){
                                $name_out = $dados["nome"];
                                echo '<p class="print_dono"><b>' . $name_out . '</b></p>';
                            }
                            echo "<input type='hidden' class='campo_form' value='" . $cpf_duo . "' name='cpf_dono'>";
                            echo "<input type='hidden' class='campo_form' value='" . $id_dono . "' name='id_do_dono'>";
                            ?>

                            </div>

                            <!--botoes de acoes do formulario-->
                            <button type="submit" class="botao_register">Enviar Dados</button>
                            <p><button class="botao_pularss" onclick="window.location.href='home_admin.php'">Ir para Home</button></p>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>

    </main>
    <!--incluir rodape-->
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    </bory>
</html>