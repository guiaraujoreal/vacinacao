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
        <link rel="stylesheet" type="text/css" href="../../../styles/register_vacinas.css" media="screen">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>
            VacinaCão - Registro de Vacinas
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
            <div class="col d-flex justify-content-center">
                        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInLeft"><b>Cadastro de Vacinas</b></h1> </div>

                        <div id="animation">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vewnyqdu.json"  background="transparent"  speed="1"  style="width: 450px; height: 450px;"  loop  autoplay></lottie-player>
                        </div>
                </div>
                <!-- Formulário para registrar as vacinas no banco-->
                <div class="col d-flex justify-content-center">
                    <div id="form_register" class="animate__animated animate__bounceInLeft">
                        <form action="../functions/query_register_vacinas.php" method="post">

                            <p class="titulo_register"><b>Registrar Vacina</b></p>

                            <!--Registrar no nome da vacina-->
                            <p class="text_vacina_register">Vacina:</p> 
                            <input type="text" name="vacina" class="box_vacina_register" placeholder="Siga o padrão de nomes" maxlength="45" required>

                            <!--Registrar o laboratorio de producao-->
                            <p class="text_lab">Laboratório:</p>
                            <input name="lab" class="lab" placeholder="Informe o nome da fabricante da vacina" maxlength="45" required>

                            <!--Registrar a identificacao do lote-->
                            <p class="text_lote">ID Lote: </p>
                            <input type="text" name="lote" class="box_lote" placeholder="Insira o ID do lote." maxlength="45" required>

                            <!--Registrar a intervalo de doses(em dias)-->
                            <p class="text_int_dose">Intervalo entre doses: </p>
                            <input type="text" name="int_dose" class="box_int_dose" placeholder="Número de dias" maxlength="3" required>

                            <!--Registrar a validade da vacina-->
                            <p class="text_validade">Validade:</p>
                            <input type="date" name="validade" class="validade" placeholder="Formato: ANO-MES-DIA" required>

                            <!--Quantia de ampolas/seringas recebidas-->
                            <p class="text_qntd">Quantia recebida(unid.):</p>
                            <input name="qntd" class="qntd" placeholder="Estoque recebido" required>

                            <!--botoes de acao do formulario-->
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