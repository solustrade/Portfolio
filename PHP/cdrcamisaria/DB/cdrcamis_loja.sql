-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 11/11/2015 às 08:58
-- Versão do servidor: 5.1.73-cll
-- Versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `cdrcamis_loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(200) COLLATE utf8_bin NOT NULL,
  `posicao` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `obs` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posicao` (`posicao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `conteudo`, `posicao`, `valor`, `obs`) VALUES
(1, 'Categoria 1', 1, 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `obs` varchar(2000) NOT NULL,
  `valor` float NOT NULL,
  `valor_promo` float NOT NULL,
  `imagem` varchar(2000) NOT NULL,
  `cor` varchar(500) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `obs`, `valor`, `valor_promo`, `imagem`, `cor`, `categoria`) VALUES
(35, 'Produto 12', '.', 0.01, 0.01, 'IMG-20151030-WA0013.jpg', '', 1),
(33, 'Produto 10', '.', 0.01, 0.01, 'IMG-20151030-WA0010.jpg', '', 1),
(34, 'Produto 11', '.', 0.01, 0.01, 'IMG-20151030-WA0011.jpg', '', 1),
(30, 'Produto 7', '.', 0.01, 0.01, 'IMG-20151030-WA0007.jpg', '', 1),
(31, 'Produto 8', '.', 0.01, 0.01, 'IMG-20151030-WA0008.jpg', '', 1),
(32, 'Produto 9', '.', 0.01, 0.01, 'IMG-20151030-WA0009.jpg', '', 1),
(28, 'Produto 5', '.', 0.01, 0.01, 'IMG-20151030-WA0005.jpg', '', 1),
(29, 'Produto 6', '.', 0.01, 0.01, 'IMG-20151030-WA0006.jpg', '', 1),
(24, 'Produto 1', '.', 1, 1, 'IMG-20151030-WA0001.jpg', '', 1),
(25, 'Produto 2', '.', 0.01, 0.01, 'IMG-20151030-WA0002.jpg', '', 1),
(26, 'Produto 3', '.', 0.01, 0.01, 'IMG-20151030-WA0003.jpg', '', 1),
(27, 'Produto 4', '.', 0.01, 0.01, 'IMG-20151030-WA0004.jpg', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` char(1) NOT NULL,
  `chave` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `tipo`, `chave`) VALUES
(1, 'Helcio Silva', 'psbiosits', 'ð³·P)0Û%MQÃT›', 'A', 'bispo'),
(6, 'Rosimar', 'rosimar', '|\ryÞ#Î¥vþ]!«é', 'A', 'bispo'),
(7, 'Débora Duarte', 'debora', 'ÁÜù­g7ÁÒ©ˆ(''dÔz', 'A', 'bispo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
