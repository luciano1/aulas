<?php

// Protege o arquivo contra usuários não autenticados.
require_once "../includes/proteger.php";

/*
    Para apagar um cookie, usamos o mesmo nome
    e definimos uma data de expiração no passado.

    time() - 3600 significa uma hora atrás.
*/
setcookie(
    "categoria_favorita",
    "",
    time() - 3600
);

// Depois de apagar o cookie,
// redireciona para a página inicial.
header("Location: ../home.php");

exit;
