<?php
$host = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '123456';

try {
   $pdo = new PDO("mysql:
   host=$host;
   dbname=$banco;
   charset=utf8mb4", 
   $usuario, $senha);
    
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $erro) {
    echo "Erro na conexão com o banco: " . $erro->getMessage();
}
echo "Conectado com sucesso!";
