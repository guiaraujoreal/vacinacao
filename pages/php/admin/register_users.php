<?php
include('../functions/funcoes.php');
if (esta_logado()==1) {
	header("location:register.php");
}

// Verifica se há uma mensagem de erro definida na sessão
if (isset($_SESSION["mensagem_erro"])) {
    // Exibe a mensagem de erro na página de cadastro
    echo '<div class="alert alert-danger">' . $_SESSION["mensagem_erro"] . '</div>';

    // Limpa a mensagem de erro da sessão para que ela não seja exibida novamente na próxima vez que a página for carregada
 unset($_SESSION["mensagem_erro"]);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="pt">
        <link rel="stylesheet" type="text/css" href="../../../styles/register_users.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>
            VacinaCão - Registro de Usuário
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <bory>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col">
                    <div id="form_register" class="animate__animated animate__bounceInLeft">
                        <form action="../functions/query_register_user.php" method="post">

                            <p class="titulo_register"><b>Cadastrar Usuário</b></p>

                            <p class="text_nome_register">Nome completo:</p> 
                            <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Heitor Miguel dos Santos" required/>

                            <p class="text_cpf_register">CPF:</p>
                            <input type="text" name="cpf" class="box_cpf_register" placeholder="Ex: 12345678900" minlength="11" maxlength="11" required/>

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
                                <option value="1">Cliente</option>
                                <option value="0" >Administrador</option>
                            </select>

                            <p><button type="submit" class="botao_register" onclick="window.location.href='../functions/send_email_page.php'">Enviar Dados</button></p>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInRight"><b>Vamos criar uma conta!</b></h1> </div>

                    <div id="animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_z9ed2jna.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    </bory>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "functions/funcoes.php", true);
            xhr.send();
            window.location = "index.php";
        }
    </script>
</html>