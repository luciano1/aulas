<?php
// dados da conexão
$servername = "localhost"; // Endereço do servidor MySQL
$username = "root"; // Usuário do banco (padrão em servidores locais como XAMPP)
$password = ""; // Senha do banco (geralmente vazia em servidores locais)
$dbname = "meu_banco"; // Nome do banco de dados que você criou

// Criando a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
