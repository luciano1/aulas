<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="get">
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="text" name="email" placeholder="Email" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
<?php
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];


$sql = "INSERT INTO CLIENTE (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$conn = new mysqli('localhost', 'root', '', 'meu_banco2');

if ($conn->query($sql) === true) {
    echo "Cadastrou";
} else {
    echo "Deu ruim: " . $conn->error;
}
$conn->close();
