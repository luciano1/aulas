<?php

// Protege a página e abre conexão com o banco.
require_once "proteger.php";
require_once "conexao.php";

// Recebe o ID enviado pela listagem.
$id = $_GET["id"] ?? "";

// Se o ID não for válido, volta para a listagem.
if (!is_numeric($id)) {
    header("Location: revistas.php");
    exit;
}

// Busca a revista antes de mostrar a confirmação.
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
    <title>Excluir Revista</title>
</head>

<body>
    <h1>Excluir Revista</h1>

    <p>
        Deseja excluir a revista
        <strong><?= htmlspecialchars($revista["titulo"]) ?></strong>?
    </p>

    <!-- O POST confirma a exclusão do registro. -->
    <form action="remover_revista.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($revista["id"]) ?>">
        <button type="submit">Sim, excluir</button>
    </form>

    <br>

    <a href="revistas.php">Cancelar</a>
</body>

</html>
