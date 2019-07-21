-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jul-2019 às 08:44
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telecontrol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `justificativa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `grupo`, `nome`, `telefone`, `email`, `ativo`, `justificativa`) VALUES
(1, 1, 'Luis Martins', '(14)99743-8604', 'luis.carlos@tele.com.br', 1, NULL),
(2, 2, 'Waldir Pimentel', '(14)99865-8798', 'waldir@telecontrol.com.br', 1, NULL),
(3, 3, 'JoÃ£o JÃºnior', '15-99865-2536', 'joao.junior@telecontrol.com.br', 1, NULL),
(4, 3, 'Mauricio Ribeiro', '(14)98145-5907', 'mauricio.santos29@fatec.sp.gov.br', 0, 'teste de exclusÃ£o modal'),
(5, 1, 'Eike Batista', '(14)98163-1717', 'eike@ogx.com', 0, 'Mensalidade VIP atrasada'),
(6, 2, 'Bruce Banner', '', 'hulk@avengers.com', 0, 'Porque Hulk esmaga!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nome_grupo` varchar(30) DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nome_grupo`, `situacao`) VALUES
(1, 'VIP', 1),
(2, 'A1', 1),
(3, 'A2', 1),
(4, 'A3', 0),
(5, 'B1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_grupo` (`grupo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_id_grupo` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
