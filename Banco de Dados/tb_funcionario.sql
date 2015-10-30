-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Out-2015 às 17:50
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
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro_funcionario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome_funcionario` varchar(200) NOT NULL,
  `cpf_funcionario` varchar(20) NOT NULL,
  `rg_funcionario` varchar(20) NOT NULL,
  `telefone_funcionario` varchar(20) NOT NULL,
  `celular_funcionario` varchar(20) NOT NULL,
  `dt_nascimento_funcionario` timestamp NOT NULL,
  `email_funcionario` varchar(200) NOT NULL,
  `sexo_funcionario` varchar(50) NOT NULL,
  `cep_funcionario` varchar(20) NOT NULL,
  `endereco_funcionario` varchar(200) NOT NULL,
  `numero_funcionario` varchar(20) NOT NULL,
  `complemento_funcionario` varchar(200) NOT NULL,
  `cidade_funcionario` int(11) NOT NULL,
  `uf_funcionario` int(11) NOT NULL,
  `funcao_funcionario` varchar(200) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `dt_cadastro_funcionario`, `nome_funcionario`, `cpf_funcionario`, `rg_funcionario`, `telefone_funcionario`, `celular_funcionario`, `dt_nascimento_funcionario`, `email_funcionario`, `sexo_funcionario`, `cep_funcionario`, `endereco_funcionario`, `numero_funcionario`, `complemento_funcionario`, `cidade_funcionario`, `uf_funcionario`, `funcao_funcionario`) VALUES
(2, '2015-10-30 16:27:11', 'Fagagagagag', '123.133.131-31', '313131313', '(31) 3131-313', '(13) 1313-1313', '0000-00-00 00:00:00', 'falfasldhfoaiwerh@GMIA.COM', 'Masculino', '15.515-151', 'bundinha', '32131', '3213213', 1688, 6, 'Caixa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
