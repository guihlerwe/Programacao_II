
-- Criação do banco e tabela
CREATE DATABASE IF NOT EXISTS meusistema CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE meusistema;

CREATE TABLE IF NOT EXISTS alunos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL UNIQUE,
  data_nascimento DATE NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de exemplo
INSERT INTO alunos (nome, email, data_nascimento) VALUES
('Ana Silva', 'ana@ifc.edu.br', '2003-05-10'),
('Bruno Souza', 'bruno@ifc.edu.br', '2002-11-22');
