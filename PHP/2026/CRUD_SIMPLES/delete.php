<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "meu_banco"
);

$id = $_GET["id"];

$sql = "DELETE FROM usuarios
        WHERE id = $id";

$conn->query($sql);

header("Location: index.php");

exit;