<!---

Este código cria uma tabela chamada "clientes" com os campos "id", "cpf","nome", "email", "telefone", 
"endereco", "cidade", "estado" e "cep". O campo "id" é uma chave primária auto-incrementável, 
o que significa que ele será preenchido automaticamente pelo banco de dados 
ao inserir um novo registro e garante que cada registro tenha um identificador único.

CREATE TABLE clientes (
    id INT(11) NOT NULL AUTO_INCREMENT,
	cpf VARCHAR(11) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

-->


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Clientes - Loja de Produtos para Pets</title>
</head>
<body>

	<h1>Cadastro de Clientes</h1>

	<form action='cadastra.php'>
		<label for="nome">Nome completo:</label><br>
		<input type="text" id="nome" name="nome" required><br>
		
		<label for="nome">Cpf:</label><br>
		<input type="text" id="cpf" name="cpf" required><br>

		<label for="email">E-mail:</label><br>
		<input type="email" id="email" name="email" required><br>

		<label for="telefone">Telefone:</label><br>
		<input type="tel" id="telefone" name="telefone" required><br>

		<label for="endereco">Endereço:</label><br>
		<input type="text" id="endereco" name="endereco" required><br>

		<label for="cidade">Cidade:</label><br>
		<input type="text" id="cidade" name="cidade" required><br>

		<label for="estado">Estado:</label><br>
		<select id="estado" name="estado" required>
			<option value="">Selecione um estado</option>
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espírito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MT">Mato Grosso</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraíba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondônia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantins</option>
		</select><br>

		<label for="cep">CEP:</label><br>
		<input type="text" id="cep" name="cep" required><br>

		<label for="senha">Senha:</label><br>
		<input type="password" id="senha" name="senha" required><br>

		<label for="confirma_senha">Confirme a senha:</label><br>
		<input type="password" id="confirma_senha" name="confirma_senha" required><br>

		<input type="submit" value="Cadastrar">
	</form>
<!--
Baseado no formulário acima voce deverá criar um arquivo chamado cadastra.php
Para inserir os dados no banco de dados, é necessário criar uma conexão com o banco de dados e executar uma 
query SQL para inserir os dados na tabela "clientes". 
Veja abaixo um exemplo de como fazer isso:

// faz a conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// obtém os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$senha = $_POST['senha'];

// faz a query para inserir os dados na tabela
$sql = "INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado, cep, senha) VALUES ('$nome', '$email', '$telefone', '$endereco', '$cidade', '$estado', '$cep', '$senha')";

// executa a query e verifica se ocorreu algum erro
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// fecha a conexão com o banco de dados
$conn->close();
-->

	<h1>Listagem de Clientes</h1>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Cpf</th>
				<th>E-mail</th>
				<th>Telefone</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>Estado</th>
				<th>CEP</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Conexão com o banco de dados
				//$conexao = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");
				$conexao = mysqli_connect("localhost", "root", "190538", "academia");

				// Verifica se a conexão foi bem sucedida
				if (mysqli_connect_errno()) {
					echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
				}

				// Query para buscar todos os clientes
				$sql = "SELECT * FROM clientes";

				// Executa a query
				$resultado = mysqli_query($conexao, $sql);

				// Loop pelos resultados da query
				while ($cliente = mysqli_fetch_assoc($resultado)) {
					echo "<tr>";
					echo "<td>" . $cliente['id'] . "</td>";
					echo "<td>" . $cliente['nome'] . "</td>";
					echo "<td>" . $cliente['cpf'] . "</td>";
					echo "<td>" . $cliente['email'] . "</td>";
					echo "<td>" . $cliente['telefone'] . "</td>";
					echo "<td>" . $cliente['endereco'] . "</td>";
					echo "<td>" . $cliente['cidade'] . "</td>";
					echo "<td>" . $cliente['estado'] . "</td>";
					echo "<td>" . $cliente['cep'] . "</td>";
					echo "<td>";
					echo "<form method='POST' action='excluir_cliente.php'>";
					echo "<input type='hidden' name='id' value='" . $cliente['id'] . "'>";
					echo "<button type='submit'>Excluir</button>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}

				// Fecha a conexão com o banco de dados
				mysqli_close($conexao);
			?>
<!--
Em relação ao codigo acima quando for clicado no botão excluir deverá ser chamado o arquivo 
excluir_cliente.php Este arquivo deverá conter o código abaixo:
ódigo primeiro se conecta ao banco de dados, em seguida, recupera o ID do cliente do formulário 
POST enviado pela página anterior e, em seguida, executa uma consulta SQL DELETE para excluir o 
registro correspondente do banco de dados. Ele também exibe uma mensagem de sucesso ou erro, 
dependendo do resultado da consulta. Certifique-se de substituir "seu_username", "sua_senha" e "seu_banco_de_dados" 
pelas suas próprias informações de login e banco de dados.

//Conectar ao banco de dados
$servername = "localhost";
$username = "seu_username";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

//Cria a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Checa a conexão
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}

//Recupera o ID do cliente
$id = $_POST['id'];

//Exclui o registro do cliente do banco de dados
$sql = "DELETE FROM clientes WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Registro excluído com sucesso";
} else {
  echo "Erro ao excluir registro: " . mysqli_error($conn);
}

mysqli_close($conn);
-->
		</tbody>
	</table>

</body>
</html>

