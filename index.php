<?php
include_once('config.php');


//inicia  a sessão
session_start();

//verifica se a variavel de sessão do usuario esta definida
if(isset($_SESSION['user'])) {
		// O usuario esta logado
		echo "Parabens voce esta logado";
	 
} else {
	// o usuario nao esta logado
		header("location:form_login.php"); // redireciona para o formulário de login
		exit(); // interrompe o codigo apos o redirecionamento
}
	



?>
	

	








	