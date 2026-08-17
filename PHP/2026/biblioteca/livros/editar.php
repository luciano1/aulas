<?php

// Protege a página e abre conexão com o banco.
require_once "../includes/proteger.php";
require_once "../config/conexao.php";

// Recebe o ID enviado pelo link da listagem.
$id = $_GET["id"] ?? "";

// Se o ID não for numérico, volta para a listagem.
if (!is_numeric($id)) {
    header("Location: listar.php");
    exit;
}

// Busca o livro que será editado.
$sql = "SELECT * FROM livros WHERE id = :id";
$comando = $pdo->prepare($sql);
$comando->execute([":id" => $id]);
$livro = $comando->fetch(PDO::FETCH_ASSOC);

// Se não encontrar o livro, volta para a listagem.
if (!$livro) {
    header("Location: listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>

<body>
    <h1>Editar Livro</h1>

    <!-- Envia os dados alterados para atualizar.php. -->
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($livro["id"]) ?>">

        <label for="titulo">Título:</label><br>
        <input
            type="text"
            id="titulo"
            name="campo-titulo"
            value="<?= htmlspecialchars($livro["titulo"]) ?>"
            required
        >

        <br><br>

        <label for="autor">Autor:</label><br>
        <input
            type="text"
            id="autor"
            name="campo-autor"
            value="<?= htmlspecialchars($livro["autor"]) ?>"
            required
        >

        <br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input
            type="number"
            id="quantidade"
            name="campo-quantidade"
            value="<?= htmlspecialchars($livro["quantidade"]) ?>"
            min="0"
            required
        >

        <br><br>

        <label for="ano">Ano de Publicação:</label><br>
        <input
            type="number"
            id="ano"
            name="campo-ano"
            value="<?= htmlspecialchars($livro["ano"]) ?>"
            required
        >

        <br><br>

        <label for="categoria">Categoria:</label><br>
        <select id="categoria" name="campo-categoria" required>
            <option value="Tecnologia" <?= $livro["categoria"] == "Tecnologia" ? "selected" : "" ?>>
                Tecnologia
            </option>
            <option value="História" <?= $livro["categoria"] == "História" ? "selected" : "" ?>>
                História
            </option>
            <option value="Romance" <?= $livro["categoria"] == "Romance" ? "selected" : "" ?>>
                Romance
            </option>
            <option value="Didático" <?= $livro["categoria"] == "Didático" ? "selected" : "" ?>>
                Didático
            </option>
        </select>

        <br><br>

        <button type="submit">Salvar alterações</button>
    </form>

    <br>

    <a href="listar.php">Voltar</a>
</body>

</html>
