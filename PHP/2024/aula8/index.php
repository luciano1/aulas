<?php
// Conexão com o banco de dados
$conn = new mysqli("127.0.0.1", "root", "", "meu_banco");
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Seleciona todos os usuários para a listagem
$sql = "SELECT id, nome, email, senha FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ações</th>
            
        </tr>
        <?php foreach($result as $row) {?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["nome"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["senha"]) ?></td>
                <td><a href='editar.php?id=<?= $row["id"] ?>'>Editar</a>
                <a href='delete.php?id=<?= $row["id"] ?>'>Apagar</a></td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="cadastro.php"><button>Cadastrar Novo Usuário</button></a>

    <?php $conn->close(); // Fechando a conexão com o banco de dados ?>
</body>
</html>
