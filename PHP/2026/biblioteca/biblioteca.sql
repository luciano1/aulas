-- =========================================================
-- PROZ EDUCAÇÃO
-- Professor Luciano Rocha
-- Disciplina: Backend - PHP
-- Projeto: Sistema de Biblioteca
-- =========================================================

CREATE DATABASE IF NOT EXISTS biblioteca
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE biblioteca;

-- Recria a estrutura para manter a prática sempre igual.
DROP TABLE IF EXISTS revistas;
DROP TABLE IF EXISTS livros;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(120) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    ano INT NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO livros (titulo, autor, quantidade, ano, categoria)
VALUES
    ('PHP para Web', 'João Silva', 5, 2025, 'Tecnologia'),
    ('Clean Code', 'Robert C. Martin', 3, 2008, 'Tecnologia'),
    ('Dom Casmurro', 'Machado de Assis', 4, 1899, 'Romance'),
    ('Sapiens', 'Yuval Noah Harari', 2, 2011, 'História');

-- Consultas úteis para aula:

-- SELECT * FROM livros;

-- SELECT * FROM livros ORDER BY titulo;

-- SELECT * FROM livros WHERE quantidade > 0;

-- SELECT * FROM livros WHERE id = 1;

-- UPDATE livros
-- SET quantidade = 10
-- WHERE id = 1;

-- DELETE FROM livros
-- WHERE id = 1;
