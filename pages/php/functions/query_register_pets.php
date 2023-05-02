<?php
//inclui todas as funcoes da pagina funcoes.php
include_once('funcoes.php');
//instancia a variavel $mysqli para a funcao query_db que conecta o banco de dados
$mysqli = query_db();

//atribui os valores recebidos da outra pagina a variaveis
$cpf = $_POST['cpf_dono'];
$nome = $_POST['nome'];
$raca = $_POST['raca'];
$tipagem = $_POST['tipagem'];
$ano = $_POST['idade'];
$genero = $_POST['genero'];
$id = $_POST['id_do_dono'];
$ret_email = '1';
//registra o novo animal no banco
$sql = 'INSERT INTO pets (cpf_dono,id_dono,nome,raca,tipagem,ano_nasc,genero) values (?,?,?,?,?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sisssis",$cpf, $id, $nome, $raca, $tipagem, $ano, $genero);

if($stmt->execute()){
    //se a acao executar, recuperará o email do dono no banco para a próxima página
    $sql2 = "SELECT email FROM plogin WHERE id= $id";
    $query = $mysqli->query($sql2);
    while ($dados = mysqli_fetch_assoc($query)){
        $email_dono = $dados['email'];
    }
    header('location:send_email_page.php?ret_email=' .urldecode($ret_email) . '&email=' .urldecode($email_dono) . '&nome_pet=' .urldecode($nome));
}

?>