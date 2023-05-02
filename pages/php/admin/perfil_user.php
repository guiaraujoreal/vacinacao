<?php
//verificar se o usuário está logado
include('../functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:home_admin.php");
        exit();
	}

//importar a funcao query_db que possui a conexao do banco de dados
$mysqli = query_db();

//instanciar as variaveis necessárias para essa página vindas de outra
$id_user = $_POST['id'];
$id_user_sessao = $_POST['id_user_sessao'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$nome = $_POST['nome'];
$status = $_POST['status'];
$telefone = $_POST['telefone'];
$posicao = $_POST['posicao'];
$data_insc = $_POST['data'];
$senha = $_POST['senha'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
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
        <!--seção do menu atual correspondente a página, além de excluir o usuario e retornar a página atual -->
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <a href="home_admin.php"> <img src="../../../icons/arrow_back-google.png"></a>
                </div>
                <div class="col_text_top col">
                    <p class="text_top "><b> Informações deste usuário </b></p>
                </div>
                <div class="col_text_top col-2 d-flex align-items-center">
                    <!--Condição para desabilitar botao se o usuario a ser editado no momento for o mesmo em sessão no site-->
                   <?php 
                   if($id_user==$id_user_sessao){
                    
                   echo ' 
                            <form action="../functions/excluir_dados_perfil_user.php" method="post">
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Não é possivel excluir seu perfil com você logado">
                                <input type="hidden" value="'. $id_user .'" name="id">
                                    <button class="btn btn-danger" style="pointer-events: none;" disabled>Excluir Usuário</button>
                            </span>
                            </form>';
                    
                   }
                   else{
                    echo '<form action="../functions/excluir_dados_perfil_user.php" method="post">
                        <input type="hidden" value="'. $id_user .'" name="id">
                        <button class="btn btn-danger">Excluir Usuário</button>
                    </form>';
                   }
                   ?>
                    
                </div>
            </div>
        </section>
        <!--formulário responsável por mostrar e atualizar dados no banco-->
        <section id="section02" class="container-fluid">
            <div class="row">
                <div class="col">
                <form action="../functions/alterar_dados_perfil_user.php" method="post" class="form-box" id="form_user">
                    <div class="container_text container-fluid">
                        <label class="title-form">Usuário</label>
                        <input type="hidden" value="<?php echo $id_user ?>" name="id">
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o nome do usuario-->
                        <label for="exampleInputEmail1">Nome:</label>
                        <input type="text" class="form-control" value="<?php echo $nome ?>" name="nome" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o cpf do usuario, sem a possivel alteracao-->
                        <label for="exampleInputEmail1">CPF:</label>
                        <input type="text" class="form-control" value="<?php echo $cpf ?>" name="cpf" minlength="11" maxlength="11" readonly>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o email do usuario-->
                        <label for="exampleInputPassword1">Email:</label>
                        <input type="text" class="form-control"  value="<?php echo $email ?>" name="email" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o telefone do usuario-->
                        <label for="exampleInputPassword1">Telefone:</label>
                        <input type="text" class="form-control" value="<?php echo $telefone ?>" name="telefone" minlength="10" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar a rua do usuario-->
                        <label for="exampleInputPassword1">Rua/N°:</label>
                        <input type="text" class="form-control" value="<?php echo $rua ?>" name="rua" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o bairro do usuario-->
                        <label for="exampleInputPassword1">Bairro:</label>
                        <input type="text" class="form-control" value="<?php echo $bairro ?>" name="bairro" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar a cidade do usuario-->
                        <label for="exampleInputPassword1">Cidade:</label>
                        <input type="text" class="form-control" value="<?php echo $cidade ?>" name="cidade" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o estado do usuario-->
                        <label for="exampleInputPassword1">Estado:</label>
                        <select type="text" class="form-control" name="estado" required>
                        <?php
                            //obtendo a tipagem/especie de acordo com os dados do banco, colocando em ordem crescente, porém com o valor já registrado como primeiro/prioridade
                            $sql = "SELECT * FROM estado ORDER BY FIELD(nome,'". $estado ."')DESC, nome ASC";
                                $query = $mysqli->query($sql);
                                //instacia a variavel $categoria para determinar o estado de acordo com o valor retornado do banco
                                while ($row = mysqli_fetch_assoc($query)){
                                    echo '<option value="' . $row['nome'] . '">' . $row["nome"] . '</option>';
                                }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar se o usuario e ativo ou nao do usuario-->
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
                        <!-- Mostrar se o usuario e cliente ou admin-->
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
                        <!-- Mostrar e/ou alterar senha-->
                        <label for="exampleInputEmail1">Senha:</label>
                        <input type="text" class="form-control" value="<?php echo $senha ?>" name="senha" minlength="3" maxlength="8">
                    </div>
                    <div class="form-group">
                        <!--Data e hora em que o usuario foi registrado-->
                        <label for="exampleInputPassword1">Data/Hora de registro:</label>

                        <?php
                        //formatando a data e hora do banco para o formato brasileiro
                        $timestamp = $data_insc;
                        $dt = new DateTime($timestamp);
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                        $data_format = $dt->format('d \d\e F \d\e Y');
                        $hora_format = $dt->format('H:i:s');
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

    <!--incluir rodape-->
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    
</html>