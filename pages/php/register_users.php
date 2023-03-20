<?php
include('functions/funcoes.php');
if (esta_logado()==1) {
	header("location:register.php");
}


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="pt">
        <link rel="stylesheet" type="text/css" href="../../styles/register_users.css" media="screen" />
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
        <div id="form_register">
            <form action="functions/query_register_user.php" method="post">

                <p class="titulo_register"><b>Cadastrar Usuário</b></p>

                <p class="text_nome_register">Nome completo:</p> 
                <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Heitor Miguel dos Santos" required/>

                <p class="text_cpf_register">CPF:</p>
                <input type="text" name="cpf" class="box_cpf_register" placeholder="Ex: 12345678900" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)" required/>

                <p class="text_senha_register">Crie uma senha:</p> 
                <input type="password" name="senha" class="box_senha_register" minlength="3" maxlength="8" placeholder="Senha entre 3 a 8 caract." required/>

                <p class="text_confirmsenha_register">Confirme a senha: </p>
                <input type="password" name="confirmsenha" class="box_confirmsenha_register" placeholder="Confirme sua senha"/>

                <p class="text_telefone_register">Telefone/Celular:</p>
                <input type="tel" name="telefone" class="box_telefone_register" placeholder="Ex: 38999999999" minlength="13" maxlength="14" OnKeyPress="formatar('(##)#####-####',this)" required/>

                <p class="text_email_register">Email: </p>
                <input type="email" name="email" class="box_email_register" placeholder="Ex: heitor@dominio.com" required/>

                <p class="text_seletor01">Status:</p>
                <select class="seletor01" name="seletor01">
                    <option value="1" >Ativo</option>
                    <option value="0" >Inativo</option>
                </select>

                <p class="text_seletor02">Função:</p>
                <select class="seletor02" name="seletor02">
                    <option value="0">Cliente</option>
                    <option value="1" >Administrador</option>
                </select>

                <button type="submit" class="botao_register">Enviar Dados</button></p>
            </form>
        </div>
        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInRight"><b>Vamos criar uma conta!</b></h1> </div>

        <div id="animation">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_z9ed2jna.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
        </div>
        <footer>
            <p>&copy; 2023 Meu Site</p>
        </footer>
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