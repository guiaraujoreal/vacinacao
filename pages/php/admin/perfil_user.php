<?php
include('../functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:home_admin.php");
        exit();
	}

$mysqli = query_db();

$id_user = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$nome = $_POST['nome'];
$status = $_POST['status'];
$telefone = $_POST['telefone'];
$posicao = $_POST['posicao'];
$data_insc = $_POST['data'];
$senha = $_POST['senha'];

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
                <div class="col_text_top col-2 d-flex align-items-center">
                    <form action="../functions/excluir_dados_perfil_user.php" method="post">
                        <input type="hidden" value="<?php echo $id_user ?>" name="id">
                        <button class="btn btn-danger">Excluir Usuário</button>
                    </form>
                </div>
            </div>
        </section>

        <section id="section02" class="container-fluid">
            <div class="row">
                <div class="col">
                <form action="../functions/alterar_dados_perfil_user.php" method="post" class="form-box" id="form_user">
                    <div class="container_text container-fluid">
                        <label class="title-form">Usuário</label>
                        <input type="hidden" value="<?php echo $id_user ?>" name="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome:</label>
                        <input type="text" class="form-control" value="<?php echo $nome ?>" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">CPF:</label>
                        <input type="text" class="form-control" value="<?php echo $cpf ?>" name="cpf">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email:</label>
                        <input type="text" class="form-control"  value="<?php echo $email ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefone:</label>
                        <input type="text" class="form-control" value="<?php echo $telefone ?>" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status:</label>
                        <select class="form-control" name="status">
                            <?php
                            if($status==0){
                                echo '<option value="0" >Inativo</option>
                                <option value="1" >Ativo</option>';
                            }
                            else{
                                echo '<option value="1" >Ativo</option>
                                <option value="0" >Inativo</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Posição:</label>
                        <select type="text" class="form-control" id="exampleInputPassword1" name="posicao">
                        <?php
                            if($posicao==0){
                                echo '<option value="0" >Administrador</option>
                                <option value="1" >Cliente</option>';
                            }
                            else{
                                echo '<option value="1" >Cliente</option>
                                <option value="0" >Administrador</option>';
                            }
                        ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Senha:</label>
                        <input type="text" class="form-control" value="<?php echo $senha ?>" name="senha">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Data/Hora de registro:</label>

                        <?php
                        $timestamp = $data_insc;
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
                        if ($dt !== false) {
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                            $data_format = strftime('%d de %B de %Y', $dt->getTimestamp());
                            $hora_format = $dt->format('H:i:s');
                        }
                        
                        ?>
                        <input type="text" class="form-control" value="<?php echo $data_format ?> às <?php echo $hora_format ?>" name="reg" readonly>
                    </div> 
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" id="salvar_alt" class="btn btn-success" data-toggle="modal" data-target="#modalExemplo">Salvar Alterações</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        
    </main>

    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    
</html>