<?php
require_once "proteger.php";
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
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Livro inválido.";
    }
}
?>

<br><br>

<a href="index.php">Voltar</a>
