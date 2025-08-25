CREATE DATABASE IF NOT EXISTS loja
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE loja;

CREATE TABLE IF NOT EXISTS produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Inserindo alguns produtos para testar
INSERT INTO produtos (nome, preco, estoque) VALUES
('Mouse', 50.00, 10),
('Teclado', 120.00, 5),
('Monitor 24"', 900.00, 2);
