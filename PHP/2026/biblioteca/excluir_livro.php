<?php

// Protege a página e abre conexão com o banco.
require_once "proteger.php";
require_once "conexao.php";

// Recebe o ID enviado pela listagem.
$id = $_GET["id"] ?? "";

// Se o ID não for válido, volta para a listagem.
if (!is_numeric($id)) {
    header("Location: livros.php");
    exit;
}

// Busca o livro antes de mostrar a confirmação.
$sql = "SELECT * FROM livros WHERE id = :id";
$comando = $pdo->prepare($sql);
$comando->execute([":id" => $id]);
$livro = $comando->fetch(PDO::FETCH_ASSOC);

// Se não encontrar o livro, volta para a listagem.
if (!$livro) {
    header("Location: livros.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Excluir Livro</title>
</head>

<body>
    <h1>Excluir Livro</h1>

    <p>
        Deseja excluir o livro
        <strong><?= htmlspecialchars($livro["titulo"]) ?></strong>?
    </p>

    <!-- O POST confirma a exclusão do registro. -->
    <form action="remover_livro.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($livro["id"]) ?>">
        <button type="submit">Sim, excluir</button>
    </form>

    <br>

    <a href="livros.php">Cancelar</a>
</body>

</html>
