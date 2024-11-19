<?php
// Conexão com o banco de dados
$conn = new mysqli("127.0.0.1", "root", "", "meu_banco");

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inicializar variáveis
$usuario = null;

// Buscar os dados do usuário para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $usuario = $conn->query($sql)->fetch_assoc();
    if (!$usuario) {
        die("Usuário não encontrado.");
    }
}

// Atualizar os dados do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso! <a href='index.php'>Voltar</a>";
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <?php if ($usuario): ?>
        <form action="editar.php" method="post">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>

    <br><a href="index.php">Voltar para a lista de usuários</a>

    <?php $conn->close(); ?>
</body>
</html>
