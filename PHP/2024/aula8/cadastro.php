<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "meu_banco");
if ($conn->connect_error) die("Conexão falhou: " . $conn->connect_error);

// Cadastrar usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES 
            ('{$_POST['nome']}', '{$_POST['email']}', '{$_POST['senha']}')";

    echo $conn->query($sql) ? 
         "Usuário cadastrado com sucesso! <a href='index.php'>Voltar</a>" : 
         "Erro: " . $conn->error;
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Senha: <input type="password" name="senha" required></label><br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="index.php">Voltar para a lista de usuários</a>
</body>
</html>
