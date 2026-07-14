<?php

include "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $titulo = $_GET["campo-titulo"];
    $autor = $_GET["campo-autor"];
    $ano = $_GET["campo-ano"];
    $quantidade = $_GET["campo-quantidade"];
    $categoria = $_GET["campo-categoria"];

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

