<?php
include('functions/funcoes.php');
if (esta_logado()==1) {
	header("location:index.php");
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../styles/confirm_email_register.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta lang="pt">
        <title>
            VacinaCão - Confirmação de cadastro
        </title>
        <link rel="icon" type="image/png" href="../../icons/logo.png"/>
    </head>
    <body>
        <div id="cabecalho">
            <a href="../php/index.php"><img src="../../icons/logo.png" class="logotipo"></a>
            <img src="../../icons/text_logo.png" class="texto_logo">
            <div id="user_menu">
                <h1 class="user">
                    <?php 
                    $user = $_SESSION['user'];
                    $primeiro_nome = explode(' ', $user);
                    //user_fname equilave a "user first name" - primeiro nome do usuário
                    $user_fname = $primeiro_nome[0];
                    $_SESSION['user_fname'] = $user_fname;
                    echo "Olá " . $_SESSION['user_fname'] . "!" ?> </h1> </div>
                    <h2 class="category_a">Adminstrador</h2>
            
        </div>
        <div id="msgs_confirm">
            <p class="msg_confirm01"><b>Confirmação de Cadastro enviada com êxito!</b></p>
            <p class="msg_confirm02"><b>Uma mensagem de confirmação foi enviada ao seu email. Verifique sua caixa de entrada.</b></p>
        </div>

        <div id="rodape">
            <p class="copyright"><b> © Copyright 2023</b></p>
        </div>

        <div class="animation_email">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_y9qOnk.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
    </body>
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
</html>