SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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

INSERT INTO `exameFisico` VALUES
(1, 70, 60, 50, 40, 30, 20, 10, 1, 'Aparelho digestivo', 'Descrição da malformação', 1, 'Convulsões');

CREATE TABLE `exameHemograma` (
  `idProntuario` int(11) NOT NULL,
  `hemograma` tinyint(1) NOT NULL,
  `dataHemograma` int(11) DEFAULT NULL,
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

CREATE TABLE `prontuario` (
  `idProntuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prontuario` VALUES
(1);

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

INSERT INTO `recemNascido` VALUES
(1, '2017-05-04', 'Masculino', 50, 0, 'Pós-termo', 0, '1º Gemelar', 'Normal (Vaginal)', 0, 'Anóxico', 'Outro');

CREATE TABLE `servicoSaude` (
  `idProntuario` int(11) NOT NULL,
  `idTipoHospital` int(11) NOT NULL,
  `identServico` varchar(200) NOT NULL,
  `municipioOcorrencia` varchar(50) NOT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servicoSaude` VALUES
(1, 5, 'ident', 'municipio', 'responsável');

CREATE TABLE `tipoHospital` (
  `idTipoHospital` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tipoHospital` VALUES
(1, 'Hospital Público'),
(2, 'Hospital Particular'),
(3, 'Hospital particular'),
(4, 'Domicílio'),
(5, 'Outro');


ALTER TABLE `exameFisico`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `exameHemograma`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `examePuncaoLiquosa`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `recemNascido`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `servicoSaude`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `idTipoHostpital` (`idTipoHospital`);

ALTER TABLE `tipoHospital`
  ADD PRIMARY KEY (`idTipoHospital`);


ALTER TABLE `tipoHospital`
  MODIFY `idTipoHospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `exameFisico`
  ADD CONSTRAINT `exameFisico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `exameHemograma`
  ADD CONSTRAINT `exameHemograma_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `examePuncaoLiquosa`
  ADD CONSTRAINT `examePuncaoLiquosa_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `recemNascido`
  ADD CONSTRAINT `recemNascido_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`);

ALTER TABLE `servicoSaude`
  ADD CONSTRAINT `servicoSaude_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `servicoSaude_ibfk_2` FOREIGN KEY (`idTipoHospital`) REFERENCES `tipoHospital` (`idTipoHospital`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
