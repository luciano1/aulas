<?php
require "db.php";

$pdo->prepare("INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)")
    ->execute([$_POST["nome"], $_POST["preco"], $_POST["estoque"]]);

    header("Location: listar.php");
