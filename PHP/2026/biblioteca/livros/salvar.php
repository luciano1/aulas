<?php

// Protege a página e carrega conexão e funções de validação.
require_once "../includes/proteger.php";
require_once "../config/conexao.php";
require_once "../includes/funcoes.php";

// O cadastro só será executado por envio de formulário.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os campos enviados pelo formulário.
    $titulo = trim($_POST["campo-titulo"] ?? "");
    $autor = trim($_POST["campo-autor"] ?? "");
    $ano = $_POST["campo-ano"] ?? "";
    $quantidade = $_POST["campo-quantidade"] ?? "";
    $categoria = $_POST["campo-categoria"] ?? "";

    // Valida antes de enviar os dados ao banco.
    if (validarLivro(
        $titulo,
        $autor,
        $quantidade,
        $ano,
        $categoria
    )) {

        // Prepara o SQL de cadastro com parâmetros.
        $sql = "INSERT INTO livros
                (titulo, autor, quantidade, ano, categoria)
                VALUES
                (:titulo, :autor, :quantidade, :ano, :categoria)";

        $comando = $pdo->prepare($sql);

        // Executa o cadastro usando os valores recebidos.
        $comando->execute([
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

<a href="cadastrar.php">Cadastrar outro livro</a>

<br><br>

<a href="listar.php">Ver livros cadastrados</a>

<br><br>

<a href="../home.php">Voltar para o início</a>
