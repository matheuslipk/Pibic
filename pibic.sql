CREATE TABLE `agenteetiologico` (
  `idAgente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `agenteetiologico` VALUES
(1, 'Rubéola'),
(2, 'Citomegalovírus'),
(3, 'Herpes vírus'),
(4, 'Parvovírus'),
(5, 'Toxoplasmose'),
(6, 'Sífilis'),
(7, 'HIV'),
(8, 'Zika vírus'),
(9, 'Chikungunya'),
(10, 'Dengue');

CREATE TABLE `antecedentes` (
  `idProntuario` int(11) NOT NULL,
  `grauParentesco` int(11) NOT NULL,
  `descGrauParentesco` varchar(50) DEFAULT NULL,
  `malFormacao` int(11) NOT NULL,
  `descMalFormacao` varchar(50) DEFAULT NULL,
  `parenteMicrocefalia` int(11) NOT NULL,
  `usoMedContinuo` int(11) NOT NULL,
  `descUsoMedContinuo` varchar(50) DEFAULT NULL,
  `doencaPreExist` int(11) NOT NULL,
  `descDoencaPreExist` int(11) DEFAULT NULL,
  `dst` int(11) NOT NULL,
  `descDstPreExist` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dadossociodemograficos` (
  `idProntuario` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  `dataNascimento` date NOT NULL,
  `racaCor` varchar(30) CHARACTER SET latin1 NOT NULL,
  `escolaridade` varchar(30) CHARACTER SET latin1 NOT NULL,
  `estadoCivil` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ocupacao` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pessoasNaCasa` int(11) NOT NULL,
  `rendaFamiliar` double NOT NULL,
  `enderecoAtual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `doencapreexist` (
  `idProntuario` int(11) NOT NULL,
  `diabetes` int(11) DEFAULT NULL,
  `outrasMetabolicas` int(11) DEFAULT NULL,
  `hiperArterial` int(11) DEFAULT NULL,
  `cardiopatia` int(11) DEFAULT NULL,
  `doencaRenal` int(11) DEFAULT NULL,
  `pneumopatia` int(11) DEFAULT NULL,
  `hemoglobinopatia` int(11) DEFAULT NULL,
  `cancer` int(11) DEFAULT NULL,
  `autoimune` int(11) DEFAULT NULL,
  `neuroleptica` int(11) DEFAULT NULL,
  `outros` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `drogas` (
  `idProntuario` int(11) NOT NULL,
  `usoMaconha` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoCocaina` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoDrogaInjetavel` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoCrack` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoLolo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoLSD` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoEcstasy` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usoAnfetamina` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dstpreexist` (
  `idProntuario` int(11) NOT NULL,
  `hiv` int(11) DEFAULT NULL,
  `sifilis` int(11) DEFAULT NULL,
  `gonorreia` int(11) DEFAULT NULL,
  `clamidia` int(11) DEFAULT NULL,
  `hepatite` int(11) DEFAULT NULL,
  `herpes` int(11) DEFAULT NULL,
  `outrasDsts` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `durantegestacao` (
  `idProntuario` int(11) NOT NULL,
  `contatoPesticida` int(11) NOT NULL,
  `descPesticidas` varchar(50) DEFAULT NULL,
  `contatoAgrotoxico` int(11) NOT NULL,
  `descAgrotoxicos` varchar(50) DEFAULT NULL,
  `exameRX` int(11) NOT NULL,
  `periodoExameRX` varchar(30) DEFAULT NULL,
  `usoAcidoFolico` int(11) NOT NULL,
  `dataUsoAcidoFolico` date DEFAULT NULL,
  `usoFerro` int(11) NOT NULL,
  `dataUsoFerro` date DEFAULT NULL,
  `usoOutrosMed` int(11) NOT NULL,
  `descUsoOutrosMed` varchar(50) DEFAULT NULL,
  `dataIniTratamento` date DEFAULT NULL,
  `manchaVermelha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `endereco` (
  `idProntuario` int(11) NOT NULL,
  `uf` char(2) NOT NULL,
  `municipio` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estado` (
  `codigoUf` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `estado` VALUES
(11, 'Rondônia', 'RO', 1),
(12, 'Acre', 'AC', 1),
(13, 'Amazonas', 'AM', 1),
(14, 'Roraima', 'RR', 1),
(15, 'Pará', 'PA', 2),
(16, 'Amapá', 'AP', 1),
(17, 'Tocantins', 'TO', 1),
(21, 'Maranhão', 'MA', 2),
(22, 'Piauí', 'PI', 2),
(23, 'Ceará', 'CE', 2),
(24, 'Rio Grande do Norte', 'RN', 2),
(25, 'Paraíba', 'PB', 2),
(26, 'Pernambuco', 'PE', 2),
(27, 'Alagoas', 'AL', 2),
(28, 'Sergipe', 'SE', 2),
(29, 'Bahia', 'BA', 2),
(31, 'Minas Gerais', 'MG', 3),
(32, 'Espírito Santo', 'ES', 3),
(33, 'Rio de Janeiro', 'RJ', 3),
(35, 'São Paulo', 'SP', 3),
(41, 'Paraná', 'PR', 4),
(42, 'Santa Catarina', 'SC', 4),
(43, 'Rio Grande do Sul', 'RS', 4),
(50, 'Mato Grosso do Sul', 'MS', 5),
(51, 'Mato Grosso', 'MT', 5),
(52, 'Goiás', 'GO', 5),
(53, 'Distrito Federal', 'DF', 5);

CREATE TABLE `exameetiologico` (
  `idProntuario` int(11) NOT NULL,
  `idAgente` int(11) NOT NULL,
  `amostra` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `igm` int(11) DEFAULT NULL,
  `igg` int(11) DEFAULT NULL,
  `pcr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `histobstetrico` (
  `idProntuario` int(11) NOT NULL,
  `primGestacao` int(11) NOT NULL,
  `quantGravidez` int(11) DEFAULT NULL,
  `quantVivos` int(11) DEFAULT NULL,
  `quantMortos` int(11) DEFAULT NULL,
  `teveAborto` int(11) DEFAULT NULL,
  `quantAbortos` int(11) DEFAULT NULL,
  `malformacao` int(11) DEFAULT NULL,
  `descMalformacao` varchar(50) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `municipio` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prenatal` (
  `idProntuario` int(11) NOT NULL,
  `preNatal` int(11) DEFAULT NULL,
  `unidadeSaude` int(11) DEFAULT NULL,
  `ufPrenatal` varchar(50) DEFAULT NULL,
  `municipioPrenatal` int(11) DEFAULT NULL,
  `numConsultas1` int(11) DEFAULT NULL,
  `numConsultas2` int(11) DEFAULT NULL,
  `numConsultas3` int(11) DEFAULT NULL,
  `dataConsultas1` date DEFAULT NULL,
  `idadeGest1` int(11) DEFAULT NULL,
  `pesoIniGestacao` int(11) DEFAULT NULL,
  `pesoFimGestacao` int(11) DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prontuario` (
  `idProntuario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `servicosaude` (
  `idProntuario` int(11) NOT NULL,
  `idTipoHospital` int(11) NOT NULL,
  `identServico` varchar(200) NOT NULL,
  `municipioOcorrencia` int(11) DEFAULT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipohospital` (
  `idTipoHospital` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tipohospital` VALUES
(1, 'Hospital Público'),
(2, 'Hospital Particular'),
(3, 'Hospital particular'),
(4, 'Domicílio'),
(5, 'Outro');

CREATE TABLE `usoalcool` (
  `idProntuario` int(11) NOT NULL,
  `usoAlcool` int(11) NOT NULL,
  `freqAlcool` varchar(50) DEFAULT NULL,
  `dosesDrinks` varchar(20) NOT NULL,
  `freqDrinks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usotabaco` (
  `idProntuario` int(11) NOT NULL,
  `cigarro` varchar(50) DEFAULT NULL,
  `tempoFumante` int(11) DEFAULT NULL,
  `tempoExFumante` int(11) DEFAULT NULL,
  `escalaTempo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `usuario` VALUES
(100, 'matheuslipk', 'Matheus Araújo de Alcântara', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(1001, 'vitoria', 'Vitória', '7a7996b7852645393efb5736f759d88eaa771d24');


ALTER TABLE `agenteetiologico`
  ADD PRIMARY KEY (`idAgente`);

ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `descDoencaPreExist` (`descDoencaPreExist`),
  ADD KEY `descDstPreExist` (`descDstPreExist`);

ALTER TABLE `dadossociodemograficos`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `enderecoAtual` (`enderecoAtual`);

ALTER TABLE `doencapreexist`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `drogas`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `dstpreexist`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `durantegestacao`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `municipio` (`municipio`),
  ADD KEY `uf` (`uf`);

ALTER TABLE `estado`
  ADD PRIMARY KEY (`codigoUf`),
  ADD UNIQUE KEY `uf` (`uf`);

ALTER TABLE `exameetiologico`
  ADD PRIMARY KEY (`idProntuario`,`idAgente`,`amostra`),
  ADD KEY `idAgente` (`idAgente`);

ALTER TABLE `examefisico`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `examehemograma`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `exameimagem`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `examepuncaoliquorica`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `histobstetrico`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `municipio`
  ADD PRIMARY KEY (`codigo`);

ALTER TABLE `prenatal`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `ufPrenatal` (`ufPrenatal`),
  ADD KEY `municipioPrenatal` (`municipioPrenatal`);

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

ALTER TABLE `usoalcool`
  ADD PRIMARY KEY (`idProntuario`);

ALTER TABLE `usotabaco`
  ADD KEY `usotabaco_ibfk_1` (`idProntuario`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);


ALTER TABLE `agenteetiologico`
  MODIFY `idAgente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `tipohospital`
  MODIFY `idTipoHospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `antecedentes`
  ADD CONSTRAINT `antecedentes_ibfk_1` FOREIGN KEY (`descDoencaPreExist`) REFERENCES `doencapreexist` (`idProntuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `antecedentes_ibfk_2` FOREIGN KEY (`descDstPreExist`) REFERENCES `dstpreexist` (`idProntuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `antecedentes_ibfk_3` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `dadossociodemograficos`
  ADD CONSTRAINT `dadossociodemograficos_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `dadossociodemograficos_ibfk_2` FOREIGN KEY (`enderecoAtual`) REFERENCES `endereco` (`idProntuario`);

ALTER TABLE `doencapreexist`
  ADD CONSTRAINT `doencapreexist_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `drogas`
  ADD CONSTRAINT `drogas_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `dstpreexist`
  ADD CONSTRAINT `dstpreexist_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `durantegestacao`
  ADD CONSTRAINT `durantegestacao_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `endereco_ibfk_2` FOREIGN KEY (`uf`) REFERENCES `estado` (`uf`),
  ADD CONSTRAINT `endereco_ibfk_3` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`codigo`);

ALTER TABLE `exameetiologico`
  ADD CONSTRAINT `exameetiologico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`),
  ADD CONSTRAINT `exameetiologico_ibfk_2` FOREIGN KEY (`idAgente`) REFERENCES `agenteetiologico` (`idAgente`);

ALTER TABLE `examefisico`
  ADD CONSTRAINT `exameFisico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `examehemograma`
  ADD CONSTRAINT `exameHemograma_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `exameimagem`
  ADD CONSTRAINT `exameImagem_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `examepuncaoliquorica`
  ADD CONSTRAINT `examePuncaoLiquorica_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `histobstetrico`
  ADD CONSTRAINT `histobstetrico_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `prenatal`
  ADD CONSTRAINT `prenatal_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `prenatal_ibfk_2` FOREIGN KEY (`ufPrenatal`) REFERENCES `estado` (`uf`),
  ADD CONSTRAINT `prenatal_ibfk_3` FOREIGN KEY (`municipioPrenatal`) REFERENCES `municipio` (`codigo`);

ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

ALTER TABLE `recemnascido`
  ADD CONSTRAINT `recemNascido_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `servicosaude`
  ADD CONSTRAINT `servicosaude_ibfk_1` FOREIGN KEY (`idTipoHospital`) REFERENCES `tipohospital` (`idTipoHospital`),
  ADD CONSTRAINT `servicosaude_ibfk_2` FOREIGN KEY (`municipioOcorrencia`) REFERENCES `municipio` (`codigo`),
  ADD CONSTRAINT `servicosaude_ibfk_3` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `usoalcool`
  ADD CONSTRAINT `usoalcool_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;

ALTER TABLE `usotabaco`
  ADD CONSTRAINT `usotabaco_ibfk_1` FOREIGN KEY (`idProntuario`) REFERENCES `prontuario` (`idProntuario`) ON DELETE CASCADE;