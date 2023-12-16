-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/12/2023 às 13:21
-- Versão do servidor: 8.0.35-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhoemfoco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato`
--

CREATE TABLE `candidato` (
  `id` int NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `xp` varchar(500) DEFAULT NULL,
  `formacao` varchar(500) DEFAULT NULL,
  `habilidades` varchar(500) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `foto` blob,
  `senha` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `candidato`
--

INSERT INTO `candidato` (`id`, `nome`, `email`, `xp`, `formacao`, `habilidades`, `cargo`, `foto`, `senha`) VALUES
(1, 'Ramon Lima de Santana', 'contatoramonsantana01@gmail.com', '2 anos de estudo', 'aprendi sozinho', 'Html, css., javascript, php, mysql, git', 'programador full-stack', NULL, '$2y$10$5lObkAaUiXcYuh8ovEbnrupL7C9Uisby72qx.Lb1zebX7GNIBIuYi'),
(2, 'Ramon', 'ramon@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$VoNaaztFjLIAEEzNAMNkhOq4U7wgk7OdxiE7ucYpwDDYl22jeqmdS'),
(3, 'fraca senha', 'fraca@senha.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$7nFxJk0oS4mNBgF0eq8DKOWdnzkBGxoR0K8EvwGDVQ1bhvs2J3cNm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato_vaga`
--

CREATE TABLE `candidato_vaga` (
  `id` int NOT NULL,
  `id_candidato` int DEFAULT NULL,
  `id_vaga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `candidato_vaga`
--

INSERT INTO `candidato_vaga` (`id`, `id_candidato`, `id_vaga`) VALUES
(1, 1, 11),
(2, 2, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int NOT NULL,
  `nome_empresa` varchar(250) DEFAULT NULL,
  `email_empresa` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `foto_empresa` blob,
  `descricao` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `email_empresa`, `area`, `cidade`, `foto_empresa`, `descricao`, `senha`) VALUES
(1, 'Tech', 'tech@teste.com', 'startup', 'Tucano', NULL, 'teste', '$2y$10$2QLhKY2dt//FOZTt9YWfB./bt038v79BhTSPu5KpbPBYz31dJflC2'),
(2, 'tech2', 'tech2@teste.com', NULL, NULL, NULL, NULL, '$2y$10$dNT8w3vr2YQOd0F3u6vCNuY.s7JHWBK4IvYIZq3Edafs3Q0abn80C');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa_vaga`
--

CREATE TABLE `empresa_vaga` (
  `id_vaga_empresa` int NOT NULL,
  `id_empresa` int DEFAULT NULL,
  `id_vaga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `empresa_vaga`
--

INSERT INTO `empresa_vaga` (`id_vaga_empresa`, `id_empresa`, `id_vaga`) VALUES
(5, 2, 11),
(7, 1, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `id` int NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `nome_empresa` varchar(250) DEFAULT NULL,
  `descricao_empresa` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vaga`
--

INSERT INTO `vaga` (`id`, `titulo`, `descricao`, `nome_empresa`, `descricao_empresa`) VALUES
(1, 'programador full-stack', 'programador full-stack \r\npara sofrer e agradecer', NULL, NULL),
(2, 'front-end', 'programador front end para fazer o front e o back ganhando o salario de front', 'Tech', 'teste'),
(3, 'teste', 'teste', 'Tech', 'teste'),
(4, 'gamer', 'jogadro', 'Tech', 'teste'),
(5, 'vai', 'vai', 'Tech', 'teste'),
(6, 'sem sessao', 'sem', 'Tech', 'teste'),
(11, 'hack', 'kappa kappa', 'tech2', ''),
(13, 'teste', 'teste', 'Tech', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `candidato_vaga`
--
ALTER TABLE `candidato_vaga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_candidato` (`id_candidato`),
  ADD KEY `id_vaga` (`id_vaga`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `empresa_vaga`
--
ALTER TABLE `empresa_vaga`
  ADD PRIMARY KEY (`id_vaga_empresa`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_vaga` (`id_vaga`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `candidato_vaga`
--
ALTER TABLE `candidato_vaga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa_vaga`
--
ALTER TABLE `empresa_vaga`
  MODIFY `id_vaga_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `candidato_vaga`
--
ALTER TABLE `candidato_vaga`
  ADD CONSTRAINT `candidato_vaga_ibfk_1` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id`),
  ADD CONSTRAINT `candidato_vaga_ibfk_2` FOREIGN KEY (`id_vaga`) REFERENCES `vaga` (`id`);

--
-- Restrições para tabelas `empresa_vaga`
--
ALTER TABLE `empresa_vaga`
  ADD CONSTRAINT `empresa_vaga_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `empresa_vaga_ibfk_2` FOREIGN KEY (`id_vaga`) REFERENCES `vaga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
