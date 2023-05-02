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
    <link rel="stylesheet" type="text/css" href="../../../styles/confirm_email_register.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <title>
            VacinaCão - Confirmação de cadastro
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
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_y9qOnk.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            </div>
        </section>

        <section id="section02" class="conatiner-fluid">
            <div id="msgs_confirm">
                <p class="msg_confirm01"><b>Confirmação de Cadastro enviada com êxito!</b></p>
                <p class="msg_confirm02"><b>Uma confirmaçao de cadastro foi enviada ao usuário.<br> Aguarde, estamos redirecionando você...</b></p>
            </div>
</section>

        
        </main>
        <footer id="rodape">
            <?php include('../includes/rodape.php') ?>
        </footer>

        <script>
            setTimeout(function() {
            window.location.href = "../admin/home_admin.php";
            }, 5000); // redireciona para a próxima após 5 segundos (5000 milissegundos)
        </script>
    </body>
</html>