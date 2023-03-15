<?php

include_once('config.php');

//inicia a sessão
session_start();

//verifica se a variavel de sessao do usuario esta definida
if(isset($_SESSION['user'])) {
    echo "Parabens vcoe esta logado";
}else {
    header("location: home.php");

    exit();
}
?>