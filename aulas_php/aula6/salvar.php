<?php
// Incluir o arquivo de conexão com o banco de dados
include('conexao.php');

// Verificar se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criar a consulta SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    // Executar a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Novo usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }

    // Fechar a conexão
    mysqli_close($conn);
}
?>
