<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="utf-8" lang="pt">
        <link rel="stylesheet" type="text/css" href="../styles/home.css" media="screen" />
        <title>
            VacinaCão - Bem vindo!
        </title>
        <link rel="icon" type="image/png" href="../icons/logo.png"/>
    </head>
    <bory>
        <div id="cabecalho_main">
            <img src="../icons/logo.png" class="logotipo">
            <img src="../icons/text_logo.png" class="texto_logo">
            <a href="home.html" class="menu_home"><b>HOME</b></a>
            <a href="#" class="menu_contato"><b>CONTATO</b></a>
            <a href="#" class="menu_quemsomos"><b>QUEM SOMOS</b></a>
        </div>
        <div class="form_main">

            <form action="efetuar_login.php" method="post">
                <p class="titulo_form"><b>Faça o Login</b></p>
                <p class="text_cpf_main"><b>Digite seu CPF:</b></p> 
                <input type="text" name="cpf" class="box_cpf_main" placeholder="Somente os números"/> 
                <p class="text_senha_main"><b>Digite sua senha:</b></p>
                <input type="text" name="senha" class="box_senha_main" placeholder="Sua senha possui de 3 a 8 caracteres"/>
                <button type="submit" class="botao_login">Entrar</button>
            </form>

            <p class="acesso_singin">Não possui uma conta?</p>
            
            <a href="register.html" target="_blank" ><button class="botao_singin" ><b>Solicite o acesso!</b></button></a>
        </div>
        <div id="comentarios"><h1 class="coment01">Proteja quem o <br> protege e está sempre <br> com você.</h1> 
        </div>
        <div id="rodape">
            
            <p class="copyright"><b> © Copyright 2023</b></p>
        </div>
    </bory>
</html>