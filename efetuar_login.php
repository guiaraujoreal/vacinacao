<?php 
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$senha1 = $_POST["senha"];
	$cpf =	$_POST["cpf"];
	
	include_once('config.php');	
	
	$sql = "select * from plogin where senha ='" .$senha1. "'
	and cpf ='" .$cpf. "' and ativo = 1";
	
	$consulta = $mysqli->query($sql);
	
	if ($consulta->num_rows > 0) {
		echo "Parabens você esta cadastrado e tem acesso";
		$_SESSION['user']=$consulta['nome'];
		
	} else {
		echo "Por favor faça o seu cadastro<br>";
	}
}
?>
	
	