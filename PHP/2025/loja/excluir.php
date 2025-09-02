<?php
require "db.php";
$id = $_GET['id'];
$pdo->prepare("DELETE FROM produtos WHERE id = ?")->execute([$id]);
header("Location: listar.php");

?>