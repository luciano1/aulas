<?php

// Recupera a sessão atual.
session_start();

// Remove todos os dados salvos na sessão.
session_destroy();

// Volta para a tela de login.
header("Location: login.php");
exit;
