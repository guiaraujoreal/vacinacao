<?php

$site = "VacincaCão";
$versao = "1.0";

$usuario = 'noite01';
$password = 'Noite123456';
$banco = 'academia';
$hostname = '127.0.0.1';

$mysqli = new mysqli($hostname,$usuario,$password,$banco);
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>