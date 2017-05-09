-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09/05/2017 às 00:29
-- Versão do servidor: 5.7.18-0ubuntu0.16.10.1
-- Versão do PHP: 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pibic`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `codigoUf` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `exameFisico`
--

CREATE TABLE `exameFisico` (
  `idProntuario` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `perimToracico` int(11) NOT NULL,
  `perimCefalico` int(11) NOT NULL,
  `apgar1` int(11) NOT NULL,
  `apgar5` int(11) NOT NULL,
  `apgar10` int(11) NOT NULL,
  `malformacao` tinyint(1) NOT NULL,
  `tipoMalformacao` varchar(30) DEFAULT NULL,
  `descMalformacao` varchar(80) DEFAULT NULL,
  `achadosClinicos` tinyint(1) NOT NULL,
  `outrosAchadosClinicos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `exameFisico`
--

INSERT INTO `exameFisico` VALUES
(1, 70, 60, 50, 40, 30, 20, 10, 1, 'Aparelho digestivo', 'Descrição da malformação', 1, 'Convulsões');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exameHemograma`
--

CREATE TABLE `exameHemograma` (
  `idProntuario` int(11) NOT NULL,
  `hemograma` tinyint(1) NOT NULL,
  `dataHemograma` date DEFAULT NULL,
  `hb` int(11) DEFAULT NULL,
  `ht` int(11) DEFAULT NULL,
  `leococitos` int(11) DEFAULT NULL,
  `bastonetes` int(11) DEFAULT NULL,
  `segmentados` int(11) DEFAULT NULL,
  `monocitos` int(11) DEFAULT NULL,
  `linfocitos` int(11) DEFAULT NULL,
  `plaquetas` int(11) DEFAULT NULL,
  `glicose` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `examePuncaoLiquosa`
--

CREATE TABLE `examePuncaoLiquosa` (
  `idProntuario` int(11) NOT NULL,
  `puncaoLiquorica` int(11) NOT NULL,
  `dataPuncaoLiquorica` date DEFAULT NULL,
  `aspecto` varchar(30) DEFAULT NULL,
  `hemacias` int(11) DEFAULT NULL,
  `leococitos` int(11) DEFAULT NULL,
  `bastonetes` int(11) DEFAULT NULL,
  `segmentados` int(11) DEFAULT NULL,
  `monocitos` int(11) DEFAULT NULL,
  `linfocitos` int(11) DEFAULT NULL,
  `cloreto` int(11) DEFAULT NULL,
  `glicose` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `municipio`
--

CREATE TABLE `municipio` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prontuario`
--

CREATE TABLE `prontuario` (
  `idProntuario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `prontuario`
--

INSERT INTO `prontuario` VALUES
(1, 100, '2017-05-06 14:42:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recemNascido`
--

CREATE TABLE `recemNascido` (
  `idProntuario` int(11) NOT NULL,
  `dataParto` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `idadeGestacionalSem` int(11) NOT NULL,
  `idadeGestacionalDia` int(11) NOT NULL,
  `classIdadeGest` varchar(20) NOT NULL,
  `gemelar` int(1) NOT NULL,
  `tipoGemelar` varchar(20) DEFAULT NULL,
  `tipoParto` varchar(20) NOT NULL,
  `danoPerinatal` int(1) NOT NULL,
  `tipoDanoPerinatal` varchar(20) DEFAULT NULL,
  `outroDano` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `recemNascido`
--

INSERT INTO `recemNascido` VALUES
(1, '2017-05-04', 'Masculino', 50, 0, 'Pós-termo', 0, '1º Gemelar', 'Normal (Vaginal)', 0, 'Anóxico', 'Outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicoSaude`
--

CREATE TABLE `servicoSaude` (
  `idProntuario` int(11) NOT NULL,
  `idTipoHospital` int(11) NOT NULL,
  `identServico` varchar(200) NOT NULL,
  `municipioOcorrencia` int(11) DEFAULT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `servicoSaude`
--

INSERT INTO `servicoSaude` VALUES
(1, 5, 'ident', 2202208, 'responsável');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoHospital`
--

CREATE TABLE `tipoHospital` (
  `idTipoHospital` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipoHospital`
--

INSERT INTO `tipoHospital` VALUES
(1, 'Hospital Público'),
(2, 'Hospital Particular'),
(3, 'Hospital particular'),
(4, 'Domicílio'),
(5, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` VALUES
(100, 'matheuslipk', 'Matheus Araújo de Alcantara', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uf` (`uf`);

--
-- Índices de tabela `exameFisico`
--
ALTER TABLE `exameFisico`
  ADD PRIMARY KEY (`idProntuario`);

--
-- Índices de tabela `exameHemograma`
--
ALTER TABLE `exameHemograma`
  ADD PRIMARY KEY (`idProntuario`);

--
-- Índices de tabela `examePuncaoLiquosa`
--
ALTER TABLE `examePuncaoLiquosa`
  ADD PRIMARY KEY (`idProntuario`);

--
-- Índices de tabela `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `uf` (`uf`);

--
-- Índices de tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices de tabela `recemNascido`
--
ALTER TABLE `recemNascido`
  ADD PRIMARY KEY (`idProntuario`);

--
-- Índices de tabela `servicoSaude`
--
ALTER TABLE `servicoSaude`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `idTipoHostpital` (`idTipoHospital`),
  ADD KEY `municipioOcorrencia` (`municipioOcorrencia`);

--
-- Índices de tabela `tipoHospital`
--
ALTER TABLE `tipoHospital`
  ADD PRIMARY KEY (`idTipoHospital`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `tipoHospital`
--
ALTER TABLE `tipoHospital`
  MODIFY `idTipoHospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `exameFisico`
--
ALTER TABLE `exameFisico`
  ADD CONSTRAINT `exameFisico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

--
-- Restrições para tabelas `exameHemograma`
--
ALTER TABLE `exameHemograma`
  ADD CONSTRAINT `exameHemograma_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

--
-- Restrições para tabelas `examePuncaoLiquosa`
--
ALTER TABLE `examePuncaoLiquosa`
  ADD CONSTRAINT `examePuncaoLiquosa_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

--
-- Restrições para tabelas `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`uf`) REFERENCES `estado` (`uf`);

--
-- Restrições para tabelas `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `recemNascido`
--
ALTER TABLE `recemNascido`
  ADD CONSTRAINT `recemNascido_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

--
-- Restrições para tabelas `servicoSaude`
--
ALTER TABLE `servicoSaude`
  ADD CONSTRAINT `servicoSaude_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `servicoSaude_ibfk_2` FOREIGN KEY (`idTipoHospital`) REFERENCES `tipoHospital` (`idTipoHospital`),
  ADD CONSTRAINT `servicoSaude_ibfk_3` FOREIGN KEY (`municipioOcorrencia`) REFERENCES `municipio` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;