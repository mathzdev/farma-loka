-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2015 às 18:08
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
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(200) NOT NULL,
  `descricao_produto` text NOT NULL,
  `fornecedor_produto` int(11) NOT NULL,
  `valor_produto` varchar(20) NOT NULL,
  `foto_produto` varchar(500) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `descricao_produto`, `fornecedor_produto`, `valor_produto`, `foto_produto`) VALUES
(1, 'Doril', 'Composição: ácido acetilsalicílico, cafeína e paracetamol.\r\n\r\nDoril possui ação antitérmica e analgésica. Atua no alívio da dor e redução da febre. A cafeína confere um alívio também nas dores de cabeça.\r\n\r\nPara dores leves a moderadas: tomar 2 comprimidos com um copo de água, podendo repetir a dose cada 6 horas.\r\nPara enxaqueca: tomar apenas uma dose de 2 comprimidos em 24 horas. O início de ação ocorre aproximadamente em 15 minutos, após a administração oral.\r\n\r\nSeu uso é contraindiciado em caso de hipersensibilidade aos componentes da fórmula.', 1, '5,88', '/data/300_46185.jpeg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
