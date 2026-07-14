<?php

function validarTitulo($titulo)
{
    if (empty($titulo)) {
        return false;
    }

    return true;
}

function validarAutor($autor)
{
    return !empty($autor);
}

function validarAno($ano)
{
    if ($ano > date("Y")) {
        return false;
    }

    return true;
}

function validarQuantidade($quantidade)
{
    if ($quantidade < 0) {
        return false;
    }

    return true;
}

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
