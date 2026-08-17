<?php

// Protege a página e carrega conexão e validações.
require_once "proteger.php";
require_once "conexao.php";
require_once "funcoes.php";

// Atualização só deve acontecer por POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe o ID e os campos enviados pelo formulário.
    $id = $_POST["id"] ?? "";
    $titulo = trim($_POST["campo-titulo"] ?? "");
    $autor = trim($_POST["campo-autor"] ?? "");
    $ano = $_POST["campo-ano"] ?? "";
    $quantidade = $_POST["campo-quantidade"] ?? "";
    $categoria = $_POST["campo-categoria"] ?? "";

    // Verifica se o ID e os campos possuem valores válidos.
    $dadosValidos =
        is_numeric($id) &&
        validarLivro($titulo, $autor, $quantidade, $ano, $categoria);

    if ($dadosValidos) {

        // Atualiza o registro que possui o ID recebido.
        $sql = "UPDATE livros
                SET titulo = :titulo,
                    autor = :autor,
                    quantidade = :quantidade,
                    ano = :ano,
                    categoria = :categoria
                WHERE id = :id";

        $comando = $pdo->prepare($sql);

        $comando->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":quantidade" => $quantidade,
            ":ano" => $ano,
            ":categoria" => $categoria,
            ":id" => $id
        ]);

        echo "Livro atualizado com sucesso!";

    } else {

        echo "Dados do livro inválidos.";
    }
}

?>

<br><br>

<a href="livros.php">Voltar para livros</a>
