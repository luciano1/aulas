<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "meu_banco");
if ($conn->connect_error) die("Conexão falhou: " . $conn->connect_error);

// Verificar se o ID foi passado e executar a exclusão
if (isset($_GET['id'])) {
    $sql = "DELETE FROM usuarios WHERE id = {$_GET['id']}";
    echo $conn->query($sql) ? 
         "Usuário deletado com sucesso! <a href='index.php'>Voltar</a>" : 
         "Erro ao deletar: " . $conn->error;
} else {
    echo "ID inválido. <a href='index.php'>Voltar</a>";
}
