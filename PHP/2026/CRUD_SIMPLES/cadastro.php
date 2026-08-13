<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "meu_banco"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuarios
            (nome, email, senha)
            VALUES
            ('$nome', '$email', '$senha')";

    $conn->query($sql);

    header("Location: index.php");
    exit;
}

?>

<h2>Cadastrar usuário</h2>

<form method="POST">

    Nome:
    <input
        type="text"
        name="nome"
    >

    <br><br>

    Email:
    <input
        type="email"
        name="email"
    >

    <br><br>

    Senha:
    <input
        type="password"
        name="senha"
    >

    <br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>