<?php

//funcao para verificar se está logado
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

//funcao para conectar ao banco de dados
function query_db(){
	$usuario = 'noite01';
	$password = 'Noite123456';
	$banco = 'academia';
	$hostname = '127.0.0.1';

	$mysqli = new mysqli($hostname,$usuario,$password,$banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	return $mysqli;
}

//funcao para realizar logout (desabilitada)
function logout(){
   session_start();
   session_destroy();
   exit();

}

//funcao para mostrar apenas o primeiro nome do usuario na saudacao no canto direito do cabecalho
function user_cabec(){
	$mysqli = query_db();
	$id_user = $_SESSION['id'];
	$sql = "SELECT nome FROM plogin WHERE id = $id_user";
	$query = $mysqli->query($sql);
    	while ($dados = mysqli_fetch_assoc($query)){
			$user = $dados['nome'];
		}
	
    $primeiro_nome = explode(' ', $user);
    //user_fname equilave a "user first name" - primeiro nome do usuário
    $user_fname = $primeiro_nome[0];
    $_SESSION['user_fname'] = $user_fname;
    echo "Olá " . $_SESSION['user_fname'] . "!";
}

//funcao para definir a posicao/categoria do usuario no canto direito do cabecalho
function categoria_user(){
	esta_logado();
	$mysqli = query_db();
	$cpf_user = $_SESSION['cpf'];
    $sql = "SELECT e_cliente FROM plogin WHERE cpf= '".$cpf_user."'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        $cat_user = $row['e_cliente'];
        }
	return $cat_user;
}

//funcao qu retorna o email do usuario
function send_email(){
	esta_logado();
	$mysqli = query_db();
	$user = $_SESSION['user'];
    $sql = "SELECT email FROM plogin WHERE nome= '".$user."'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
        $email = $row['email'];
        }
	return $email;
}

//funcao de atributo do email do usuário
function atributte_value_emailUser(){
	$id = 0;
	return $id;
}

//funcao que atribui o id do usuario logado
function id_atribute(){
	esta_logado();
	$mysqli = query_db();
	$cpf_user = $_SESSION['cpf'];
    $sql = "SELECT id FROM plogin WHERE cpf= '".$cpf_user."'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        }
	return $id;
}

?>

	
	
