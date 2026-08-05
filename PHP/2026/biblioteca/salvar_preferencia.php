<?php

// Protege o arquivo contra usuários não autenticados.
require_once "proteger.php";

// Verifica se o arquivo foi acessado
// pelo envio de um formulário usando POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera a categoria enviada pelo formulário.
    //
    // Caso o campo não exista, utiliza uma string vazia.
    $categoria = $_POST["categoria"] ?? "";

    // Lista de categorias aceitas pelo sistema.
    //
    // Mesmo que o formulário tenha um select,
    // o usuário pode alterar a requisição manualmente.
    // Por isso, o backend também deve validar.
    $categoriasPermitidas = [
        "Tecnologia",
        "História",
        "Romance",
        "Didático"
    ];

    // Verifica se a categoria recebida
    // está presente no array de categorias permitidas.
    if (!in_array($categoria, $categoriasPermitidas)) {

        echo "Categoria inválida.";

        // Encerra a execução do arquivo.
        exit;
    }

    /*
        Cria o cookie.

        Primeiro argumento:
        nome do cookie.

        Segundo argumento:
        valor que será armazenado.

        Terceiro argumento:
        data de expiração.

        86400 representa a quantidade de segundos de um dia.

        86400 * 30 representa 30 dias.
    */
    setcookie(
        "categoria_favorita",
        $categoria,
        time() + 86400 * 30
    );

    /*
        Após criar o cookie, redirecionamos o usuário
        novamente para home.php.

        O cookie só estará disponível no array $_COOKIE
        na próxima requisição.
    */
    header("Location: home.php");

    // Encerra a execução depois do redirecionamento.
    exit;
}

// Caso alguém acesse o arquivo diretamente,
// sem enviar um formulário, volta para a página inicial.
header("Location: home.php");

exit;