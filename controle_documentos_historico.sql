-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Jun-2024 às 14:45
-- Versão do servidor: 10.3.28-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecnologia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_documentos_historico`
--

CREATE TABLE `controle_documentos_historico` (
  `id` int(11) NOT NULL,
  `data_cadastro` varchar(200) DEFAULT NULL,
  `data_criacao` varchar(200) DEFAULT NULL,
  `aprovador` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_historico` varchar(50) DEFAULT NULL,
  `email_aprovador` varchar(200) DEFAULT NULL,
  `D_E_L_E_T_E` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `controle_documentos_historico`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `controle_documentos_historico`
--
ALTER TABLE `controle_documentos_historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `controle_documentos_historico`
--
ALTER TABLE `controle_documentos_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
