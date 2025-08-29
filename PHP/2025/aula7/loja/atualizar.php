<?php
require "db.php";

$id      = $_POST['id'];
$nome    = $_POST['nome'];
$preco   = $_POST['preco'];
$estoque = $_POST['estoque'];

$pdo->prepare("UPDATE produtos SET nome = ?, preco = ?, estoque = ? WHERE id = ?")
    ->execute([$nome, $preco, $estoque, $id]);

header("Location: listar.php");