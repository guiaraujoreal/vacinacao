<?php
include('../functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:home_admin.php");
        exit();
	}

$mysqli = query_db();

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$nome = $_POST['nome'];
$status = $_POST['status'];
$telefone = $_POST['telefone'];

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../styles/perfil_user.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Perfil do Usuário</title>
    <link rel="icon" type="image/png" href="../../../icons/logo.png"/>
</head>
<body>
    <header>
        <?php include('../includes/cabecalho.php') ?>
    </header>

    <main>
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <a href="home_admin.php"> <img src="../../../icons/arrow_back-google.png"></a>
                </div>
                <div class="col_text_top col">
                    <p class="text_top "><b> Informações deste usuário </b></p>
                </div>
            </div>
        </section>

        <section id="section02" class="container-fluid">
            <div class="row">
                <div class="col">
                <form class="form-box">
                    <div class="container_text container-fluid">
                        <label class="title-form">Usuário</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome:</label>
                        <input type="text" class="form-control" value="<?php echo $nome ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email:</label>
                        <input type="text" class="form-control"  value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefone:</label>
                        <input type="text" class="form-control" value="<?php echo $telefone ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Posição:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    
</body>
</html>