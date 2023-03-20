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
        <link rel="stylesheet" type="text/css" href="../../styles/register_pets.css" media="screen" />
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
            <a href="home.html" class="menu_home"><b>HOME</b></a>
            <a href="#" class="menu_contato"><b>CONTATO</b></a>
            <a href="#" class="menu_quemsomos"><b>QUEM SOMOS</b></a>
        </div>
        <div id="form_register">
            <form action="functions/query_register_user.php" method="post">

                <p class="titulo_register"><b>Cadastrar Animal(Pet)</b></p>

                <p class="text_nome_register">Nome do animal:</p> 
                <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Bob" required/>

                <p class="text_senha_register">Crie uma senha:</p> 
                <input type="password" name="senha" class="box_senha_register" minlength="3" maxlength="8" placeholder="Senha entre 3 a 8 caract." required/>

                <p class="text_confirmsenha_register">Confirme a senha: </p>
                <input type="password" name="confirmsenha" class="box_confirmsenha_register" placeholder="Confirme sua senha"/>

                <p class="text_telefone_register">Telefone/Celular:</p>
                <input type="tel" name="telefone" class="box_telefone_register" placeholder="Ex: 38999999999" minlength="13" maxlength="14" OnKeyPress="formatar('(##)#####-####',this)" required/>

                <p class="text_email_register">Email: </p>
                <input type="email" name="email" class="box_email_register" placeholder="Ex: heitor@dominio.com" required/>

                <p class="text_seletor01">Selecione o cliente/dono:</p>
                <select name="select[]" class="seletor01">
                    <option>Selecione</option>
                    <?php
                    $mysqli = query_db();

                    $sql = "SELECT nome FROM plogin order by nome";
                    $result = $mysqli->query($sql);

                        while($row = $result->fetch_assoc()) { 
                            $row['nome']?>
                            <option value="<?php echo $row['nome']; ?>"><?php echo $row['nome'] ?></option>
                        <?php
                    }
                    ?>
                </select>

                <button type="submit" class="botao_register">Enviar Dados</button></p>
            </form>
        </div>
        <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInLeft"><b>Vamos adicionar algumas <br>
    informações sobre o Pet</b></h1> </div>

        <div id="animation">

        </div>
        <footer>
            <p>&copy; 2023 Meu Site</p>
        </footer>

        <div id="animation">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_syqnfe7c.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
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