<?php

// Inicia ou recupera a sessão atual.
session_start();

// Verifica se o usuário está salvo na sessão.
if (!isset($_SESSION["usuario"])) {

    // Caso não esteja autenticado,
    // redireciona para a página de login.
    header("Location: login.php");

    // Interrompe a execução do arquivo protegido.
    exit;
}
