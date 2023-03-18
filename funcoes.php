<?php
function esta_logado() {
	if (!isset($_SESSION)) {
		session_start();
		echo "Nao setado";
		return 0;
	} else {
		if(isset($_SESSION['user'])) {
			
		return 1;
		} else {
		echo "Nao setado o user";
			session_start();
			return 0;
		}
	}
}
	
	
