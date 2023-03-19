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
};

function query_db(){
	$usuario = 'noite01';
	$password = 'Noite123456';
	$banco = 'academia';
	$hostname = '127.0.0.1';

	$mysqli = new mysqli($hostname,$usuario,$password,$banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	return $mysqli;
}
	
	
