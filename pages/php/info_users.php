<?php
include('functions/funcoes.php');
if (esta_logado()==1) {
	header("location:index.php");
}


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="pt">
        <link rel="stylesheet" type="text/css" href="../../styles/info_users.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>
            VacinaCão - Registro
        </title>
        <link rel="icon" type="image/png" href="../../icons/logo.png"/>
    </head>
    <bory>
        
        <div id="cabecalho">
            <a href="index.php"><img src="../../icons/logo.png" class="logotipo"></a>
            <img src="../../icons/text_logo.png" class="texto_logo">
            <div id="user_menu">
                 <h1 class="user">
                    <?php 
                    $user = $_SESSION['user'];
                    $primeiro_nome = explode(' ', $user);
                    //user_fname equilave a "user first name" - primeiro nome do usuário
                    $user_fname = $primeiro_nome[0];
                    $_SESSION['user_fname'] = $user_fname;
                    echo "Olá " . $_SESSION['user_fname'] . "!" ?> </h1>
                <h2 class="category_a">Adminstrador</h2> 
            </div>
            <button id="botao_logout" onclick="logout()">
                <div class="text">
                    <span>Log</span>
                    <span>Out</span>
                </div>
                <div class="clone">
                    <span>Log</span>
                    <span>Out</span>
                </div>
                <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>
    


        <footer>
            <p>&copy; 2023 Meu Site</p>
        </footer>
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