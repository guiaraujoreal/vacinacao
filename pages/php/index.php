<?php
include('functions/funcoes.php');
if (esta_logado()==1) {
	header("location:home_admin.php");
}
?>
<?php if(isset($_GET['login']) && $_GET['login'] == 'incorreto'): ?>
    <p>Login incorreto. Tente novamente.</p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../styles/index.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
        <title>
            VacinaCão - Bem vindo!
        </title>
        <link rel="icon" type="image/png" href="../../icons/logo.png"/>
    </head>
    <bory>
        <header>
            <div id="cabecalho">
                <img src="../../icons/logo.png" class="logotipo">
                <img src="../../icons/text_logo.png" class="texto_logo">
                <a href="#" class="menu_contato"><b>CONTATO</b></a>
                <a href="#" class="menu_quemsomos"><b>QUEM SOMOS</b></a>
            </div>
        </header>
        <main>
            <section id="section01" class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div id="comentarios"><h1 class="coment01">Proteja quem o <br> ama e está sempre <br> com você.</h1></div>
                    </div>
                    <div class="col  d-flex justify-content-end">
                        <div class="form_main">
                            <form action="functions/efetuar_login.php" method="post">
                                <p class="titulo_form"><b>Faça o Login</b></p>
                                <p class="text_cpf_main"><b>Digite seu CPF:</b></p> 
                                <input type="text" name="cpf" class="box_cpf_main" placeholder="Somente os números" minlength="11" maxlength="11"  required/> 
                                <p class="text_senha_main"><b>Digite sua senha:</b></p>
                                <input type="password" name="senha" class="box_senha_main" placeholder="Sua senha possui de 3 a 8 caract." minlength="3" maxlength="8" required/>
                                <button type="submit" class="botao_login">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <p>&copy; 2023 Meu Site</p>
        </footer>
    </bory>
</html>