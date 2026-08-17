<?php

// Inicia a sessão para guardar o contador.
session_start();

// Cria o contador se ele ainda não existir.
if (!isset($_SESSION["acessos"])) {
    $_SESSION["acessos"] = 0;
}

// Soma um acesso a cada carregamento.
$_SESSION["acessos"]++;

// Mostra a quantidade atual de acessos.
echo $_SESSION["acessos"];
