<?php
include('../functions/funcoes.php');
	if (esta_logado()==1) {
		header("location:home_admin.php");
        exit();
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../styles/historico_vacinas_pet.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Histórico de Vacinas</title>
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
                    <p class="text_top "><b>Histórico de vacinas de</b></p>
                </div>
                </div>
                
        </section>

        <section id="section02" class="d-flex justify-content-center">
            <div class="box container-fluid">
                <div class="row col-row ">
                    <div class="hist col col-1">
                        <img class="icon_hst" src="../../../icons/history_google.png">
                    </div>
                    <div class="hist col d-flex justify-content-start">
                        <p class="text_hist d-flex align-content-center">Teste</p>
                    </div>
                        
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>