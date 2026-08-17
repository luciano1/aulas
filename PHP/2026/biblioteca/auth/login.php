<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Sistema de Biblioteca</h1>
    <h2>Login</h2>

    <!-- Envia usuário e senha para validação no backend. -->
    <form action="validar_login.php" method="POST">
        <label for="usuario">Usuário:</label><br>
        <input type="text" id="usuario" name="usuario" required>

        <br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required>

        <br><br>

        <button type="submit">Entrar</button>
    </form>
</body>

</html>
