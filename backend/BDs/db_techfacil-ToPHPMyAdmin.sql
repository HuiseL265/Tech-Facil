-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 21-Out-2020 às 13:46
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_techfacil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administradores`
--

DROP TABLE IF EXISTS `tb_administradores`;
CREATE TABLE IF NOT EXISTS `tb_administradores` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela para controle de acesso de administradores.';

--
-- Extraindo dados da tabela `tb_administradores`
--

INSERT INTO `tb_administradores` (`idAdm`, `nome`, `email`, `senha`, `cpf`) VALUES
(1, 'Vitor Pereira', 'vitor.per55@gmail.com', '29515bb9a5d5e558e2b3ba71e3b6e037', '50576009822'),
(2, 'Thiago Frederico', 'thiagofrederico3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '56484961237');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

DROP TABLE IF EXISTS `tb_contato`;
CREATE TABLE IF NOT EXISTS `tb_contato` (
  `idContato` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `emailSecundario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContato`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `idEndereco` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `uf` tinytext NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `cep` int(11) NOT NULL,
  `numero` smallint(6) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idEndereco` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idContato` int(11) NOT NULL,
  `nome` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idContato_fk` (`idContato`),
  KEY `idEndereco_fk` (`idEndereco`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `idContato_fk` FOREIGN KEY (`idContato`) REFERENCES `tb_contato` (`idContato`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idEndereco_fk` FOREIGN KEY (`idEndereco`) REFERENCES `tb_endereco` (`idEndereco`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
