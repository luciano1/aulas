<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../public/index.php");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}
?>