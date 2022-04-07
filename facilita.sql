-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Abr-2022 às 02:24
-- Versão do servidor: 10.5.12-MariaDB-cll-lve
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u980294060_facilita`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `user`, `numero`, `saldo`, `data`) VALUES
(17, '456.987.787-79', '521440532', '510.00', '2022-03-12'),
(18, '565.448.441-64', '521287149', '10.00', '2022-03-13'),
(19, '415.726.438-09', '493340345', '150.00', '2022-03-14'),
(23, '415.726.738-09', '385575217', '100.00', '2022-03-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `anterior` decimal(10,2) NOT NULL,
  `atual` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `data` date NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`id`, `user`, `valor`, `anterior`, `atual`, `status`, `data`, `owner`) VALUES
(5, '456.987.787-79', '20.00', '0.00', '20.00', 1, '2022-03-12', 1),
(12, '456.987.787-79', '1.00', '7.00', '8.00', 3, '2022-03-13', 1),
(15, '456.987.787-79', '3.00', '5.00', '8.00', 3, '2022-03-13', 1),
(16, '456.987.787-79', '1.00', '8.00', '9.00', 3, '2022-03-13', 1),
(17, '456.987.787-79', '1.00', '9.00', '10.00', 3, '2022-03-14', 1),
(18, '415.726.738-09', '0.00', '150.00', '150.00', 1, '2022-03-14', 1),
(19, '415.726.738-09', '0.00', '150.00', '150.00', 1, '2022-03-14', 1),
(20, '415.726.738-09', '50.00', '150.00', '100.00', 2, '2022-03-14', 1),
(22, '415.726.738-09', '50.00', '50.00', '100.00', 3, '2022-03-14', 1),
(23, '456.987.787-79', '500.00', '10.00', '510.00', 1, '2022-03-24', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL,
  `nivel` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `cpf`, `status`, `nivel`, `owner`, `data`) VALUES
(1, 'Jeniffer Admin', 'admin@gmail.com', 'J2020', '123.456.789-10', 'true', 1, 0, '0000-00-00'),
(32, 'Amadeu Silva', 'amadeu2020@gmail.com', '123', '789.987.789-89', 'true', 3, 1, '2022-03-12'),
(39, 'Pedro', 'pedro@gmail.com', '123', '456.987.787-79', 'true', 2, 1, '2022-03-12'),
(40, 'elias', 'elias@gmail.com', '123', '565.448.441-64', 'true', 2, 1, '2022-03-13'),
(45, 'Jeniffer Luana Mansoleli', 'jeniffermansoleli@hotmail.com', '123', '415.726.738-09', 'true', 2, 1, '2022-03-14'),
(46, 'JenifferVenda', 'jeniffervenda@hotmail.com', '123', '415.726.438-77', 'true', 3, 1, '2022-03-14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
