<?php

// Protege a página e abre conexão com o banco.
require_once "proteger.php";
require_once "conexao.php";

// Recebe o ID enviado pelo link da listagem.
$id = $_GET["id"] ?? "";

// Se o ID não for numérico, volta para a listagem.
if (!is_numeric($id)) {
    header("Location: revistas.php");
    exit;
}

// Busca a revista que será editada.
$sql = "SELECT * FROM revistas WHERE id = :id";
$comando = $pdo->prepare($sql);
$comando->execute([":id" => $id]);
$revista = $comando->fetch(PDO::FETCH_ASSOC);

// Se não encontrar a revista, volta para a listagem.
if (!$revista) {
    header("Location: revistas.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Revista</title>
</head>

<body>
    <h1>Editar Revista</h1>

    <!-- Envia os dados alterados para atualizar_revista.php. -->
    <form action="atualizar_revista.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($revista["id"]) ?>">

        <label for="titulo">Título:</label><br>
        <input
            type="text"
            id="titulo"
            name="titulo"
            value="<?= htmlspecialchars($revista["titulo"]) ?>"
            required
        >

        <br><br>

        <label for="editora">Editora:</label><br>
        <input
            type="text"
            id="editora"
            name="editora"
            value="<?= htmlspecialchars($revista["editora"]) ?>"
            required
        >

        <br><br>

        <label for="ano">Ano:</label><br>
        <input
            type="number"
            id="ano"
            name="ano"
            value="<?= htmlspecialchars($revista["ano"]) ?>"
            required
        >

        <br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input
            type="number"
            id="quantidade"
            name="quantidade"
            value="<?= htmlspecialchars($revista["quantidade"]) ?>"
            min="0"
            required
        >

        <br><br>

        <button type="submit">Salvar alterações</button>
    </form>

    <br>

    <a href="revistas.php">Voltar</a>
</body>

</html>
