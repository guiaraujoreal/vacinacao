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
            <div id="user_menu">
                 <h1 class="user">
                    <?php 
                    $user = $_SESSION['user'];
                    $primeiro_nome = explode(' ', $user);
                    //user_fname equilave a "user first name" - primeiro nome do usuário
                    $user_fname = $primeiro_nome[0];
                    $_SESSION['user_fname'] = $user_fname;
                    echo "Olá " . $_SESSION['user_fname'] . "!" ?> </h1>
                <h2 class="category_a"><?php
                $mysqli = query_db();

                $sql = "SELECT e_cliente FROM plogin";
                $result = $mysqli->query($sql);
                if($result == 0){
                    $cat = 'Cliente';
                }
                else{
                    $cat = 'Administrador';
                }
                echo $cat
                ?></h2> 
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
        <div id="form_register" class="animate__animated animate__bounceInRight">
            <form action="functions/query_register_pets.php" method="post">

                <p class="titulo_register"><b>Cadastrar Animal(Pet)</b></p>

                <p class="text_nome_register">Nome do animal:</p> 
                <input type="text" name="nome" class="box_nome_register" placeholder="Ex: Bob" required/>

                <p class="text_seletor02">Tipagem animal:</p>
                <select name="tipagem" class="seletor02">
                    <option>Selecione</option>
                    <option value="cachorro">Cachorro</option>
                    <option value="gato">Gato</option>
                    <option value="ave">Ave</option>
                    <option value="reptil">Réptil</option>
                    <option value="artropode">Artrópode</option>
                    <option value="d_vertebrados">Demais vertebrados</option>
                    <option value="d_invertebrados">Demais invertebrados</option>
                </select>

                <p class="text_raca">Raça Espécie: </p>
                <input type="text" name="raca" class="box_raca" placeholder="Na dúvida, não preencher." />

                <p class="text_seletor03">Estimativa de idade:</p>
                <select name="idade" class="seletor03">
                    <option>Slecione</option>
                    <option value="menor_1">menor que 1 ano</option>
                    <option value="1e3">entre 1 e 3 anos</option>
                    <option value="3e5">entre 3 e 5 anos</option>
                    <option value="manoir_5">Maior que 5 anos</option>
                </select>

                <p class="text_seletor04">Gênero:</p>
                <select name="genero" class="seletor04">
                    <option name="n_definido">Não definido</option>
                    <option value="macho">Macho</option>
                    <option value="femea">Fêmea</option>
                </select>

                <p class="text_email">Email de confirmação</p>
                <?php $mysqli = query_db();

                $sql = "SELECT email FROM plogin order by nome";
                $result = $mysqli->query($sql);

                    while($row = $result->fetch_assoc()) {
                        $row['email']; 
                        echo "<input type='checkbox' name='email' value=" ?> <?php echo $row["email"] ?> <?php echo "class='bt_email'/>"; }?>

                <p class="text_seletor01">Selecione o cliente/dono:</p>
                <select name="dono" class="seletor01">
                    <option>Selecione</option>
                    <?php
                    $mysqli = query_db();

                    $sql = "SELECT cpf,nome FROM plogin order by nome";
                    $result = $mysqli->query($sql);

                        while($row = $result->fetch_assoc()) { 
                            $row['cpf'];
                            $row['nome'];?>
                            <option value="<?php echo $row['cpf']; ?>"><?php echo $row['nome'] ?></option>
                        <?php
                    }
                    ?>
                </select>

                <button type="submit" class="botao_register">Enviar Dados</button>
                <p><button class="botao_pularss" onclick="window.location.href='info_users.php'">Pular sessão</button></p>
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
    <script>
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "functions/funcoes.php", true);
            xhr.send();
            window.location = "index.php";
        }
    </script>
</html>