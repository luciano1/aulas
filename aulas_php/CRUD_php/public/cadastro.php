<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="../actions/cadastrar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="index.php">Voltar para a lista de usuários</a>
</body>
</html>