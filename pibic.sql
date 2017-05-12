SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `dadossociodemograficos` (
  `idProntuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNascimento` date NOT NULL,
  `racaCor` varchar(30) NOT NULL,
  `escolaridade` varchar(30) NOT NULL,
  `estadoCivil` varchar(30) NOT NULL,
  `ocupacao` varchar(30) NOT NULL,
  `pessoasNaCasa` int(11) NOT NULL,
  `rendaFamiliar` double NOT NULL,
  `enderecoAtual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dadossociodemograficos` VALUES
(1, '0', '2017-05-05', '', 'Sem escolaridade', 'Solteira', 'CEO da maior empresa do mundo', 10, 50000, 1);

CREATE TABLE `endereco` (
  `idProntuario` int(11) NOT NULL,
  `uf` char(2) NOT NULL,
  `municipio` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `endereco` VALUES
(1, 'PI', 2200053, '', 0, '', '+5586994012914');

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `codigoUf` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `estado` VALUES
(1, 12, 'Acre', 'AC', 1),
(2, 27, 'Alagoas', 'AL', 2),
(3, 16, 'AmapÃ¡', 'AP', 1),
(4, 13, 'Amazonas', 'AM', 1),
(5, 29, 'Bahia', 'BA', 2),
(6, 23, 'CearÃ¡', 'CE', 2),
(7, 53, 'Distrito Federal', 'DF', 5),
(8, 32, 'EspÃ­rito Santo', 'ES', 3),
(9, 52, 'GoiÃ¡s', 'GO', 5),
(10, 21, 'MaranhÃ£o', 'MA', 2),
(11, 51, 'Mato Grosso', 'MT', 5),
(12, 50, 'Mato Grosso do Sul', 'MS', 5),
(13, 31, 'Minas Gerais', 'MG', 3),
(14, 15, 'ParÃ¡', 'PA', 2),
(15, 25, 'ParaÃ­ba', 'PB', 2),
(16, 41, 'ParanÃ¡', 'PR', 4),
(17, 26, 'Pernambuco', 'PE', 2),
(18, 22, 'PiauÃ­', 'PI', 2),
(19, 33, 'Rio de Janeiro', 'RJ', 3),
(20, 24, 'Rio Grande do Norte', 'RN', 2),
(21, 43, 'Rio Grande do Sul', 'RS', 4),
(22, 11, 'RondÃ´nia', 'RO', 1),
(23, 14, 'Roraima', 'RR', 1),
(24, 42, 'Santa Catarina', 'SC', 4),
(25, 35, 'SÃ£o Paulo', 'SP', 3),
(26, 28, 'Sergipe', 'SE', 2),
(27, 17, 'Tocantins', 'TO', 1);

CREATE TABLE `examefisico` (
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

INSERT INTO `examefisico` VALUES
(1, 70, 60, 50, 40, 30, 20, 10, 1, 'Aparelho digestivo', 'DescriÃ§Ã£o da malformaÃ§Ã£o', 1, 'ConvulsÃµes');

CREATE TABLE `examehemograma` (
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

CREATE TABLE `exameimagem` (
  `idProntuario` int(11) NOT NULL,
  `tomografiaCran` int(11) NOT NULL,
  `resultTomografiaCran` varchar(30) DEFAULT NULL,
  `ressonanciaMagCran` int(11) NOT NULL,
  `resultRessonanciaMagCran` varchar(30) DEFAULT NULL,
  `ultrassomTrans` int(11) NOT NULL,
  `resultUltrassomTrans` varchar(30) DEFAULT NULL,
  `ultrassomAbd` int(11) NOT NULL,
  `resultUltrassomAbd` varchar(30) DEFAULT NULL,
  `ecocardiograma` int(11) NOT NULL,
  `resultEcocardiograma` varchar(30) DEFAULT NULL,
  `fundoOlho` int(11) DEFAULT NULL,
  `alterFundoOlho` int(11) DEFAULT NULL,
  `descAlterFundoOlho` varchar(50) DEFAULT NULL,
  `testeOrelhinha` int(11) DEFAULT NULL,
  `alterTesteOrelhinha` int(11) DEFAULT NULL,
  `descAlterTesteOrelhinha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exameimagem` VALUES
(1, 1, '', 1, '', 0, '', 0, '', 1, '', 0, 1, 'esp', 0, 1, 'cificaÃ§Ã£o');

CREATE TABLE `examepuncaoliquorica` (
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

INSERT INTO `examepuncaoliquorica` VALUES
(1, 1, '2017-05-16', 'LÃ­mpido', 0, 0, 0, 0, 0, 0, 0, 0);

CREATE TABLE `municipio` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `prontuario` (
  `idProntuario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prontuario` VALUES
(1, 100, '2017-05-06 14:42:17');

CREATE TABLE `recemnascido` (
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

INSERT INTO `recemnascido` VALUES
(1, '2017-05-04', 'Masculino', 50, 0, 'PÃ³s-termo', 0, '1Âº Gemelar', 'Normal (Vaginal)', 0, 'AnÃ³xico', 'Outro');

CREATE TABLE `servicosaude` (
  `idProntuario` int(11) NOT NULL,
  `idTipoHospital` int(11) NOT NULL,
  `identServico` varchar(200) NOT NULL,
  `municipioOcorrencia` int(11) DEFAULT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servicosaude` VALUES
(1, 5, 'ident', 2202208, 'responsÃ¡vel');

CREATE TABLE `tipohospital` (
  `idTipoHospital` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tipohospital` VALUES
(1, 'Hospital PÃºblico'),
(2, 'Hospital Particular'),
(3, 'Hospital particular'),
(4, 'DomicÃ­lio'),
(5, 'Outro');

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` VALUES
(100, 'matheuslipk', 'Matheus AraÃºjo de Alcantara', '7c4a8d09ca3762af61e59520943dc26494f8941b');


ALTER TABLE `dadossociodemograficos`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `enderecoAtual` (`enderecoAtual`);

ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `municipio` (`municipio`),
  ADD KEY `uf` (`uf`);

ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uf` (`uf`);

ALTER TABLE `examefisico`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `examehemograma`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `exameimagem`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `examepuncaoliquorica`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `municipio`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `uf` (`uf`);

ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `usuario` (`usuario`);

ALTER TABLE `recemnascido`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `servicosaude`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `idTipoHostpital` (`idTipoHospital`),
  ADD KEY `municipioOcorrencia` (`municipioOcorrencia`);

ALTER TABLE `tipohospital`
  ADD PRIMARY KEY (`idTipoHospital`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nick` (`nick`);


ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tipohospital`
  MODIFY `idTipoHospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

ALTER TABLE `dadossociodemograficos`
  ADD CONSTRAINT `dadossociodemograficos_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `dadossociodemograficos_ibfk_2` FOREIGN KEY (`enderecoAtual`) REFERENCES `endereco` (`idProntuario`);

ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_2` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`codigo`),
  ADD CONSTRAINT `endereco_ibfk_4` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `endereco_ibfk_5` FOREIGN KEY (`uf`) REFERENCES `estado` (`uf`);

ALTER TABLE `examefisico`
  ADD CONSTRAINT `exameFisico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `examehemograma`
  ADD CONSTRAINT `exameHemograma_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `exameimagem`
  ADD CONSTRAINT `exameImagem_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `examepuncaoliquorica`
  ADD CONSTRAINT `examePuncaoLiquorica_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`uf`) REFERENCES `estado` (`uf`);

ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

ALTER TABLE `recemnascido`
  ADD CONSTRAINT `recemNascido_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `servicosaude`
  ADD CONSTRAINT `servicosaude_ibfk_1` FOREIGN KEY (`idTipoHospital`) REFERENCES `tipohospital` (`idTipoHospital`),
  ADD CONSTRAINT `servicosaude_ibfk_2` FOREIGN KEY (`municipioOcorrencia`) REFERENCES `municipio` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
