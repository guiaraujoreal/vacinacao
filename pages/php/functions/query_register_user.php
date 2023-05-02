<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha1 = $_POST['senha'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$ativo = $_POST['seletor01'];
$e_cliente = $_POST['seletor02'];
$confirmsenha = $_POST['confirmsenha'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

//verifica se a senha digitada coincide com a confirmacao
if($senha1 != $confirmsenha){
	//em caso negativo
	echo "As senhas não correspondem";
}
//em caso positivo, cadastra o novo usuario no banco
else{
	$sql = 'INSERT INTO plogin (cpf,nome,senha1,telefone,email,rua,bairro,cidades,estado,ativo,e_cliente) values (?,?,?,?,?,?,?,?,?,?,?)';
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("sssssssssii",$cpf, $nome, $senha1,$telefone,$email,$rua,$bairro,$cidade,$estado,$ativo,$e_cliente);

	// s: para 'string'
	// i: para 'inteiro'
	// d: para 'double'
	// b: para 'blob'

if($stmt->execute()){
	header('location:../admin/home_admin.php');
}
}
?>