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
        <link rel="stylesheet" type="text/css" href="../../styles/register.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../../styles/cabecalho_e_rodape.css" media="screen" />
        <title>
            VacinaCão - Registro
        </title>
        <link rel="icon" type="image/png" href="../../icons/logo.png"/>
    </head>
    <bory>
        <div id="cabecalho">
            <a href="index.php"><img src="../../icons/logo.png" class="logotipo"></a>
            <img src="../../icons/text_logo.png" class="texto_logo">
            <a href="home.html" class="menu_home"><b>HOME</b></a>
            <a href="#" class="menu_contato"><b>CONTATO</b></a>
            <a href="#" class="menu_quemsomos"><b>QUEM SOMOS</b></a>
        </div>

        <div id="form_register">
            <form action="functions/script_register.php" method="post">

                <p class="titulo_register"><b>Solicitar acesso</b></p>

                <p class="text_nome_register">Nome completo:</p> 
                <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Heitor Miguel dos Santos" required/>

                <p class="text_cpf_register">CPF:</p>
                <input type="text" name="cpf" class="box_cpf_register" placeholder="Ex: 12345678900" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)" required/>

                <p class="text_senha_register">Crie uma senha:</p> 
                <input type="password" name="senha" class="box_senha_register" minlength="3" maxlength="8" placeholder="Senha entre 3 a 8 caract." required/>

                <p class="text_confirmsenha_register">Confirme a senha: </p>
                <input type="password" name="confirmsenha" class="box_confirmsenha_register" placeholder="Confirme sua senha"/>

                <p class="text_telefone_register">Telefone/Celular:</p>
                <input type="tel" name="telefone" class="box_telefone_register" placeholder="Ex: 38999999999" minlength="14" maxlength="15" OnKeyPress="formatar('(##)#####-####',this)" required/>

                <p class="text_email_register">Email: </p>
                <input type="email" name="email" class="box_email_register" placeholder="Ex: heitor@dominio.com" required/>

                <button type="submit" class="botao_register">Enviar Dados</button></p>
            </form>
        </div>
        <div id="comentarios"><h1 class="coment01"><b>Uma conta:</b> <br> um passo para ter o controle <br> fundamental da saúde <br>
            dos nossos pet's .</h1> 
        </div>
        <div id="rodape">
            <p class="copyright"><b> © Copyright 2023</b></p>
        </div>
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
</html>