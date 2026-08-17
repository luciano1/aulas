<?php

// Protege a página e abre conexão com o banco.
require_once "../includes/proteger.php";
require_once "../config/conexao.php";

// A exclusão só será executada por POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe o ID enviado pela confirmação.
    $id = $_POST["id"] ?? "";

    if (is_numeric($id)) {

        // Remove o livro que possui o ID recebido.
        $sql = "DELETE FROM livros WHERE id = :id";
        $comando = $pdo->prepare($sql);
        $comando->execute([":id" => $id]);
    }
}

// Depois de excluir, volta para a listagem.
header("Location: listar.php");
exit;
