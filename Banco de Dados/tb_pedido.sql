-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Nov-2015 às 21:14
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmaloka`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `obs_pedido` text NOT NULL,
  `cliente_pedido` int(11) NOT NULL,
  `atendente_pedido` int(11) NOT NULL,
  `caixa_pedido` int(11) NOT NULL,
  `gerente_pedido` int(11) NOT NULL,
  `entregador_pedido` int(11) NOT NULL,
  `produtos_pedido` text NOT NULL,
  `valor_pedido` varchar(200) NOT NULL,
  `dt_pedido` int(50) NOT NULL,
  `status_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `obs_pedido`, `cliente_pedido`, `atendente_pedido`, `caixa_pedido`, `gerente_pedido`, `entregador_pedido`, `produtos_pedido`, `valor_pedido`, `dt_pedido`, `status_pedido`) VALUES
(1, 'Qualquer observCÃª', 1, 2, 6, 10, 4, '[{"idProduto":1,"qtdProduto":9},{"idProduto":2,"qtdProduto":8},{"idProduto":3,"qtdProduto":7},{"idProduto":5,"qtdProduto":6}] ', '480,52', 1447270281, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
