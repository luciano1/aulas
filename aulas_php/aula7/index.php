<?php
// Conexão com o banco de dados
$servername = "127.0.0.1";
$username = "root"; 
$password = ""; 
$dbname = "meu_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Seleciona todos os usuários para a listagem
$sql = "SELECT id, nome, email FROM usuarios";
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
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Exibindo os dados de cada usuário
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum usuário cadastrado.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="cadastro.php"><button>Cadastrar Novo Usuário</button></a>

    <?php $conn->close(); // Fechando a conexão com o banco de dados ?>
</body>
</html>
