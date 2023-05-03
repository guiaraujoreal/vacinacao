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
        <link rel="stylesheet" type="text/css" href="../../../styles/register_doses_vacina.css" media="screen" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>
            Vamos vacinar!
        </title>
        <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
    </head>
    <bory>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>
        <!-- Formulário para registrar as doses de vacinacao no banco-->
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col">
                    <div id="form_register" class="animate__animated animate__bounceInLeft">
                        <form action="../functions/query_register_doses.php" method="post">

                            <p class="titulo_register"><b>Vacinar Animal</b></p>

                            <p class="text_animal">Animal selecionado:</p>
                            <?php
                            $mysqli = query_db();

                            // Obtém o nome do animal selecionado
                            $nome_pet = $_POST['nome_pet'];
                            $id_pet = $_POST['id_pet'];
                            ?> 
                            <input type="text" name="pet" class="box_animal" value="<?php echo $nome_pet ?>" readonly>
                            <input type="hidden" name="id_pet"  value="<?php echo $id_pet ?>" readonly>

                            <p class="text_vacina">Vacina a tomar:</p>
                            <select name="vacina" class="box_vacina"  required>
                                <?php
                                // Conecta ao banco de dados
                                $mysqli = query_db();

                                $sql2 = "SELECT * FROM vacina_reg WHERE quantidade > 0 order by nome_vacina";
                                $result = $mysqli->query($sql2);

                                    while($row = $result->fetch_assoc()) {
                                        $id_vacina = $row['id']; 
                                        $nome_vac = $row['nome_vacina'];
                                        $lote = $row['lote'];
                                        echo "<option value='" . $id_vacina . "'>". $nome_vac .   "-lote[" . $lote . "]</option>";
                                }
                                ?>
                            </select>
                            <!--variavel para armazenar o estoque-->
                            <input type="hidden" value="<?php echo $estoque ?>" name="estoque">
                            <p class="text_dose">Dose:</p> 
                            <select name="dose" class="box_dose" required>
                                <option value="1">1ª Dose</option>
                                <option value="2">2ª Dose</option>
                                <option value="3">Reforço</option>
                                <option value="4">Dose Única</option>
                            </select>

                            <!--botoes de acao do formulario-->
                            <p><button type="submit" class="botao_register" onclick="window.location.href='../functions/send_email_page.php'">Enviar Dados</button></p>
                            <p><button class="botao_pularss" onclick="window.location.href='home_admin.php'">Ir para Home</button></p>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div id="comentarios"><h1 id="coment01" class="animate__animated animate__bounceInRight"><b>Hora de vacinar!</b></h1> </div>

                    <!--animacao da pagina-->
                    <div id="animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_gsmgfd2i.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>

    <!--importar scripts de bibliotecas da pagina-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </bory>
    

</html>