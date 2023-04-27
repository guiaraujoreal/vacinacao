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
        <link rel="stylesheet" type="text/css" href="../../../styles/register_vacinas.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>
            VacinaCão - Registro de Vacinas
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <bory>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>
    <main>
        <div id="form_register" class="animate__animated animate__bounceInRight">
            <form action="../functions/query_register_vacinas.php" method="post">

                <p class="titulo_register"><b>Registrar Vacina</b></p>

                <p class="text_vacina_register">Vacina:</p> 
                <input type="text" name="vacina" class="box_vacina_register" placeholder="Identificação da vacina" required>

                <p class="text_lab">Laboratório:</p>
                <input name="lab" class="lab" placeholder="Informe o nome da fabricante da vacina" required>

                <p class="text_lote">ID Lote: </p>
                <input type="text" name="lote" class="box_lote" placeholder="Insira o ID do lote." required>

                <p class="text_validade">Validade:</p>
                <input name="validade" class="validade" placeholder="Formato: ANO-MES-DIA" required>

                <p class="text_qntd">Quantia recebida(unid.):</p>
                <input name="qntd" class="qntd" placeholder="Estoque recebido" required>

                <button type="submit" class="botao_register">Enviar Dados</button>
                <p><button class="botao_pularss" onclick="window.location.href='../info_users.php'">Pular sessão</button></p>
            </form>
        </div>
        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInLeft"><b>Cadastro de Vacinas</b></h1> </div>

        <div id="animation">

        </div>
    </main>
    
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>

        <div id="animation">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vewnyqdu.json"  background="transparent"  speed="1"  style="width: 450px; height: 450px;"  loop  autoplay></lottie-player>
        </div>
    </bory>

    <script>
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "functions/funcoes.php", true);
            xhr.send();
            window.location = "index.php";
        }
    </script>
</html>