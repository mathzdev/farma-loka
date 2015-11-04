-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2015 às 15:25
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
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro_fornecedor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome_fornecedor` varchar(200) NOT NULL,
  `razao_social_fornecedor` varchar(200) NOT NULL,
  `cnpj_fornecedor` varchar(20) NOT NULL,
  `telefone_fornecedor` varchar(20) NOT NULL,
  `celular_fornecedor` varchar(20) NOT NULL,
  `cep_fornecedor` varchar(20) NOT NULL,
  `endereco_fornecedor` varchar(200) NOT NULL,
  `numero_fornecedor` varchar(20) NOT NULL,
  `complemento_fornecedor` varchar(200) NOT NULL,
  `cidade_fornecedor` int(11) NOT NULL,
  `uf_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`id_fornecedor`, `dt_cadastro_fornecedor`, `nome_fornecedor`, `razao_social_fornecedor`, `cnpj_fornecedor`, `telefone_fornecedor`, `celular_fornecedor`, `cep_fornecedor`, `endereco_fornecedor`, `numero_fornecedor`, `complemento_fornecedor`, `cidade_fornecedor`, `uf_fornecedor`) VALUES
(1, '2015-11-04 14:08:31', 'Cifarma', 'Cifarma Cientifica Farmaceutica Ltda', '17.5620.750/0001-69', '(62) 4012-4012', '0000000000000000', '74675-090', 'BR-153 Km 5,5 - Jardim Guanabara', 's/n', 's/c', 2120, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
