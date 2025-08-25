<?php
require "db.php";

$nome    = $_POST["nome"];
$preco   = $_POST["preco"];
$estoque = $_POST["estoque"];

$stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)");
$stmt->execute([$nome, $preco, $estoque]);

header("Location: listar.php");
