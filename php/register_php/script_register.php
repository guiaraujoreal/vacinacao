<?php


// Dados do servidor 
$usuario = 'noite01';
$password = 'Noite123456';
$banco = 'academia';
$hostname = '127.0.0.1';

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// tenta conectar na base de dados
$mysqli = new mysqli($hostname,$usuario,$password,$banco);
//caso não funcione exibe a mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$sql = 'INSERT INTO plogin (cpf,nome,senha,telefone,email,status_user,e_cliente) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssii",$cpf, $nome, $senha,$telefone,$email,$status_user,$e_cliente);

// s: para 'string'
// i: para 'inteiro'
// d: para 'double'
// b: para 'blob'

$stmt->execute();
 

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/script_register.css" media="screen" />
        <title>
            VacinaCão - Solicitação encaminhada
        </title>
        <link rel="icon" type="image/png" href="style/icons/logo.png"/>
    </head>
    <body>
        <div id="cabecalho_register">
                <img src="style/icons/logo.png" class="logotipo"></div>
                <img src="style/icons/text_logo.png" class="texto_logo"></div>
    </body>
</html>