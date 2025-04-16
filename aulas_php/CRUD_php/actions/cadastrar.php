<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../public/index.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>