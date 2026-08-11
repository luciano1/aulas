<?php

// Impede o acesso de usuários que não fizeram login.
require_once "proteger.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Revista</title>
</head>

<body>

    <h2>Cadastrar Nova Revista</h2>

    <!--
        O formulário envia os dados para salvar_revista.php.
        O método POST envia os valores sem mostrá-los na URL.
    -->
    <form action="salvar_revista.php" method="POST">

        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required>

        <br><br>

        <label for="editora">Editora:</label><br>
        <input type="text" id="editora" name="editora" required>

        <br><br>

        <label for="ano">Ano:</label><br>
        <input type="number" id="ano" name="ano" required>

        <br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input
            type="number"
            id="quantidade"
            name="quantidade"
            value="0"
            min="0"
            required
        >

        <br><br>

        <button type="submit">Cadastrar Revista</button>

    </form>

    <br>

    <a href="home.php">Voltar</a>

</body>

</html>
