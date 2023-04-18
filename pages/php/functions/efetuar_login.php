<?php
session_start();

//valida se a pagina anterior enviou alguma informação com o methodo post
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$senha1 = $_POST["senha"];
	$cpf =	$_POST["cpf"];

// com a função	include_once(), o conteudo da pagina é carregado
include_once('funcoes.php');
$mysqli = query_db();	

// criamos o select usando as variaveis carregadas anteriormente	
$sql = "select * from plogin where senha1 ='" .$senha1. "'
	and cpf ='" .$cpf. "' and ativo = 1";
	
//executa a query contida na variavel $sql e armazena o resultado na variavel
//$consulta

$consulta = $mysqli->query($sql);
	
	if ($consulta->num_rows > 0) {
		while ($user = $consulta->fetch_assoc()) {
			$_SESSION['user']=$user['nome'];
			$_SESSION['id']=$user['id'];
		}
			$cat = categoria_user();
			if($cat==0){
				header("location:../home_admin.php");
			}
			else{
				echo "Ainda não há um página para clientes";
			}
						
		} 
	else {
			header("location:../index.php?login=incorreto");
		}

}
?>
	
	