<?php
require_once "proteger.php";
require_once "conexao.php";
include "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["campo-titulo"];
    $autor = $_POST["campo-autor"];
    $ano = $_POST["campo-ano"];
    $quantidade = $_POST["campo-quantidade"];
    $categoria = $_POST["campo-categoria"];

    if (validarLivro(
        $titulo,
        $autor,
        $quantidade,
        $ano,
        $categoria
    )) {
        $stmt = $pdo->prepare(
            "INSERT INTO livros (titulo, autor, quantidade, ano, categoria)
             VALUES (:titulo, :autor, :quantidade, :ano, :categoria)"
        );

        $stmt->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":quantidade" => $quantidade,
            ":ano" => $ano,
            ":categoria" => $categoria
        ]);

        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Livro inválido.";
    }
}
?>

<br><br>

<a href="index.php">Voltar</a>
