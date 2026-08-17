<?php

// Dados usados para acessar o banco de dados local.
$host = "localhost";
$banco = "biblioteca";
$usuario = "root";
$senha = "123456";

try {

    // Cria a conexão com o MySQL usando PDO.
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    // Faz o PDO lançar erro quando algum comando SQL falhar.
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $erro) {

    // Interrompe a página caso a conexão não funcione.
    die("Erro ao conectar com o banco.");
}
