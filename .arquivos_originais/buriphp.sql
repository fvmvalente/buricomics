-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Abr-2015 às 23:34
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buriphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` smallint(1) NOT NULL COMMENT '1 - Masculino / 2 - Feminino',
  `cidade` varchar(255) COLLATE utf8_bin NOT NULL,
  `estado` char(2) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(25) COLLATE utf8_bin NOT NULL,
  `melhorHorario` varchar(255) COLLATE utf8_bin NOT NULL,
  `mensagem` text COLLATE utf8_bin NOT NULL,
  `dataCadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `nascimento`, `sexo`, `cidade`, `estado`, `telefone`, `melhorHorario`, `mensagem`, `dataCadastro`) VALUES
(1, 'EDER MARTINS FRANCO', 'efranco23@gmail.com', '2015-04-18', 1, 'PORT SAINT LUCIE', 'AM', '7722038970', 'ManhÃ£,Tarde,Noite,Qualquer horÃ¡rio', 'adadasd', '2015-04-18 17:31:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
