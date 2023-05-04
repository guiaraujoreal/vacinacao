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
        <!--incluir cabecalho-->
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>
        <!-- Formulário para registrar os animais no banco-->
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col">
                    <div id="form_register" class="animate__animated animate__bounceInLeft">
                        <form action="../functions/query_register_user.php" method="post">

                            <p class="titulo_register"><b>Cadastrar Usuário</b></p>

                            <!--nome completo do usuario-->
                            <p class="text_nome_register">Nome completo:</p> 
                            <input type="text" name="nome" class="box_nome_register" maxlength="45" placeholder="Ex: Heitor Miguel dos Santos" required>
                            
                            <!--cpf do usuario-->
                            <p class="text_cpf_register">CPF:</p>
                            <input type="text" name="cpf" class="box_cpf_register" placeholder="Ex: 12345678900" minlength="11" maxlength="11" required>

                            <!--elabora uma senha ao usuario-->
                            <p class="text_senha_register">Crie uma senha:</p> 
                            <input type="text" name="senha" class="box_senha_register" minlength="3" maxlength="8" placeholder="Senha entre 3 a 8 caract." required>

                            <!--confirma a senha acima, sendo equivalentes-->
                            <p class="text_confirmsenha_register">Confirme a senha: </p>
                            <input type="text" name="confirmsenha" class="box_confirmsenha_register" placeholder="Confirme sua senha" required>

                            <!--Telefone ou celular do usuaeio-->
                            <p class="text_telefone_register">Telefone/Celular:</p>
                            <input type="tel" name="telefone" class="box_telefone_register" placeholder="Ex: 38999999999" minlength="10" maxlength="11" OnKeyPress="formatar('(##)#####-####',this)" required>

                            <!--email do usuario-->
                            <p class="text_email_register">Email: </p>
                            <input type="email" name="email" class="box_email_register" placeholder="Ex: heitor@dominio.com" required>

                            <!--registrar se o usuario incicialmente e ativo ou nao-->
                            <p class="text_seletor01">Status:</p>
                            <select class="seletor01" name="seletor01" required>
                                <option value="1" >Ativo</option>
                                <option value="0" >Inativo</option>
                            </select>

                            <!--registrar se o usuario é cliente ou admin-->
                            <p class="text_seletor02">Posição:</p>
                            <select class="seletor02" name="seletor02" required>
                                <option value="1">Cliente</option>
                                <option value="0" >Administrador</option>
                            </select>

                            <p class="text_rua_register">Rua/n°: </p>
                            <input type="text" name="rua" class="box_rua_register" placeholder="Ex: Otaviano Costa, 210" maxlength="100" required>

                            <p class="text_bairro_register">Bairro: </p>
                            <input type="text" name="bairro" class="box_bairro_register" placeholder="Ex: Seu bairro atual" maxlength="45" required>

                            <p class="text_cidade_register">Cidade: </p>
                            <input type="text" name="cidade" class="box_cidade_register" placeholder="Ex: Sua cidade atual" maxlength="45" required>

                            <p class="text_estado_register">Estado: </p>
                            <select type="text" name="estado" class="box_estado_register" maxlength="45" required>
                                <?php
                                    // Conecta ao banco de dados
                                    $mysqli = query_db();

                                    $sql = "SELECT * FROM estado";
                                    $result = $mysqli->query($sql);
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="' . $row['nome'] . '">'.$row['nome'] .'</option>';
                                    }
                                    ?>
                            </select>

                            <p><button type="submit" class="botao_register" >Enviar Dados</button></p>
                        </form>
                    </div>
                </div>
                <!--Animacao e titulo da pagina-->
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

    <!--importar bibliotecas JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </bory>
    

</html>