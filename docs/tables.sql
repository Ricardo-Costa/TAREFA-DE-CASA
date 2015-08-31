-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2015 às 14:44
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `notificacao` tinyint(1) DEFAULT NULL COMMENT 'Notificar quando existir tarefa relacionada a esta disciplina.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_inscrito`
--

CREATE TABLE IF NOT EXISTS `disciplina_inscrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_disciplina` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_disciplina_UNIQUE` (`id_disciplina`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dissertacao`
--

CREATE TABLE IF NOT EXISTS `dissertacao` (
  `id` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_questao_UNIQUE` (`id_questao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_questao` int(11) NOT NULL,
  `letra` char(1) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_questao_item_idx` (`id_questao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarefa` int(11) NOT NULL,
  `numero` tinyint(2) NOT NULL,
  `descricao` text NOT NULL,
  `tipo` tinyint(1) NOT NULL COMMENT 'Este campo recebe a definição se a questão será. 1 - Objetiva. 2 - Dissertativa.',
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_qst_idx` (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Questões da tarefa' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_disciplina` int(11) NOT NULL,
  `tipo` tinyint(2) NOT NULL DEFAULT '1',
  `id_professor` int(11) NOT NULL COMMENT 'Identificação do professor, usuário que está aplicando a tarefa em questão.',
  PRIMARY KEY (`id`),
  KEY `fk_trf_disciplina_idx` (`id_disciplina`),
  KEY `fk_trf_usuario_idx` (`id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL COMMENT 'O email é usado para o login do usuário.',
  `senha` varchar(32) NOT NULL,
  `tipo` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'Esta é a identificação do tipo de usuário\n(-1) - Usuário banido.\n-0 - Usuário inativo (Obs: Ativar via link de email de confirmação de cadastro).\n1 - Usuário do tipo aluno.\n2 - Usuário do tipo professor.\n3 - Administrador',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Limitadores para a tabela `disciplina_inscrito`
--
ALTER TABLE `disciplina_inscrito`
  ADD CONSTRAINT `fk_di_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_di_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dissertacao`
--
ALTER TABLE `dissertacao`
  ADD CONSTRAINT `fk_questao_dsrt` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_questao_item` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_tarefa_qst` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_trf_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trf_usuario` FOREIGN KEY (`id_professor`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
