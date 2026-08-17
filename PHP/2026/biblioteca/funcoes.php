<?php

// Valida se o título foi preenchido.
function validarTitulo($titulo)
{
    if (empty(trim($titulo))) {
        return false;
    }

    return true;
}

// Valida se o autor foi preenchido.
function validarAutor($autor)
{
    return !empty(trim($autor));
}

// Valida se o ano é numérico e não está no futuro.
function validarAno($ano)
{
    if (!is_numeric($ano)) {
        return false;
    }

    if ($ano > date("Y")) {
        return false;
    }

    if ($ano < 1) {
        return false;
    }

    return true;
}

// Valida se a quantidade é numérica e não é negativa.
function validarQuantidade($quantidade)
{
    if (!is_numeric($quantidade)) {
        return false;
    }

    if ($quantidade < 0) {
        return false;
    }

    return true;
}

// Valida se a categoria faz parte das opções do sistema.
function validarCategoria($categoria)
{
    $categorias = [
        "Tecnologia",
        "História",
        "Romance",
        "Didático"
    ];

    return in_array($categoria, $categorias);
}

// Junta todas as validações necessárias para cadastrar ou editar livro.
function validarLivro(
    $titulo,
    $autor,
    $quantidade,
    $ano,
    $categoria
) {
    return
        validarAno($ano) &&
        validarAutor($autor) &&
        validarCategoria($categoria) &&
        validarTitulo($titulo) &&
        validarQuantidade($quantidade);
}

// Valida se a editora da revista foi preenchida.
function validarEditora($editora)
{
    return !empty(trim($editora));
}

// Junta todas as validações necessárias para cadastrar ou editar revista.
function validarRevista($titulo, $editora, $ano, $quantidade)
{
    return
        validarTitulo($titulo) &&
        validarEditora($editora) &&
        validarAno($ano) &&
        validarQuantidade($quantidade);
}
