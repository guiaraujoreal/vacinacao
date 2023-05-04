<?php
include('funcoes.php');
if (esta_logado()==1) {
	header("location:index.php");
}
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../styles/no_clients.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <title>
            Erro de cadastro - Página Inexistente
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <body>
        <header id="cabecalho">
            <?php include('../includes/cabecalho.php') ?>
        </header>
        <main>

        <section id="section01" class="container-fluid">
            <div class="animation_email d-flex justify-content-center">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_d9wImAFTrS.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
        </section>

        <section id="section02" class="conatiner-fluid">
            <div id="msgs_confirm">
                <p class="msg_confirm01"><b>Ops...você ainda não tem acesso.</b></p>
                <p class="msg_confirm02"><b>Ainda não há uma página para clientes. Mas calma! Estamos trabalhando nisso :)</b></p>
            </div>
        </section>

        <section id="section03" class="container-fluid d-flex justify-content-center">
            <div class="col_aviso row">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player   lottie-player src="https://assets4.lottiefiles.com/packages/lf20_Yf29Ko.json"  background="transparent"  speed="1"  style="width: 40px; height: 40px;"  loop  autoplay></lottie-player>
                <p class="col msg_confirm03 d-flex align-items-center"><b>Aguarde, estamos te retornando para a página anterior...</b></p>
            </div>
        </section>
        </main>
        <footer id="rodape">
            <?php include('../includes/rodape.php') ?>
        </footer>

        <script>
            setTimeout(function() {
            window.location.href = "../index.php";
            }, 7000); // redireciona para a próxima após  segundos (7000 milissegundos), tempo suficiente para carregar os dados
        </script>
    </body>
</html>