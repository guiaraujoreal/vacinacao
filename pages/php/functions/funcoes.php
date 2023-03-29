<?php
function esta_logado() {
	if (!isset($_SESSION)) {
		session_start();
		return 0;
	} else {
		if(isset($_SESSION['user'])) {
			
		return 1;
		} else {
			session_start();
			return 0;
		}
	}
}

function query_db(){
	$usuario = 'noite01';
	$password = 'Noite123456';
	$banco = 'academia';
	$hostname = '127.0.0.1';

	$mysqli = new mysqli($hostname,$usuario,$password,$banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	return $mysqli;
}

function logout(){
   session_start();
   session_destroy();
   exit();

}

function user_cabec(){
	$user = $_SESSION['user'];
    $primeiro_nome = explode(' ', $user);
    //user_fname equilave a "user first name" - primeiro nome do usuário
    $user_fname = $primeiro_nome[0];
    $_SESSION['user_fname'] = $user_fname;
    echo "Olá " . $_SESSION['user_fname'] . "!";
}

function categoria_user(){
	esta_logado();
	$mysqli = query_db();
	$user = $_SESSION['user'];
    $sql = "SELECT e_cliente FROM plogin WHERE nome= '".$user."'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        $cat_user = $row['e_cliente'];
        }
	return $cat_user;
}


	
	
