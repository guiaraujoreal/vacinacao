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
$id_pet = $_POST['id'];
$nome_pet = $_POST['nome_pet'];
$idade= $_POST['idade'];
$tipagem = $_POST['tipagem'];
$genero = $_POST['genero'];
$nome_dono = $_POST['nome_dono'];
$id_racas = $_POST['raca'];
$data_reg = $_POST['data_reg'];
$ano_nasc = $_POST['ano_nasc'];
$id_dono = $_POST['id_dono'];
$cpf_dono = $_POST['cpf_dono']
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../styles/perfil_pets.css" media="screen" />
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
        <!--seção do menu atual correspondente a página, além de excluir o animal e retornar a página atual -->
        <section id="section01" class="container-fluid">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <form action="painel_pets.php" method="post">
                    <button class="button_return" type="submit"> <img src="../../../icons/arrow_back-google.png"></button>
                    <!-- input do tipo 'hidden' apenas para armazenar e enviar a variáveis para a próxima pagina-->
                        <input type="hidden" value="<?php echo $id_dono ?>" name="id_dono">
                        <input type="hidden" value="<?php echo $nome_dono ?>" name="nome">
                        <input type="hidden" value="<?php echo $cpf_dono ?>" name="cpf">
                    </form>
                </div>
                <div class="col_text_top col">
                    <p class="text_top "><b> Informações deste animal </b></p>
                </div>
                <div class="col_text_top col-2 d-flex align-items-center">
                    <form action="../functions/excluir_dados_perfil_pets.php" method="post">
                        <!-- input do tipo 'hidden' apenas para armazenar e enviar a variável $id_pet-->
                        <input type="hidden" value="<?php echo $id_pet ?>" name="id">
                        <button class="btn btn-danger">Excluir Animal</button>
                    </form>
                </div>
            </div>
        </section>

        <!--formulário responsável por mostrar e atualizar dados no banco-->
        <section id="section02" class="container-fluid">
            <div class="row">
                <div class="col">
                <form action="../functions/alterar_dados_perfil_pets.php" method="post" class="form-box" id="form_user">
                    <div class="container_text container-fluid">
                        <label class="title-form">Animal</label>
                        <input type="hidden" value="<?php echo $id_pet ?>" name="id">
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o nome do animal-->
                        <label for="exampleInputEmail1">Nome do animal:</label>
                        <input type="text" class="form-control" value="<?php echo $nome_pet ?>" name="nome" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o dono do animal-->
                        <label for="exampleInputEmail1">Dono:</label>
                        <input type="text" class="form-control" value="<?php echo $nome_dono ?>" name="nome_dono" readonly>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o genero do animal-->
                        <label for="exampleInputEmail1">Gênero:</label>
                        <select class="form-control" name="genero" required>
                            <?php
                            //mostrando o genero do animal escolhido antes da alteração, como sendo a primeira opção
                            if($genero=='Macho'){
                                echo '<option value="Macho">Macho</option>
                                <option value="Femea">Fêmea</option>
                                <option value="Nao Definido">Não Definido</option>';
                            }
                            elseif($genero=='Femea'){
                                echo '<option value="Femea">Fêmea</option>
                                <option value="Macho">Macho</option>
                                <option value="Nao Definido">Não Definido</option>';
                            }
                            else{
                                echo '<option value="Nao Definido">Não Definido</option>
                                <option value="Femea">Fêmea</option>
                                <option value="Macho">Macho</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tipagem:</label>
                        <select class="form-control" name="tipagem" required>
                            <?php
                            //obtendo a tipagem/especie de acordo com os dados do banco, colocando em ordem crescente, porém com o valor já registrado como primeiro/prioridade
                            $sql = "SELECT * FROM categoria_pet ORDER BY FIELD(id,'". $tipagem ."')DESC, id ASC";
                                $query = $mysqli->query($sql);
                                //instacia a variavel $categoria para determinara raca de acordo com o valor retornado do banco
                                while ($row = mysqli_fetch_assoc($query)){
                                    $categoria = $row["id"];
                                    echo '<option value="' . $categoria . '">' . $row["categoria"] . '</option>';
                                    if($categoria==1){
                                        $raca = 1;
                                    }
                                    elseif($categoria==2){
                                        $raca = 2;
                                    }
                                    elseif($categoria==3){
                                        $raca = 3;
                                    }
                                    elseif($categoria==4){
                                        $raca = 4;
                                    }
                                    else{
                                        $raca = 5;
                                    }
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Mostrar o raca do animal-->
                        <label for="exampleInputPassword1">Raça:</label>
                        <select type="text" class="form-control" id="exampleInputPassword1" name="raca" required>
                        <?php
                            //realizando uma busca no banco para recuperar e correlacionar duas tabelas com informacoes dependentes uma da outra
                            $sql = "SELECT * FROM racas INNER JOIN categoria_pet ON racas.id_categoria = categoria_pet.id ORDER BY FIELD(racas.idracas, '" . $id_racas . "') DESC, racas.idracas ASC";
                            $query = $mysqli->query($sql);
                            while ($row = mysqli_fetch_assoc($query)){
                                $id_raca = $row['idracas'];
                                echo '<option value="' . $id_raca . '">' . $row["racas"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        //instanciando a idade de acordo com a quantidade de anos, adequando a palavra 'ano' a quantidade
                        if($idade==1){
                            $idade_out=$idade . ' ano';
                        }
                        else{
                            $idade_out=$idade . ' anos';
                        } ?>
                        <!-- Mostrar a idade e o ano de nascimento do animal-->
                        <label for="exampleInputPassword1">Ano de nascimento (<?php echo $idade_out ?>):</label>
                        <input type="text" class="form-control" value="<?php echo $ano_nasc ?>" name="ano_nasc" minlength="4" maxlength="4" required>
                    </div> 
                    <div class="form-group">
                        <!-- Mostrar o horário em que o animal foi resgitrado no sistema-->
                        <label for="exampleInputPassword1">Data/Hora de registro:</label>

                        <?php
                        //formatando a data e hora do banco para o formato brasileiro
                        $timestamp = $data_reg;
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

        <!--Mostrar o historico de vacinacao de acordo com o id do animalk-->
        <section id="section03" class="container-fluid">
            <div class="row">
                <div class="col">
                    <form class="form-box" id="form_user">
                    <div class="container_text container-fluid">
                        <label class="title-form">Histórico de Vacinação</label>
                    </div>
                    <?php
                    //buscando o historico de vascinas baseado nos id's em ordem decrescente
                    $sql = "SELECT * FROM historico_vacinas WHERE id_pet = '".$id_pet."' ORDER BY data DESC";
                    $query=$mysqli->query($sql);
                    if($query->num_rows == 0){
                        echo '<p class="text_hist d-flex align-content-center justify-content-center">Nenhum registro</p>';
                    }
                    else{
                        while ($row = mysqli_fetch_assoc($query)){
                            $nome_vac = $row['nome_vacina'];
                            $id_vac = $row['id_vac'];
                            //instanciando as doses ao texto correto
                            $dose = $row['dose'];
                                if($dose==1){
                                    $dose_out='a 1ª dose';
                                }
                                elseif($dose==2){
                                    $dose_out='a 2ª dose';
                                }
                                elseif($dose==3){
                                    $dose_out='o reforço';
                                }
                                else{
                                    $dose_out='a dose única';
                                }

                                //formatando a data e hora para o formato brasileiro
                                $timestamp = $data_reg;
                                $dt = new DateTime($timestamp);
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                                $data_format2 = $dt->format('d \d\e F \d\e Y');
                                $hora_format2 = $dt->format('H:i:s');
                                    
                                    //selecionando as vacinas com base do id
                                $sql2 = "SELECT nome_vacina,lote FROM vacina_reg WHERE id = '".$id_vac."'";
                                $query2 = $mysqli->query($sql2);
                                while ($row2 = mysqli_fetch_assoc($query2)) {
                                    
                                    
                                    echo '<div class="col col_hist  d-flex justify-content-center">
                                        <div class="row col-row">
                                            <div class="hist col col-1">
                                                <img class="icon_hst" src="../../../icons/history_google.png">
                                            </div>
                                            <div class="hist col d-flex justify-content-start">
                                                <p class="text_hist d-flex align-content-center">' .$nome_pet.' tomou '.$dose_out.' da vacina ' . $row2['nome_vacina'] . ' [lote: '.$row2['lote'].']  em '.$data_format2.' às '.$hora_format2.'.</p>
                                            </div>
                                        </div>
                                    </div>';
                                }
                        }
                    }
                    ?>

                    </form>
                </div>
            </div>
        </section>
        
    </main>

    <!--incluindo rodapé-->
    <footer>
        <?php include('../includes/rodape.php') ?>
    </footer>
    
</html>