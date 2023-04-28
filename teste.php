<select name="nomes">
    <?php
    include_once('../functions/funcoes.php');
        // Conexão com o banco de dados
        $mysqli = query_db();

        // Consulta SQL para obter os nomes
        $consulta = "SELECT nome FROM tabela";

        // Executa a consulta e obtém os resultados
        $resultado = mysqli_query($conexao, $consulta);

        // Loop para exibir cada nome como uma opção no elemento select
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $linha['nome'] . "'>" . $linha['nome'] . "</option>";
        }

        // Libera a memória usada pelo resultado da consulta
        mysqli_free_result($resultado);

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
    ?>
</select>
