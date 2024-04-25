-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Abr-2024 às 00:58
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sap_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

CREATE TABLE `estudante` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` enum('masculino','femenino','','') NOT NULL,
  `turno` enum('manha','tarde','','') NOT NULL,
  `pitruca` enum('nova_vida','camama','','') NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estudante`
--

INSERT INTO `estudante` (`id`, `nome`, `sexo`, `turno`, `pitruca`, `data`) VALUES
(1, 'Sangwa Muzuza', 'femenino', 'tarde', 'nova_vida', '2024-04-16'),
(2, 'Maria Luisa', 'femenino', 'tarde', 'nova_vida', '2024-04-16'),
(3, 'Aisha João', 'femenino', 'manha', 'nova_vida', '2024-04-16'),
(4, 'Arthur Junior', 'femenino', 'manha', 'nova_vida', '2024-04-16'),
(5, 'Thaniel Jeorge', 'masculino', 'tarde', 'nova_vida', '2024-04-16'),
(6, 'Robson Fortunado', 'masculino', 'tarde', 'nova_vida', '2024-04-16'),
(7, 'Lucio Alva', 'masculino', 'tarde', 'nova_vida', '2024-04-17'),
(8, 'Ronaldo Mezov', 'masculino', 'tarde', 'nova_vida', '2024-04-17'),
(9, 'Carlos Sebastião', 'masculino', 'tarde', 'nova_vida', '2024-04-17'),
(10, 'Stelvio', 'masculino', 'tarde', 'nova_vida', '2024-04-17'),
(11, 'Michele Menga', 'masculino', 'manha', 'nova_vida', '2024-04-17'),
(12, 'Licenio Pascual', 'masculino', 'manha', 'nova_vida', '2024-04-17'),
(13, 'Willy Diogo', 'masculino', 'manha', 'nova_vida', '2024-04-17'),
(14, 'Kauê Ribeiro', 'masculino', 'manha', 'nova_vida', '2024-04-17'),
(15, 'Reizinaide Texa', 'femenino', 'tarde', 'nova_vida', '2024-04-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `p_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sumario` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `presente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`p_id`, `id`, `sumario`, `data`, `presente`) VALUES
(74, 0, '', '0000-00-00', 0),
(75, 0, '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cargo` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `cargo`) VALUES
(1, 'Sangwa', 'sangwa@gmail.com', 'snmz23', 'admin'),
(2, 'Maria', 'Mar@gmail.com', 'passe123', 'user'),
(7, 'Luka', 'luk@mail', 'lll', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`p_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
