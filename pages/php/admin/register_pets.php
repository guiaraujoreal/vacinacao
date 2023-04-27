<?php
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
        <title>
            VacinaCão - Registro de Animal
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <bory>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>
    <main>
        <div id="form_register" class="animate__animated animate__bounceInRight">
            <form action="../functions/query_register_pets.php" method="post">

                <p class="titulo_register"><b>Cadastrar Animal(Pet)</b></p>

                <p class="text_nome_register">Nome do animal:</p> 
                <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Bob" required/>

                <p class="text_seletor02">Tipagem animal:</p>
                <select name="tipagem" class="seletor02">
                    <option>Selecione</option>
                    <option value="cachorro">Cachorro</option>
                    <option value="gato">Gato</option>
                    <option value="ave">Ave</option>
                    <option value="reptil">Réptil</option>
                    <option value="artropode">Artrópode</option>
                    <option value="d_vertebrados">Demais vertebrados</option>
                    <option value="d_invertebrados">Demais invertebrados</option>
                </select>

                <p class="text_raca">Raça Espécie: </p>
                <input type="text" name="raca" class="box_raca" placeholder="Na dúvida, não preencher." />

                <p class="text_seletor03">Estimativa de idade:</p>
                <select name="idade" class="seletor03" required>
                    <option>Selecione</option>
                    <option value="1">menor que 1 ano</option>
                    <option value="2">entre 1 e 3 anos</option>
                    <option value="3">entre 3 e 5 anos</option>
                    <option value="4">Maior que 5 anos</option>
                </select>

                <p class="text_seletor04">Gênero:</p>
                <select name="genero" class="seletor04">
                    <option name="n_definido">Não definido</option>
                    <option value="macho">Macho</option>
                    <option value="femea">Fêmea</option>
                </select>

                <p class="text_seletor01">Dono selecionado:</p>
                <div name="dono" class="seletor01">
                <?php 
                $cpf_duo = $_POST['cpf'];
                $id_dono = $_POST['id_dono'];
                $mysqli = query_db();
                $sql = "SELECT nome FROM plogin WHERE cpf = '". $cpf_duo . "'" ;
                $query = $mysqli->query($sql);
                while ($dados = mysqli_fetch_assoc($query)){
                    $name_out = $dados["nome"];
                    echo '<p class="print_dono"><b>' . $name_out . '</b></p>';
                }
                echo "<input type='hidden' class='campo_form' value='" . $cpf_duo . "' name='cpf_dono'>";
                echo "<input type='hidden' class='campo_form' value='" . $id_dono . "' name='id_do_dono'>";
                ?>

                </div>

                <button type="submit" class="botao_register">Enviar Dados</button>
                <p><button class="botao_pularss" onclick="window.location.href='../info_users.php'">Pular sessão</button></p>
            </form>
        </div>
        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInLeft"><b>Vamos adicionar algumas <br>
    informações sobre o Pet</b></h1> </div>

        <div id="animation">

        </div>
    </main>
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>

        <div id="animation">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_syqnfe7c.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
        </div>
    </bory>
    <script>  
        function formatar(mascara, documento) {
          let i = documento.value.length;
          let saida = '#';
          let texto = mascara.substring(i);
          while (texto.substring(0, 1) != saida && texto.length ) {
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
          }
        }
    </script>
    <script>
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "functions/funcoes.php", true);
            xhr.send();
            window.location = "index.php";
        }
    </script>
</html>