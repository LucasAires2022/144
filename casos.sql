/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : casos

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2022-04-21 12:14:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `actividad`
-- ----------------------------
DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actividad
-- ----------------------------
INSERT INTO `actividad` VALUES ('1', 'Ocupada/o - Empleadora/or', 's', '2');
INSERT INTO `actividad` VALUES ('2', 'Ocupada/o - Empleada/o', 's', '1');
INSERT INTO `actividad` VALUES ('3', 'Ocupada/o - Cuentapropista', 's', '3');
INSERT INTO `actividad` VALUES ('4', 'Desocupada/o', 's', '7');
INSERT INTO `actividad` VALUES ('5', 'Cuidados de la casa', 's', '8');
INSERT INTO `actividad` VALUES ('6', 'Jubilada/o - Pensionada/o', 's', '9');
INSERT INTO `actividad` VALUES ('7', 'Estudiante', 's', '10');
INSERT INTO `actividad` VALUES ('8', 'Rentista', 's', '11');
INSERT INTO `actividad` VALUES ('9', 'Ocupada/o - Profesional', 's', '4');
INSERT INTO `actividad` VALUES ('10', 'Ocupada/o - Obrera/o', 's', '6');
INSERT INTO `actividad` VALUES ('11', 'Ocupado/a Fuerzas de Seguridad', 's', '5');

-- ----------------------------
-- Table structure for `agresor`
-- ----------------------------
DROP TABLE IF EXISTS `agresor`;
CREATE TABLE `agresor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vinculo_agresor_id` tinyint(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `documento` varchar(11) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `nacionalidad_id` tinyint(4) NOT NULL,
  `identidad_genero_id` tinyint(4) NOT NULL,
  `lugar_residencia_id` smallint(6) NOT NULL,
  `adicciones` varchar(1) NOT NULL,
  `adicciones_observ` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18794 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agresor
-- ----------------------------

-- ----------------------------
-- Table structure for `agresor_actividad`
-- ----------------------------
DROP TABLE IF EXISTS `agresor_actividad`;
CREATE TABLE `agresor_actividad` (
  `agresor_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `actividad_id` smallint(6) NOT NULL,
  PRIMARY KEY (`agresor_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agresor_actividad
-- ----------------------------

-- ----------------------------
-- Table structure for `caso`
-- ----------------------------
DROP TABLE IF EXISTS `caso`;
CREATE TABLE `caso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen_id` tinyint(4) NOT NULL,
  `motivo_consulta_id` tinyint(4) NOT NULL,
  `cancelado` varchar(1) NOT NULL,
  `emergencia` varchar(1) NOT NULL,
  `consultante_id` int(11) NOT NULL,
  `victima_id` int(11) NOT NULL,
  `agresor_id` int(11) NOT NULL,
  `motivo_problematica_id` tinyint(4) NOT NULL,
  `motivo_varios_id` tinyint(4) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `denuncia` varchar(2) NOT NULL,
  `armas` varchar(1) NOT NULL,
  `cubre_gastos` varchar(1) NOT NULL,
  `socializo_situacion` varchar(1) NOT NULL,
  `donde_recurrir` varchar(1) NOT NULL,
  `discapacidad` varchar(1) NOT NULL,
  `localizable_agresor` varchar(1) NOT NULL,
  `amenazas` varchar(1) NOT NULL,
  `escolarizado` varchar(1) NOT NULL,
  `datos_ubicacion` text NOT NULL,
  `operador_911` varchar(30) NOT NULL,
  `usuario` smallint(6) NOT NULL,
  `editando` varchar(1) NOT NULL,
  `editpor` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173786 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_derivacion`
-- ----------------------------
DROP TABLE IF EXISTS `caso_derivacion`;
CREATE TABLE `caso_derivacion` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `derivacion_id` smallint(6) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_derivacion
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_maltrato`
-- ----------------------------
DROP TABLE IF EXISTS `caso_maltrato`;
CREATE TABLE `caso_maltrato` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `tipo_maltrato_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_maltrato
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_medidas`
-- ----------------------------
DROP TABLE IF EXISTS `caso_medidas`;
CREATE TABLE `caso_medidas` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `medidas_proteccion_id` tinyint(4) NOT NULL,
  `vencimiento` date NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_medidas
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_modalidad`
-- ----------------------------
DROP TABLE IF EXISTS `caso_modalidad`;
CREATE TABLE `caso_modalidad` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `modalidad_violencia_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_modalidad
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_observ`
-- ----------------------------
DROP TABLE IF EXISTS `caso_observ`;
CREATE TABLE `caso_observ` (
  `caso_id` int(11) NOT NULL,
  `nitem` smallint(6) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `observ` text NOT NULL,
  `intervencion` text NOT NULL,
  `usuario_id` smallint(6) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_observ
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_requerimiento`
-- ----------------------------
DROP TABLE IF EXISTS `caso_requerimiento`;
CREATE TABLE `caso_requerimiento` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `requerimiento_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_requerimiento
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_seguimiento`
-- ----------------------------
DROP TABLE IF EXISTS `caso_seguimiento`;
CREATE TABLE `caso_seguimiento` (
  `caso_id` int(11) NOT NULL,
  `nitem` smallint(6) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `seguimiento` text NOT NULL,
  `usuario_id` smallint(6) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_seguimiento
-- ----------------------------

-- ----------------------------
-- Table structure for `caso_tipo`
-- ----------------------------
DROP TABLE IF EXISTS `caso_tipo`;
CREATE TABLE `caso_tipo` (
  `caso_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `tipo_violencia_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`caso_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of caso_tipo
-- ----------------------------

-- ----------------------------
-- Table structure for `consultante`
-- ----------------------------
DROP TABLE IF EXISTS `consultante`;
CREATE TABLE `consultante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `documento` varchar(11) NOT NULL,
  `lugar_residencia_id` smallint(6) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `altura` int(11) NOT NULL,
  `piso_dpto` varchar(15) NOT NULL,
  `tipo_telefono` varchar(15) NOT NULL,
  `numero_telefono` varchar(15) NOT NULL,
  `identidad_genero_id` tinyint(4) NOT NULL,
  `vinculo_consultante_id` tinyint(4) NOT NULL,
  `situacion_conyugal_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69591 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consultante
-- ----------------------------

-- ----------------------------
-- Table structure for `derivacion`
-- ----------------------------
DROP TABLE IF EXISTS `derivacion`;
CREATE TABLE `derivacion` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` smallint(6) NOT NULL,
  `motivo_consulta_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of derivacion
-- ----------------------------
INSERT INTO `derivacion` VALUES ('1', 'CIM - Alicia Moreau', 's', '1', '1');
INSERT INTO `derivacion` VALUES ('2', 'CIM - Minerva Mirabal', 's', '2', '1');
INSERT INTO `derivacion` VALUES ('3', 'CIM - María Gallego', 's', '4', '1');
INSERT INTO `derivacion` VALUES ('4', 'OVD', 's', '27', '1');
INSERT INTO `derivacion` VALUES ('5', 'MPF Ministerio Público Fiscal', 's', '22', '1');
INSERT INTO `derivacion` VALUES ('6', 'Comisaría', 's', '28', '1');
INSERT INTO `derivacion` VALUES ('7', 'Tribunales', 's', '15', '1');
INSERT INTO `derivacion` VALUES ('8', 'Hospital', 'n', '24', '1');
INSERT INTO `derivacion` VALUES ('9', 'ONG', 's', '20', '1');
INSERT INTO `derivacion` VALUES ('10', '911', 's', '19', '1');
INSERT INTO `derivacion` VALUES ('11', '137', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('12', 'Otras Líneas', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('13', 'CIM - Elvira Rawson', 's', '3', '1');
INSERT INTO `derivacion` VALUES ('14', 'CIM - Margarita Malharro', 's', '5', '1');
INSERT INTO `derivacion` VALUES ('15', 'CIM - Isabel Calvo', 's', '7', '1');
INSERT INTO `derivacion` VALUES ('16', 'CIM - Arminda Aberastury', 's', '6', '1');
INSERT INTO `derivacion` VALUES ('17', 'CIM - Dignos de Ser', 's', '8', '1');
INSERT INTO `derivacion` VALUES ('18', 'CIM - Lugar Mujer', 'n', '11', '1');
INSERT INTO `derivacion` VALUES ('19', 'CIM - Lohana Berkins', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('20', 'CIM - Pepa Gaitán', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('21', 'CIM - Macacha Guemes', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('22', 'CIM - Carolina Muzzilli', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('23', 'CIM - Alfonsina Storni', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('24', 'CIM - Fenia Chertkoff', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('25', 'CIM - Espacio de Mujer', 'n', '26', '1');
INSERT INTO `derivacion` VALUES ('26', 'BAP', 's', '30', '1');
INSERT INTO `derivacion` VALUES ('27', 'Defensorías Provinciales', 's', '29', '1');
INSERT INTO `derivacion` VALUES ('28', 'Atención a la Víctima DDHH', 's', '31', '1');
INSERT INTO `derivacion` VALUES ('29', 'Red Salud', 's', '32', '1');
INSERT INTO `derivacion` VALUES ('30', 'Proteger', 's', '33', '1');
INSERT INTO `derivacion` VALUES ('31', 'INADI', 'n', '34', '1');
INSERT INTO `derivacion` VALUES ('40', 'CIM - Alicia Moreau', 'n', '2', '2');
INSERT INTO `derivacion` VALUES ('42', 'CIM - Minerva Mirabal', 'n', '1', '2');
INSERT INTO `derivacion` VALUES ('43', 'CIM - María Gallego', 'n', '3', '2');
INSERT INTO `derivacion` VALUES ('44', 'OVD', 's', '26', '2');
INSERT INTO `derivacion` VALUES ('45', 'MPF Ministerio Público Fiscal', 's', '11', '2');
INSERT INTO `derivacion` VALUES ('46', 'Comisaría', 's', '24', '2');
INSERT INTO `derivacion` VALUES ('47', 'Tribunales', 's', '11', '2');
INSERT INTO `derivacion` VALUES ('48', 'Hospital', 'n', '24', '2');
INSERT INTO `derivacion` VALUES ('49', 'ONG', 's', '11', '2');
INSERT INTO `derivacion` VALUES ('50', '911', 's', '11', '2');
INSERT INTO `derivacion` VALUES ('51', '137', 's', '11', '2');
INSERT INTO `derivacion` VALUES ('52', 'Otras Líneas', 's', '24', '2');
INSERT INTO `derivacion` VALUES ('53', 'CIM - Elvira Rawson', 'n', '5', '2');
INSERT INTO `derivacion` VALUES ('54', 'CIM - Margarita Malharro', 'n', '4', '2');
INSERT INTO `derivacion` VALUES ('55', 'CIM - Isabel Calvo', 'n', '6', '2');
INSERT INTO `derivacion` VALUES ('56', 'CIM - Arminda Aberastury', 's', '7', '2');
INSERT INTO `derivacion` VALUES ('57', 'CIM - Dignos de Ser', 'n', '8', '2');
INSERT INTO `derivacion` VALUES ('58', 'CIM - Lugar Mujer', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('59', 'CIM - Trayec. sin Violencia', 'n', '9', '2');
INSERT INTO `derivacion` VALUES ('60', 'CIM - Pepa Gaitán', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('61', 'CIM - Macacha Guemes', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('62', 'CIM - Carolina Muzzilli', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('63', 'CIM - Alfonsina Storni', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('64', 'CIM - Fenia Chertkoff', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('65', 'CIM - Lugar de Mujer', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('66', 'BAP', 's', '27', '2');
INSERT INTO `derivacion` VALUES ('67', 'Defensorías Provinciales', 's', '28', '2');
INSERT INTO `derivacion` VALUES ('68', 'Atención a la Víctima DDHH', 's', '29', '2');
INSERT INTO `derivacion` VALUES ('69', 'Red de Salud', 's', '30', '2');
INSERT INTO `derivacion` VALUES ('70', 'Proteger', 's', '31', '2');
INSERT INTO `derivacion` VALUES ('71', 'INADI', 's', '32', '2');
INSERT INTO `derivacion` VALUES ('80', 'CIM - Alicia Moreau', 's', '19', '3');
INSERT INTO `derivacion` VALUES ('82', 'CIM - Minerva Mirabal', 's', '14', '3');
INSERT INTO `derivacion` VALUES ('83', 'CIM - María Gallego', 's', '17', '3');
INSERT INTO `derivacion` VALUES ('84', 'OVD', 's', '9', '3');
INSERT INTO `derivacion` VALUES ('85', 'MPF Ministerio Público Fiscal', 's', '1', '3');
INSERT INTO `derivacion` VALUES ('86', 'Comisaría', 's', '4', '3');
INSERT INTO `derivacion` VALUES ('87', 'Tribunales', 's', '2', '3');
INSERT INTO `derivacion` VALUES ('88', 'Hospital', 'n', '3', '3');
INSERT INTO `derivacion` VALUES ('89', 'ONG', 's', '6', '3');
INSERT INTO `derivacion` VALUES ('90', '911', 's', '5', '3');
INSERT INTO `derivacion` VALUES ('91', '137', 's', '8', '3');
INSERT INTO `derivacion` VALUES ('92', 'Otras Líneas', 's', '7', '3');
INSERT INTO `derivacion` VALUES ('93', 'CIM - Elvira Rawson', 's', '16', '3');
INSERT INTO `derivacion` VALUES ('94', 'CIM - Margarita Malharro', 's', '18', '3');
INSERT INTO `derivacion` VALUES ('95', 'CIM - Isabel Calvo', 's', '15', '3');
INSERT INTO `derivacion` VALUES ('96', 'CIM - Arminda Aberastury', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('97', 'CIM - Dignos de Ser', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('98', 'CIM - Lugar Mujer', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('99', 'CIM - Trayec. Sin Violencia', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('100', 'CIM - Pepa Gaitán', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('101', 'CIM - Macacha Guemes', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('102', 'CIM - Carolina Muzzilli', 's', '24', '3');
INSERT INTO `derivacion` VALUES ('103', 'CIM - Alfonsina Storni', 's', '33', '3');
INSERT INTO `derivacion` VALUES ('104', 'CIM - Fenia Chertkoff', 's', '35', '3');
INSERT INTO `derivacion` VALUES ('105', 'CIM - Espacio de Mujer', 'n', '24', '3');
INSERT INTO `derivacion` VALUES ('106', 'BAP', 's', '36', '3');
INSERT INTO `derivacion` VALUES ('107', 'Servic. Loc. de Protec de Der.', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('108', 'Atención a la Víctima DDHH', 's', '38', '3');
INSERT INTO `derivacion` VALUES ('109', 'Red de Salud', 's', '37', '3');
INSERT INTO `derivacion` VALUES ('110', 'Proteger', 'n', '39', '3');
INSERT INTO `derivacion` VALUES ('111', 'INADI', 'n', '40', '3');
INSERT INTO `derivacion` VALUES ('112', 'Sede Comunal', 's', '33', '2');
INSERT INTO `derivacion` VALUES ('113', 'Sede Comunal', 's', '35', '1');
INSERT INTO `derivacion` VALUES ('114', 'CIM - Maria Elena Walsh', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('115', 'OAVL', 's', '36', '1');
INSERT INTO `derivacion` VALUES ('116', 'UFISEX', 's', '37', '1');
INSERT INTO `derivacion` VALUES ('117', 'DOVIC', 's', '38', '1');
INSERT INTO `derivacion` VALUES ('118', 'UFEM', 's', '39', '1');
INSERT INTO `derivacion` VALUES ('119', 'UFISEX', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('120', 'UFEM', 's', '10', '3');
INSERT INTO `derivacion` VALUES ('121', 'DOVIC', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('122', 'PROGRAMA Lazos', 's', '40', '1');
INSERT INTO `derivacion` VALUES ('123', 'PROGRAMA Delitos Sexuales', 's', '41', '1');
INSERT INTO `derivacion` VALUES ('124', 'Programa Lazos', 's', '34', '2');
INSERT INTO `derivacion` VALUES ('125', 'CIM - Maria Elena Walsh', 'n', '11', '2');
INSERT INTO `derivacion` VALUES ('126', 'CIM - María Elena Walsh', 's', '34', '3');
INSERT INTO `derivacion` VALUES ('127', '102', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('128', 'MPT Ministerio Público Tutelar', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('129', 'CNNyA Defensorías Zonales', 's', '11', '3');
INSERT INTO `derivacion` VALUES ('130', 'PROGRAMA Maltrato Infantil', 's', '13', '3');
INSERT INTO `derivacion` VALUES ('131', 'CIENA', 's', '12', '3');
INSERT INTO `derivacion` VALUES ('132', 'Defensoría del Pueblo', 's', '35', '2');
INSERT INTO `derivacion` VALUES ('133', 'Salud Mental Responde', 's', '36', '2');
INSERT INTO `derivacion` VALUES ('134', 'PROGRAMA Maltrato Infantil', 's', '43', '1');
INSERT INTO `derivacion` VALUES ('135', 'PRO. Noviazgos sin Violencia', 's', '42', '1');
INSERT INTO `derivacion` VALUES ('136', 'CNNyA', 's', '43', '1');
INSERT INTO `derivacion` VALUES ('137', 'CIM - Florentina Gomez', 's', '11', '1');
INSERT INTO `derivacion` VALUES ('138', 'CIM - Comuna 15', 's', '11', '1');

-- ----------------------------
-- Table structure for `hijos`
-- ----------------------------
DROP TABLE IF EXISTS `hijos`;
CREATE TABLE `hijos` (
  `victima_id` smallint(6) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `identidad_genero_id` tinyint(4) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `tipo_maltrato` varchar(200) NOT NULL,
  `convive` varchar(2) NOT NULL,
  `conducta` varchar(2) NOT NULL,
  `observ` text NOT NULL,
  PRIMARY KEY (`victima_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hijos
-- ----------------------------

-- ----------------------------
-- Table structure for `identidad_genero`
-- ----------------------------
DROP TABLE IF EXISTS `identidad_genero`;
CREATE TABLE `identidad_genero` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `identidad` varchar(20) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of identidad_genero
-- ----------------------------
INSERT INTO `identidad_genero` VALUES ('1', 'Mujer', 's', '1');
INSERT INTO `identidad_genero` VALUES ('2', 'Mujer Trans', 's', '2');
INSERT INTO `identidad_genero` VALUES ('3', 'Varón', 's', '3');
INSERT INTO `identidad_genero` VALUES ('4', 'Varón Trans', 's', '4');
INSERT INTO `identidad_genero` VALUES ('5', 'Travesti', 's', '5');
INSERT INTO `identidad_genero` VALUES ('6', 'Otro', 's', '6');

-- ----------------------------
-- Table structure for `lugar_residencia`
-- ----------------------------
DROP TABLE IF EXISTS `lugar_residencia`;
CREATE TABLE `lugar_residencia` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `descr` varchar(100) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lugar_residencia
-- ----------------------------
INSERT INTO `lugar_residencia` VALUES ('1', 'CABA/NE', 's', '91');
INSERT INTO `lugar_residencia` VALUES ('2', 'CABA - Agronomía (C 15)', 's', '1');
INSERT INTO `lugar_residencia` VALUES ('3', 'CABA - Almagro (C 5)', 's', '2');
INSERT INTO `lugar_residencia` VALUES ('4', 'CABA - Balvanera (C 3)', 's', '3');
INSERT INTO `lugar_residencia` VALUES ('5', 'CABA - Barracas (C 4)', 's', '4');
INSERT INTO `lugar_residencia` VALUES ('6', 'CABA - Belgrano (C 13)', 's', '11');
INSERT INTO `lugar_residencia` VALUES ('7', 'CABA - Boedo (C 5)', 's', '12');
INSERT INTO `lugar_residencia` VALUES ('8', 'CABA - Caballito (C 6)', 's', '13');
INSERT INTO `lugar_residencia` VALUES ('9', 'CABA - Chacarita (C 15)', 's', '14');
INSERT INTO `lugar_residencia` VALUES ('10', 'CABA - Coghlan (C 12)', 's', '18');
INSERT INTO `lugar_residencia` VALUES ('11', 'CABA - Colegiales (C 13)', 's', '19');
INSERT INTO `lugar_residencia` VALUES ('12', 'CABA - Constitución (C 1)', 's', '20');
INSERT INTO `lugar_residencia` VALUES ('13', 'CABA - Flores (C 7)', 's', '21');
INSERT INTO `lugar_residencia` VALUES ('14', 'CABA - Floresta (C 10)', 's', '24');
INSERT INTO `lugar_residencia` VALUES ('15', 'CABA - La Boca (C 4)', 's', '25');
INSERT INTO `lugar_residencia` VALUES ('16', 'CABA - La Paternal (C 15)', 's', '26');
INSERT INTO `lugar_residencia` VALUES ('17', 'CABA - Liniers (C 9)', 's', '27');
INSERT INTO `lugar_residencia` VALUES ('18', 'CABA - Mataderos (C 9)', 's', '28');
INSERT INTO `lugar_residencia` VALUES ('19', 'CABA - Montserrat (C 1)', 's', '29');
INSERT INTO `lugar_residencia` VALUES ('20', 'CABA - Monte Castro (C 10)', 's', '30');
INSERT INTO `lugar_residencia` VALUES ('21', 'CABA - Nueva Pompeya (C 4)', 's', '31');
INSERT INTO `lugar_residencia` VALUES ('22', 'CABA - Núñez (C 13)', 's', '36');
INSERT INTO `lugar_residencia` VALUES ('23', 'CABA - Palermo (C 14)', 's', '37');
INSERT INTO `lugar_residencia` VALUES ('24', 'CABA - Parque Avellaneda (C 9)', 's', '40');
INSERT INTO `lugar_residencia` VALUES ('25', 'CABA - Parque Chacabuco (C 7)', 's', '44');
INSERT INTO `lugar_residencia` VALUES ('26', 'CABA - Parque Chas (C 15)', 's', '45');
INSERT INTO `lugar_residencia` VALUES ('27', 'CABA - Parque Patricios (C 4)', 's', '46');
INSERT INTO `lugar_residencia` VALUES ('28', 'CABA - Puerto Madero (C 1)', 's', '47');
INSERT INTO `lugar_residencia` VALUES ('29', 'CABA - Recoleta (C 2)', 's', '49');
INSERT INTO `lugar_residencia` VALUES ('30', 'CABA - Retiro (C 1)', 's', '51');
INSERT INTO `lugar_residencia` VALUES ('31', 'CABA - Saavedra (C 12)', 's', '55');
INSERT INTO `lugar_residencia` VALUES ('32', 'CABA - San Cristóbal (C 3)', 's', '56');
INSERT INTO `lugar_residencia` VALUES ('33', 'CABA - San Nicolás (C 1)', 's', '57');
INSERT INTO `lugar_residencia` VALUES ('34', 'CABA - San Telmo (C 1)', 's', '58');
INSERT INTO `lugar_residencia` VALUES ('35', 'CABA - Vélez Sarsfield (C 10)', 's', '59');
INSERT INTO `lugar_residencia` VALUES ('36', 'CABA - Versalles (C 10)', 's', '60');
INSERT INTO `lugar_residencia` VALUES ('37', 'CABA - Villa Crespo (C 15)', 's', '61');
INSERT INTO `lugar_residencia` VALUES ('38', 'CABA - Villa del Parque (C 11)', 's', '62');
INSERT INTO `lugar_residencia` VALUES ('39', 'CABA - Villa Devoto (C 11)', 's', '63');
INSERT INTO `lugar_residencia` VALUES ('40', 'CABA - Villa Gral. Mitre (C 11)', 's', '64');
INSERT INTO `lugar_residencia` VALUES ('41', 'CABA - Villa Lugano (C 8)', 's', '65');
INSERT INTO `lugar_residencia` VALUES ('42', 'CABA - Villa Luro (C 10)', 's', '76');
INSERT INTO `lugar_residencia` VALUES ('43', 'CABA - Villa Ortúzar (C 15)', 's', '77');
INSERT INTO `lugar_residencia` VALUES ('44', 'CABA - Villa Pueyrredón (C 12)', 's', '78');
INSERT INTO `lugar_residencia` VALUES ('45', 'CABA - Villa Real (C 10)', 's', '79');
INSERT INTO `lugar_residencia` VALUES ('46', 'CABA - Villa Riachuelo (C 8)', 's', '80');
INSERT INTO `lugar_residencia` VALUES ('47', 'CABA - Villa Santa Rita (C 11)', 's', '82');
INSERT INTO `lugar_residencia` VALUES ('48', 'CABA - Villa Soldati (C 8)', 's', '83');
INSERT INTO `lugar_residencia` VALUES ('49', 'CABA - Villa Urquiza (C 12)', 's', '90');
INSERT INTO `lugar_residencia` VALUES ('50', 'Gran Buenos Aires', 'n', '92');
INSERT INTO `lugar_residencia` VALUES ('51', 'Vicente López  (Vicente López)', 's', '93');
INSERT INTO `lugar_residencia` VALUES ('52', 'Florida  (Vicente López)', 's', '94');
INSERT INTO `lugar_residencia` VALUES ('53', 'Villa Martelli  (Vicente López)', 's', '95');
INSERT INTO `lugar_residencia` VALUES ('54', 'Florida Oeste  (Vicente López)', 's', '96');
INSERT INTO `lugar_residencia` VALUES ('55', 'Olivos  (Vicente López)', 's', '97');
INSERT INTO `lugar_residencia` VALUES ('56', 'La Lucila  (Vicente López)', 's', '98');
INSERT INTO `lugar_residencia` VALUES ('57', 'Munro  (Vicente López)', 's', '99');
INSERT INTO `lugar_residencia` VALUES ('58', 'Carapachay  (Vicente López)', 's', '100');
INSERT INTO `lugar_residencia` VALUES ('59', 'Villa Adelina  (Vicente López)', 's', '101');
INSERT INTO `lugar_residencia` VALUES ('60', 'Martínez  (San Isidro)', 's', '102');
INSERT INTO `lugar_residencia` VALUES ('61', 'Villa Adelina  (San Isidro)', 's', '103');
INSERT INTO `lugar_residencia` VALUES ('62', 'Boulogne  (San Isidro)', 's', '104');
INSERT INTO `lugar_residencia` VALUES ('63', 'Acassuso  (San Isidro)', 's', '105');
INSERT INTO `lugar_residencia` VALUES ('64', 'San Isidro  (San Isidro)', 's', '106');
INSERT INTO `lugar_residencia` VALUES ('65', 'Beccar  (San Isidro)', 's', '107');
INSERT INTO `lugar_residencia` VALUES ('66', 'Victoria  (San Fernando)', 's', '108');
INSERT INTO `lugar_residencia` VALUES ('67', 'Virreyes  (San Fernando)', 's', '109');
INSERT INTO `lugar_residencia` VALUES ('68', 'San Fernando  (San Fernando)', 's', '110');
INSERT INTO `lugar_residencia` VALUES ('69', 'Tigre  (Tigre)', 's', '111');
INSERT INTO `lugar_residencia` VALUES ('70', 'Troncos del Talar  (Tigre)', 's', '112');
INSERT INTO `lugar_residencia` VALUES ('71', 'General Pacheco  (Tigre)', 's', '113');
INSERT INTO `lugar_residencia` VALUES ('72', 'Ricardo Rojas  (Tigre)', 's', '114');
INSERT INTO `lugar_residencia` VALUES ('73', 'El Talar  (Tigre)', 's', '115');
INSERT INTO `lugar_residencia` VALUES ('74', 'Don Torcuato  (Tigre)', 's', '116');
INSERT INTO `lugar_residencia` VALUES ('75', 'Rincón de Milberg  (Tigre)', 's', '117');
INSERT INTO `lugar_residencia` VALUES ('76', 'Benavídez  (Tigre)', 's', '118');
INSERT INTO `lugar_residencia` VALUES ('77', 'Dique Luján  (Tigre)', 's', '119');
INSERT INTO `lugar_residencia` VALUES ('78', 'Zona de Reserva  (Tigre)', 's', '120');
INSERT INTO `lugar_residencia` VALUES ('79', 'Zona de Reserva  (Tigre)', 's', '121');
INSERT INTO `lugar_residencia` VALUES ('80', 'Villa Maipú  (General San Martín)', 's', '122');
INSERT INTO `lugar_residencia` VALUES ('81', 'San Martín  (General San Martín)', 's', '123');
INSERT INTO `lugar_residencia` VALUES ('82', 'Villa Lynch  (General San Martín)', 's', '124');
INSERT INTO `lugar_residencia` VALUES ('83', 'San Andrés  (General San Martín)', 's', '125');
INSERT INTO `lugar_residencia` VALUES ('84', 'Villa Ballester  (General San Martín)', 's', '126');
INSERT INTO `lugar_residencia` VALUES ('85', 'Billinghurst  (General San Martín)', 's', '127');
INSERT INTO `lugar_residencia` VALUES ('86', 'José León Suárez  (General San Martín)', 's', '128');
INSERT INTO `lugar_residencia` VALUES ('87', 'Loma Hermosa  (General San Martín)', 's', '129');
INSERT INTO `lugar_residencia` VALUES ('88', 'Área de Promoción El Triángulo  (Malvinas Argentinas)', 's', '130');
INSERT INTO `lugar_residencia` VALUES ('89', 'Tortuguitas  (Malvinas Argentinas)', 's', '131');
INSERT INTO `lugar_residencia` VALUES ('90', 'Grand Bourg  (Malvinas Argentinas)', 's', '132');
INSERT INTO `lugar_residencia` VALUES ('91', 'Pablo Nogués  (Malvinas Argentinas)', 's', '133');
INSERT INTO `lugar_residencia` VALUES ('92', 'Los Polvorines  (Malvinas Argentinas)', 's', '134');
INSERT INTO `lugar_residencia` VALUES ('93', 'Villa de Mayo  (Malvinas Argentinas)', 's', '135');
INSERT INTO `lugar_residencia` VALUES ('94', 'Ingeniero Adolfo Sourdeaux  (Malvinas Argentinas)', 's', '136');
INSERT INTO `lugar_residencia` VALUES ('95', 'Del Viso  (José C. Paz)', 's', '137');
INSERT INTO `lugar_residencia` VALUES ('96', 'Tortuguitas  (José C. Paz)', 's', '138');
INSERT INTO `lugar_residencia` VALUES ('97', 'José C. Paz  (José C. Paz)', 's', '139');
INSERT INTO `lugar_residencia` VALUES ('98', 'San Miguel  (San Miguel)', 's', '140');
INSERT INTO `lugar_residencia` VALUES ('99', 'Muñiz  (San Miguel)', 's', '141');
INSERT INTO `lugar_residencia` VALUES ('100', 'Bella Vista  (San Miguel)', 's', '142');
INSERT INTO `lugar_residencia` VALUES ('101', 'Campo de Mayo  (San Miguel)', 's', '143');
INSERT INTO `lugar_residencia` VALUES ('102', 'Sáenz Peña  (Tres de Febrero)', 's', '144');
INSERT INTO `lugar_residencia` VALUES ('103', 'Villa Raffo  (Tres de Febrero)', 's', '145');
INSERT INTO `lugar_residencia` VALUES ('104', 'José Ingenieros  (Tres de Febrero)', 's', '146');
INSERT INTO `lugar_residencia` VALUES ('105', 'Ciudadela  (Tres de Febrero)', 's', '147');
INSERT INTO `lugar_residencia` VALUES ('106', 'Santos Lugares  (Tres de Febrero)', 's', '148');
INSERT INTO `lugar_residencia` VALUES ('107', 'Caseros  (Tres de Febrero)', 's', '149');
INSERT INTO `lugar_residencia` VALUES ('108', 'Villa Bosch  (Tres de Febrero)', 's', '150');
INSERT INTO `lugar_residencia` VALUES ('109', 'Martín Coronado  (Tres de Febrero)', 's', '151');
INSERT INTO `lugar_residencia` VALUES ('110', 'Ciudad Jardín Lomas del Palomar  (Tres de Febrero)', 's', '152');
INSERT INTO `lugar_residencia` VALUES ('111', 'Loma Hermosa  (Tres de Febrero)', 's', '153');
INSERT INTO `lugar_residencia` VALUES ('112', 'Pablo Podestá  (Tres de Febrero)', 's', '154');
INSERT INTO `lugar_residencia` VALUES ('113', 'El Libertador  (Tres de Febrero)', 's', '155');
INSERT INTO `lugar_residencia` VALUES ('114', 'Churruca  (Tres de Febrero)', 's', '156');
INSERT INTO `lugar_residencia` VALUES ('115', 'Once de Septiembre  (Tres de Febrero)', 's', '157');
INSERT INTO `lugar_residencia` VALUES ('116', 'Remedios de Escalada  (Tres de Febrero)', 's', '158');
INSERT INTO `lugar_residencia` VALUES ('117', 'Villa Sarmiento  (Morón)', 's', '159');
INSERT INTO `lugar_residencia` VALUES ('118', 'El Palomar  (Morón)', 's', '160');
INSERT INTO `lugar_residencia` VALUES ('119', 'Haedo  (Morón)', 's', '161');
INSERT INTO `lugar_residencia` VALUES ('120', 'Morón  (Morón)', 's', '162');
INSERT INTO `lugar_residencia` VALUES ('121', 'Castelar  (Morón)', 's', '163');
INSERT INTO `lugar_residencia` VALUES ('122', 'Hurlingham  (Hurlingham)', 's', '164');
INSERT INTO `lugar_residencia` VALUES ('123', 'William C. Morris  (Hurlingham)', 's', '165');
INSERT INTO `lugar_residencia` VALUES ('124', 'Villa Tesei  (Hurlingham)', 's', '166');
INSERT INTO `lugar_residencia` VALUES ('125', 'Ituzaingó  (Ituzaingó)', 's', '167');
INSERT INTO `lugar_residencia` VALUES ('126', 'Udaondo  (Ituzaingó)', 's', '168');
INSERT INTO `lugar_residencia` VALUES ('127', 'Trujui  (Moreno)', 's', '169');
INSERT INTO `lugar_residencia` VALUES ('128', 'Paso del Rey  (Moreno)', 's', '170');
INSERT INTO `lugar_residencia` VALUES ('129', 'Moreno  (Moreno)', 's', '171');
INSERT INTO `lugar_residencia` VALUES ('130', 'La Reja  (Moreno)', 's', '172');
INSERT INTO `lugar_residencia` VALUES ('131', 'Francisco Álvarez  (Moreno)', 's', '173');
INSERT INTO `lugar_residencia` VALUES ('132', 'Cuartel V  (Moreno)', 's', '174');
INSERT INTO `lugar_residencia` VALUES ('133', 'Merlo  (Merlo)', 's', '175');
INSERT INTO `lugar_residencia` VALUES ('134', 'San Antonio de Padua  (Merlo)', 's', '176');
INSERT INTO `lugar_residencia` VALUES ('135', 'Libertad  (Merlo)', 's', '177');
INSERT INTO `lugar_residencia` VALUES ('136', 'Parque San Martín  (Merlo)', 's', '178');
INSERT INTO `lugar_residencia` VALUES ('137', 'Mariano Acosta  (Merlo)', 's', '179');
INSERT INTO `lugar_residencia` VALUES ('138', 'Pontevedra  (Merlo)', 's', '180');
INSERT INTO `lugar_residencia` VALUES ('139', 'Ramos Mejía  (La Matanza)', 's', '181');
INSERT INTO `lugar_residencia` VALUES ('140', 'Lomas del Mirador  (La Matanza)', 's', '182');
INSERT INTO `lugar_residencia` VALUES ('141', 'La Tablada  (La Matanza)', 's', '183');
INSERT INTO `lugar_residencia` VALUES ('142', 'Villa Madero  (La Matanza)', 's', '184');
INSERT INTO `lugar_residencia` VALUES ('143', 'Tapiales  (La Matanza)', 's', '185');
INSERT INTO `lugar_residencia` VALUES ('144', 'Aldo Bonzi  (La Matanza)', 's', '186');
INSERT INTO `lugar_residencia` VALUES ('145', 'San Justo  (La Matanza)', 's', '187');
INSERT INTO `lugar_residencia` VALUES ('146', 'Villa Luzuriaga  (La Matanza)', 's', '188');
INSERT INTO `lugar_residencia` VALUES ('147', 'Isidro Casanova  (La Matanza)', 's', '189');
INSERT INTO `lugar_residencia` VALUES ('148', 'Ciudad Evita  (La Matanza)', 's', '190');
INSERT INTO `lugar_residencia` VALUES ('149', 'Gregorio de Laferrere  (La Matanza)', 's', '191');
INSERT INTO `lugar_residencia` VALUES ('150', 'Rafael Castillo  (La Matanza)', 's', '192');
INSERT INTO `lugar_residencia` VALUES ('151', 'González Catán  (La Matanza)', 's', '193');
INSERT INTO `lugar_residencia` VALUES ('152', 'Virrey del Pino  (La Matanza)', 's', '194');
INSERT INTO `lugar_residencia` VALUES ('153', '20 de Junio  (La Matanza)', 's', '195');
INSERT INTO `lugar_residencia` VALUES ('154', 'Dock Sud  (Avellaneda)', 's', '196');
INSERT INTO `lugar_residencia` VALUES ('155', 'Avellaneda  (Avellaneda)', 's', '197');
INSERT INTO `lugar_residencia` VALUES ('156', 'Piñeyro  (Avellaneda)', 's', '198');
INSERT INTO `lugar_residencia` VALUES ('157', 'Gerli  (Avellaneda)', 's', '199');
INSERT INTO `lugar_residencia` VALUES ('158', 'Crucecita  (Avellaneda)', 's', '200');
INSERT INTO `lugar_residencia` VALUES ('159', 'Sarandí  (Avellaneda)', 's', '201');
INSERT INTO `lugar_residencia` VALUES ('160', 'Zona de Reserva  (Avellaneda)', 's', '202');
INSERT INTO `lugar_residencia` VALUES ('161', 'Villa Domínico  (Avellaneda)', 's', '203');
INSERT INTO `lugar_residencia` VALUES ('162', 'Wilde  (Avellaneda)', 's', '204');
INSERT INTO `lugar_residencia` VALUES ('163', 'Valentín Alsina  (Lanús)', 's', '205');
INSERT INTO `lugar_residencia` VALUES ('164', 'Lanús Oeste  (Lanús)', 's', '206');
INSERT INTO `lugar_residencia` VALUES ('165', 'Gerli  (Lanús)', 's', '207');
INSERT INTO `lugar_residencia` VALUES ('166', 'Lanús  (Lanús)', 's', '208');
INSERT INTO `lugar_residencia` VALUES ('167', 'Remedios de Escalada  (Lanús)', 's', '209');
INSERT INTO `lugar_residencia` VALUES ('168', 'Monte Chingolo  (Lanús)', 's', '210');
INSERT INTO `lugar_residencia` VALUES ('169', 'Villa Fiorito  (Lomas de Zamora)', 's', '211');
INSERT INTO `lugar_residencia` VALUES ('170', 'Ingeniero Budge  (Lomas de Zamora)', 's', '212');
INSERT INTO `lugar_residencia` VALUES ('171', 'Villa Centenario  (Lomas de Zamora)', 's', '213');
INSERT INTO `lugar_residencia` VALUES ('172', 'Banfield  (Lomas de Zamora)', 's', '214');
INSERT INTO `lugar_residencia` VALUES ('173', 'Lomas de Zamora  (Lomas de Zamora)', 's', '215');
INSERT INTO `lugar_residencia` VALUES ('174', 'Temperley  (Lomas de Zamora)', 's', '216');
INSERT INTO `lugar_residencia` VALUES ('175', 'Turdera  (Lomas de Zamora)', 's', '217');
INSERT INTO `lugar_residencia` VALUES ('176', 'Llavallol  (Lomas de Zamora)', 's', '218');
INSERT INTO `lugar_residencia` VALUES ('177', 'Don Bosco  (Quilmes)', 's', '219');
INSERT INTO `lugar_residencia` VALUES ('178', 'Bernal Oeste  (Quilmes)', 's', '220');
INSERT INTO `lugar_residencia` VALUES ('179', 'Bernal  (Quilmes)', 's', '221');
INSERT INTO `lugar_residencia` VALUES ('180', 'Quilmes  (Quilmes)', 's', '222');
INSERT INTO `lugar_residencia` VALUES ('181', 'Quilmes Oeste  (Quilmes)', 's', '223');
INSERT INTO `lugar_residencia` VALUES ('182', 'Ezpeleta  (Quilmes)', 's', '224');
INSERT INTO `lugar_residencia` VALUES ('183', 'Ezpeleta Oeste  (Quilmes)', 's', '225');
INSERT INTO `lugar_residencia` VALUES ('184', 'Villa La Florida  (Quilmes)', 's', '226');
INSERT INTO `lugar_residencia` VALUES ('185', 'San Francisco Solano  (Quilmes)', 's', '227');
INSERT INTO `lugar_residencia` VALUES ('186', 'San José  (Almirante Brown)', 's', '228');
INSERT INTO `lugar_residencia` VALUES ('187', 'José Marmol  (Almirante Brown)', 's', '229');
INSERT INTO `lugar_residencia` VALUES ('188', 'Rafael Calzada  (Almirante Brown)', 's', '230');
INSERT INTO `lugar_residencia` VALUES ('189', 'San Francisco Solano  (Almirante Brown)', 's', '231');
INSERT INTO `lugar_residencia` VALUES ('190', 'Claypole  (Almirante Brown)', 's', '232');
INSERT INTO `lugar_residencia` VALUES ('191', 'Adrogué  (Almirante Brown)', 's', '233');
INSERT INTO `lugar_residencia` VALUES ('192', 'Burzaco  (Almirante Brown)', 's', '234');
INSERT INTO `lugar_residencia` VALUES ('193', 'Malvinas Argentinas  (Almirante Brown)', 's', '235');
INSERT INTO `lugar_residencia` VALUES ('194', 'Don Orione  (Almirante Brown)', 's', '236');
INSERT INTO `lugar_residencia` VALUES ('195', 'Longchamps  (Almirante Brown)', 's', '237');
INSERT INTO `lugar_residencia` VALUES ('196', 'Glew  (Almirante Brown)', 's', '238');
INSERT INTO `lugar_residencia` VALUES ('197', 'Ministro Rivadavia  (Almirante Brown)', 's', '239');
INSERT INTO `lugar_residencia` VALUES ('198', '9 de Abril  (Esteban Echeverría)', 's', '240');
INSERT INTO `lugar_residencia` VALUES ('199', 'Zona de Reserva  (Esteban Echeverría)', 's', '241');
INSERT INTO `lugar_residencia` VALUES ('200', 'Luis Guillón  (Esteban Echeverría)', 's', '242');
INSERT INTO `lugar_residencia` VALUES ('201', 'Monte Grande  (Esteban Echeverría)', 's', '243');
INSERT INTO `lugar_residencia` VALUES ('202', 'El Jagüel  (Esteban Echeverría)', 's', '244');
INSERT INTO `lugar_residencia` VALUES ('203', 'Canning  (Esteban Echeverría)', 's', '245');
INSERT INTO `lugar_residencia` VALUES ('204', 'Esteban Echeverría  (Esteban Echeverría)', 's', '246');
INSERT INTO `lugar_residencia` VALUES ('205', 'Zona de Reserva  (Esteban Echeverría)', 's', '247');
INSERT INTO `lugar_residencia` VALUES ('206', 'José María Ezeiza  (Ezeiza)', 's', '248');
INSERT INTO `lugar_residencia` VALUES ('207', 'La Unión  (Ezeiza)', 's', '249');
INSERT INTO `lugar_residencia` VALUES ('208', 'Tristán Suárez  (Ezeiza)', 's', '250');
INSERT INTO `lugar_residencia` VALUES ('209', 'Canning  (Ezeiza)', 's', '251');
INSERT INTO `lugar_residencia` VALUES ('210', 'Carlos Spegazzini  (Ezeiza)', 's', '252');
INSERT INTO `lugar_residencia` VALUES ('211', 'Berazategui  (Berazategui)', 's', '253');
INSERT INTO `lugar_residencia` VALUES ('212', 'Berazategui Oeste  (Berazategui)', 's', '254');
INSERT INTO `lugar_residencia` VALUES ('213', 'Villa España  (Berazategui)', 's', '255');
INSERT INTO `lugar_residencia` VALUES ('214', 'Sourigues  (Berazategui)', 's', '256');
INSERT INTO `lugar_residencia` VALUES ('215', 'Ranelagh  (Berazategui)', 's', '257');
INSERT INTO `lugar_residencia` VALUES ('216', 'Plátanos  (Berazategui)', 's', '258');
INSERT INTO `lugar_residencia` VALUES ('217', 'Guillermo Hudson  (Berazategui)', 's', '259');
INSERT INTO `lugar_residencia` VALUES ('218', 'Juan María Gutiérrez  (Berazategui)', 's', '260');
INSERT INTO `lugar_residencia` VALUES ('219', 'El Pato  (Berazategui)', 's', '261');
INSERT INTO `lugar_residencia` VALUES ('220', 'Pereyra  (Berazategui)', 's', '262');
INSERT INTO `lugar_residencia` VALUES ('221', 'Zona de Reserva  (Berazategui)', 's', '263');
INSERT INTO `lugar_residencia` VALUES ('222', 'Florencio Varela  (Florencio Varela)', 's', '264');
INSERT INTO `lugar_residencia` VALUES ('223', 'Gobernador Costa  (Florencio Varela)', 's', '265');
INSERT INTO `lugar_residencia` VALUES ('224', 'Zeballos  (Florencio Varela)', 's', '266');
INSERT INTO `lugar_residencia` VALUES ('225', 'Villa Vatteone  (Florencio Varela)', 's', '267');
INSERT INTO `lugar_residencia` VALUES ('226', 'Santa Rosa  (Florencio Varela)', 's', '268');
INSERT INTO `lugar_residencia` VALUES ('227', 'Bosques  (Florencio Varela)', 's', '269');
INSERT INTO `lugar_residencia` VALUES ('228', 'Villa San Luis  (Florencio Varela)', 's', '270');
INSERT INTO `lugar_residencia` VALUES ('229', 'Villa Brown  (Florencio Varela)', 's', '271');
INSERT INTO `lugar_residencia` VALUES ('230', 'Ingeniero Allan  (Florencio Varela)', 's', '272');
INSERT INTO `lugar_residencia` VALUES ('231', 'La Capilla  (Florencio Varela)', 's', '273');
INSERT INTO `lugar_residencia` VALUES ('232', 'Resto Provincia de Buenos Aires', 's', '274');
INSERT INTO `lugar_residencia` VALUES ('233', 'Catamarca', 's', '275');
INSERT INTO `lugar_residencia` VALUES ('234', 'Chaco', 's', '276');
INSERT INTO `lugar_residencia` VALUES ('235', 'Chubut', 's', '277');
INSERT INTO `lugar_residencia` VALUES ('236', 'Córdoba', 's', '278');
INSERT INTO `lugar_residencia` VALUES ('237', 'Corrientes', 's', '279');
INSERT INTO `lugar_residencia` VALUES ('238', 'Entre Ríos', 's', '280');
INSERT INTO `lugar_residencia` VALUES ('239', 'Formosa', 's', '281');
INSERT INTO `lugar_residencia` VALUES ('240', 'Jujuy', 's', '282');
INSERT INTO `lugar_residencia` VALUES ('241', 'La Pampa', 's', '283');
INSERT INTO `lugar_residencia` VALUES ('242', 'La Rioja', 's', '284');
INSERT INTO `lugar_residencia` VALUES ('243', 'Mendoza', 's', '285');
INSERT INTO `lugar_residencia` VALUES ('244', 'Misiones', 's', '286');
INSERT INTO `lugar_residencia` VALUES ('245', 'Neuquén', 's', '287');
INSERT INTO `lugar_residencia` VALUES ('246', 'Río Negro', 's', '288');
INSERT INTO `lugar_residencia` VALUES ('247', 'Salta', 's', '289');
INSERT INTO `lugar_residencia` VALUES ('248', 'San Juan', 's', '290');
INSERT INTO `lugar_residencia` VALUES ('249', 'San Luis', 's', '291');
INSERT INTO `lugar_residencia` VALUES ('250', 'Santa Cruz', 's', '292');
INSERT INTO `lugar_residencia` VALUES ('251', 'Santa Fe', 's', '293');
INSERT INTO `lugar_residencia` VALUES ('252', 'Santiago del Estero', 's', '294');
INSERT INTO `lugar_residencia` VALUES ('253', 'Tierra del Fuego', 's', '295');
INSERT INTO `lugar_residencia` VALUES ('254', 'Tucumán', 's', '296');
INSERT INTO `lugar_residencia` VALUES ('255', 'Pilar (Pilar)', 's', '297');
INSERT INTO `lugar_residencia` VALUES ('256', 'Escobar', 's', '298');
INSERT INTO `lugar_residencia` VALUES ('257', 'Nuñez', 'n', '299');
INSERT INTO `lugar_residencia` VALUES ('258', 'Lanús Oeste', 'n', '300');
INSERT INTO `lugar_residencia` VALUES ('259', 'Lanúes Este', 's', '301');
INSERT INTO `lugar_residencia` VALUES ('260', 'CABA - Retiro (C 1) - Villa 31 BP', 's', '53');
INSERT INTO `lugar_residencia` VALUES ('261', 'CABA - Retiro (C 1) - Barrio Gral. San Martín BP', 's', '52');
INSERT INTO `lugar_residencia` VALUES ('262', 'CABA - Retiro (C 1) - Villa 31 bis BP', 's', '54');
INSERT INTO `lugar_residencia` VALUES ('263', 'CABA - Puerto Madero (C 1) - Rodrigo Bueno BP', 's', '48');
INSERT INTO `lugar_residencia` VALUES ('264', 'CABA - Recoleta (C 2) - Saldias BP', 's', '50');
INSERT INTO `lugar_residencia` VALUES ('265', 'CABA - Barracas (C 4) - Pedro de Mendoza y Villarino BP', 's', '5');
INSERT INTO `lugar_residencia` VALUES ('266', 'CABA - Barracas (C 4) - Zavaleta BP', 's', '6');
INSERT INTO `lugar_residencia` VALUES ('267', 'CABA - Barracas (C 4) - Villa 21-24 BP', 's', '7');
INSERT INTO `lugar_residencia` VALUES ('268', 'CABA - Barracas (C 4) - Villa 26 BP', 's', '8');
INSERT INTO `lugar_residencia` VALUES ('269', 'CABA - Barracas (C 4) - Puente Barracas BP', 's', '9');
INSERT INTO `lugar_residencia` VALUES ('270', 'CABA - Barracas (C 4) - Luja 2364 BP', 's', '10');
INSERT INTO `lugar_residencia` VALUES ('271', 'CABA - Nueva Pompeya (C 4) - El Pueblito BP', 's', '32');
INSERT INTO `lugar_residencia` VALUES ('272', 'CABA - Nueva Pompeya (C 4) - El Campito BP', 's', '33');
INSERT INTO `lugar_residencia` VALUES ('273', 'CABA - Nueva Pompeya (C 4) - Agustin de Vedia BP', 's', '34');
INSERT INTO `lugar_residencia` VALUES ('274', 'CABA - Nueva Pompeya (C 4) - Matanza y Ferre BP', 's', '35');
INSERT INTO `lugar_residencia` VALUES ('275', 'CABA - Caballito (C 6) - Playón de Caballito BP', 's', '15');
INSERT INTO `lugar_residencia` VALUES ('276', 'CABA - Flores (C 7) - Villa 13 bis BP', 's', '22');
INSERT INTO `lugar_residencia` VALUES ('277', 'CABA - Flores (C 7) - Villa 1-11-14 BP', 's', '23');
INSERT INTO `lugar_residencia` VALUES ('278', 'CABA - Villa Lugano (C 8) - Barrio Obrero BP', 's', '66');
INSERT INTO `lugar_residencia` VALUES ('279', 'CABA - Villa Lugano (C 8) - Barrio Inta BP', 's', '67');
INSERT INTO `lugar_residencia` VALUES ('280', 'CABA - Villa Lugano (C 8) - Villa 15 BP', 's', '68');
INSERT INTO `lugar_residencia` VALUES ('281', 'CABA - Villa Lugano (C 8) - Pirelli BP', 's', '69');
INSERT INTO `lugar_residencia` VALUES ('282', 'CABA - Villa Lugano (C 8) - Scapino BP', 's', '70');
INSERT INTO `lugar_residencia` VALUES ('283', 'CABA - Villa Lugano (C 8) - María Auxiliadora BP', 's', '71');
INSERT INTO `lugar_residencia` VALUES ('284', 'CABA - Villa Lugano (C 8) - Villa 20 BP', 's', '72');
INSERT INTO `lugar_residencia` VALUES ('285', 'CABA - Villa Lugano (C 8) - Bermejo BP', 's', '73');
INSERT INTO `lugar_residencia` VALUES ('286', 'CABA - Villa Lugano (C 8) - NHT del Trabajo BP', 's', '74');
INSERT INTO `lugar_residencia` VALUES ('287', 'CABA - Villa Lugano (C 8) - Santander BP', 's', '75');
INSERT INTO `lugar_residencia` VALUES ('288', 'CABA - Villa Soldati (C 8) - Calacita BP', 's', '84');
INSERT INTO `lugar_residencia` VALUES ('289', 'CABA - Villa Soldati (C 8) - Los Piletones BP', 's', '85');
INSERT INTO `lugar_residencia` VALUES ('290', 'CABA - Villa Soldati (C 8) - La Esperanza BP', 's', '86');
INSERT INTO `lugar_residencia` VALUES ('291', 'CABA - Villa Soldati (C 8) - Barrio Fátima BP', 's', '87');
INSERT INTO `lugar_residencia` VALUES ('292', 'CABA - Villa Soldati (C 8) - Los Pinos BP', 's', '88');
INSERT INTO `lugar_residencia` VALUES ('293', 'CABA - Villa Soldati (C 8) - Ramon Carrillo BP', 's', '89');
INSERT INTO `lugar_residencia` VALUES ('294', 'CABA - Villa Riachuelo (C 8) - Emaus BP', 's', '81');
INSERT INTO `lugar_residencia` VALUES ('295', 'CABA - Parque Avellaneda (C 9) - Lacarra BP', 's', '41');
INSERT INTO `lugar_residencia` VALUES ('296', 'CABA - Parque Avellaneda (C 9) - Cildañez BP', 's', '42');
INSERT INTO `lugar_residencia` VALUES ('297', 'CABA - Parque Avellaneda (C 9) - Nuestro Barrio BP', 's', '43');
INSERT INTO `lugar_residencia` VALUES ('298', 'CABA - Palermo (C 14) - El Ombú BP', 's', '38');
INSERT INTO `lugar_residencia` VALUES ('299', 'CABA - Chacarita (C 15) - Playón de Chacarita BP', 's', '16');
INSERT INTO `lugar_residencia` VALUES ('300', 'CABA - Chacarita (C 15) - Jorge Newbery BP', 's', '17');
INSERT INTO `lugar_residencia` VALUES ('301', 'CABA - Palermo (C 14) - La Carbonilla BP', 's', '39');
INSERT INTO `lugar_residencia` VALUES ('302', 'La Matanza', 's', '302');
INSERT INTO `lugar_residencia` VALUES ('303', 'Villa Celina (La Matanza)', 's', '303');
INSERT INTO `lugar_residencia` VALUES ('304', 'La Plata - PBA', 's', '304');

-- ----------------------------
-- Table structure for `medidas_proteccion`
-- ----------------------------
DROP TABLE IF EXISTS `medidas_proteccion`;
CREATE TABLE `medidas_proteccion` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of medidas_proteccion
-- ----------------------------
INSERT INTO `medidas_proteccion` VALUES ('1', 'Restricción Perimetral', 's', '1');
INSERT INTO `medidas_proteccion` VALUES ('2', 'Exclusión de Hogar', 's', '2');
INSERT INTO `medidas_proteccion` VALUES ('3', 'Botón Anti pánico', 's', '3');
INSERT INTO `medidas_proteccion` VALUES ('4', 'Tobillera Electrónica', 's', '4');
INSERT INTO `medidas_proteccion` VALUES ('5', 'Restitución de Hijes', 's', '5');
INSERT INTO `medidas_proteccion` VALUES ('6', 'Recupero de Pertenencias', 's', '6');
INSERT INTO `medidas_proteccion` VALUES ('7', 'Alimentos Provisorios', 's', '7');
INSERT INTO `medidas_proteccion` VALUES ('8', 'Régimen de Comunicación', 's', '8');
INSERT INTO `medidas_proteccion` VALUES ('9', 'Cese en Actos de Perturbación', 's', '9');
INSERT INTO `medidas_proteccion` VALUES ('10', 'Consigna Policial', 's', '10');
INSERT INTO `medidas_proteccion` VALUES ('11', 'Otro', 's', '11');

-- ----------------------------
-- Table structure for `modalidad_violencia`
-- ----------------------------
DROP TABLE IF EXISTS `modalidad_violencia`;
CREATE TABLE `modalidad_violencia` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modalidad_violencia
-- ----------------------------
INSERT INTO `modalidad_violencia` VALUES ('1', 'Violencia Doméstica', 's', '1');
INSERT INTO `modalidad_violencia` VALUES ('2', 'Violencia Institucional', 's', '2');
INSERT INTO `modalidad_violencia` VALUES ('3', 'Violencia Laboral', 's', '3');
INSERT INTO `modalidad_violencia` VALUES ('4', 'Violencia C/ Libertad Reprod.', 's', '4');
INSERT INTO `modalidad_violencia` VALUES ('5', 'Violencia Obstétrica', 's', '5');
INSERT INTO `modalidad_violencia` VALUES ('6', 'Violencia Mediática', 's', '6');
INSERT INTO `modalidad_violencia` VALUES ('7', 'Acoso Sexual Callejero', 's', '7');
INSERT INTO `modalidad_violencia` VALUES ('8', 'CiberAcoso', 's', '9');
INSERT INTO `modalidad_violencia` VALUES ('9', 'Femicidio', 's', '11');
INSERT INTO `modalidad_violencia` VALUES ('10', 'Trata de Personas', 's', '12');
INSERT INTO `modalidad_violencia` VALUES ('11', 'Delitos C/ Integridad Sexual', 's', '10');
INSERT INTO `modalidad_violencia` VALUES ('12', 'Desaparición de Persona', 's', '13');
INSERT INTO `modalidad_violencia` VALUES ('13', 'Violencia Pública-Política', 's', '8');
INSERT INTO `modalidad_violencia` VALUES ('14', 'Agresiones por parte de terceros', 's', '14');

-- ----------------------------
-- Table structure for `motivo_consulta`
-- ----------------------------
DROP TABLE IF EXISTS `motivo_consulta`;
CREATE TABLE `motivo_consulta` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `formulario` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of motivo_consulta
-- ----------------------------
INSERT INTO `motivo_consulta` VALUES ('1', 'Violencia de Género', 'B');
INSERT INTO `motivo_consulta` VALUES ('2', 'Otras Problemáticas Mujer', 'C');
INSERT INTO `motivo_consulta` VALUES ('3', 'Maltrato', 'D');
INSERT INTO `motivo_consulta` VALUES ('4', 'Varios', 'E');
INSERT INTO `motivo_consulta` VALUES ('5', 'Emergencia', 'F');

-- ----------------------------
-- Table structure for `motivo_problematica`
-- ----------------------------
DROP TABLE IF EXISTS `motivo_problematica`;
CREATE TABLE `motivo_problematica` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of motivo_problematica
-- ----------------------------
INSERT INTO `motivo_problematica` VALUES ('1', 'Consultas Legales', 's', '3');
INSERT INTO `motivo_problematica` VALUES ('2', 'Violencia IntraFamiliar', 's', '1');
INSERT INTO `motivo_problematica` VALUES ('3', 'Demandas Sociales', 's', '4');
INSERT INTO `motivo_problematica` VALUES ('4', 'Confl. Vecinales no x Género', 's', '2');
INSERT INTO `motivo_problematica` VALUES ('5', 'Salud Mental', 's', '5');
INSERT INTO `motivo_problematica` VALUES ('6', 'Discriminación', 's', '6');
INSERT INTO `motivo_problematica` VALUES ('7', 'Ideas suicidas', 's', '7');
INSERT INTO `motivo_problematica` VALUES ('8', 'Acoso laboral', 'n', '9');
INSERT INTO `motivo_problematica` VALUES ('10', 'Violencia Laboral', 'n', '10');
INSERT INTO `motivo_problematica` VALUES ('11', 'Violencia Mediática', 'n', '11');
INSERT INTO `motivo_problematica` VALUES ('12', 'Violencia Institucional', 'n', '12');
INSERT INTO `motivo_problematica` VALUES ('13', 'Situaciones de Violencia no por género', 's', '8');

-- ----------------------------
-- Table structure for `motivo_varios`
-- ----------------------------
DROP TABLE IF EXISTS `motivo_varios`;
CREATE TABLE `motivo_varios` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of motivo_varios
-- ----------------------------
INSERT INTO `motivo_varios` VALUES ('1', 'Derivación al 147', 's', '3');
INSERT INTO `motivo_varios` VALUES ('5', 'Consulta por Varones Agresores', 's', '5');
INSERT INTO `motivo_varios` VALUES ('6', 'Pedido Capacitación', 'n', '10');
INSERT INTO `motivo_varios` VALUES ('7', 'Llamada Laboral Interna', 's', '8');
INSERT INTO `motivo_varios` VALUES ('8', 'Llamada Interrumpida', 's', '4');
INSERT INTO `motivo_varios` VALUES ('9', 'Llamada de Prensa', 's', '9');
INSERT INTO `motivo_varios` VALUES ('10', 'Derivación FPIO', 's', '8');
INSERT INTO `motivo_varios` VALUES ('11', 'No Corresponde', 's', '12');
INSERT INTO `motivo_varios` VALUES ('12', 'Derivación Prov. BsAS', 's', '2');
INSERT INTO `motivo_varios` VALUES ('13', 'Derivación Nación', 's', '1');
INSERT INTO `motivo_varios` VALUES ('14', 'Información Servicios', 's', '11');
INSERT INTO `motivo_varios` VALUES ('15', 'Ley Brisa', 's', '6');

-- ----------------------------
-- Table structure for `nacionalidad`
-- ----------------------------
DROP TABLE IF EXISTS `nacionalidad`;
CREATE TABLE `nacionalidad` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nacionalidad
-- ----------------------------
INSERT INTO `nacionalidad` VALUES ('1', 'Argentina', 's', '1');
INSERT INTO `nacionalidad` VALUES ('2', 'Brasil', 's', '2');
INSERT INTO `nacionalidad` VALUES ('3', 'Perú', 's', '3');
INSERT INTO `nacionalidad` VALUES ('4', 'Paraguay', 's', '4');
INSERT INTO `nacionalidad` VALUES ('5', 'Uruguay', 's', '5');
INSERT INTO `nacionalidad` VALUES ('6', 'Bolivia', 's', '6');
INSERT INTO `nacionalidad` VALUES ('7', 'Chile', 's', '7');
INSERT INTO `nacionalidad` VALUES ('8', 'Venezuela', 's', '8');
INSERT INTO `nacionalidad` VALUES ('9', 'Colombia', 's', '9');
INSERT INTO `nacionalidad` VALUES ('10', 'Otro', 's', '10');

-- ----------------------------
-- Table structure for `origen_llamado`
-- ----------------------------
DROP TABLE IF EXISTS `origen_llamado`;
CREATE TABLE `origen_llamado` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `origen` varchar(10) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of origen_llamado
-- ----------------------------
INSERT INTO `origen_llamado` VALUES ('1', '0800', 's', '1');
INSERT INTO `origen_llamado` VALUES ('2', '144', 's', '2');
INSERT INTO `origen_llamado` VALUES ('3', '911', 's', '3');
INSERT INTO `origen_llamado` VALUES ('4', 'NoDefinido', 's', '4');
INSERT INTO `origen_llamado` VALUES ('5', 'BOTI', 's', '5');
INSERT INTO `origen_llamado` VALUES ('6', 'SMS Acoso', 's', '6');

-- ----------------------------
-- Table structure for `requerimiento`
-- ----------------------------
DROP TABLE IF EXISTS `requerimiento`;
CREATE TABLE `requerimiento` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requerimiento
-- ----------------------------
INSERT INTO `requerimiento` VALUES ('1', 'Móvil Policial (911)', 's', '1');
INSERT INTO `requerimiento` VALUES ('2', 'SAME (107)', 's', '2');
INSERT INTO `requerimiento` VALUES ('3', '137', 's', '3');
INSERT INTO `requerimiento` VALUES ('4', 'Bomberos (101)', 's', '4');
INSERT INTO `requerimiento` VALUES ('5', 'Defensa Civil (103)', 's', '5');

-- ----------------------------
-- Table structure for `situacion_conyugal`
-- ----------------------------
DROP TABLE IF EXISTS `situacion_conyugal`;
CREATE TABLE `situacion_conyugal` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of situacion_conyugal
-- ----------------------------
INSERT INTO `situacion_conyugal` VALUES ('1', 'Soltera/o', 's', '1');
INSERT INTO `situacion_conyugal` VALUES ('2', 'Casada/o', 's', '2');
INSERT INTO `situacion_conyugal` VALUES ('3', 'Separada/o', 's', '3');
INSERT INTO `situacion_conyugal` VALUES ('4', 'Divorciada/o', 's', '4');
INSERT INTO `situacion_conyugal` VALUES ('5', 'Viuda/o', 's', '5');
INSERT INTO `situacion_conyugal` VALUES ('6', 'Unida/o de Hecho', 's', '6');
INSERT INTO `situacion_conyugal` VALUES ('7', 'Unión Civil', 's', '7');

-- ----------------------------
-- Table structure for `tenencia_vivienda`
-- ----------------------------
DROP TABLE IF EXISTS `tenencia_vivienda`;
CREATE TABLE `tenencia_vivienda` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tenencia_vivienda
-- ----------------------------
INSERT INTO `tenencia_vivienda` VALUES ('1', 'Propia', 's', '1');
INSERT INTO `tenencia_vivienda` VALUES ('2', 'Propia Conyugal', 's', '2');
INSERT INTO `tenencia_vivienda` VALUES ('3', 'Propia Agresor/a', 's', '3');
INSERT INTO `tenencia_vivienda` VALUES ('4', 'Alquilada', 's', '4');
INSERT INTO `tenencia_vivienda` VALUES ('5', 'Prestada', 's', '5');
INSERT INTO `tenencia_vivienda` VALUES ('6', 'Ocupada de Hecho', 's', '6');

-- ----------------------------
-- Table structure for `tipo_maltrato`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_maltrato`;
CREATE TABLE `tipo_maltrato` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_maltrato
-- ----------------------------
INSERT INTO `tipo_maltrato` VALUES ('1', 'Testigo de Violencia', 's', '1');
INSERT INTO `tipo_maltrato` VALUES ('2', 'Emocional', 's', '2');
INSERT INTO `tipo_maltrato` VALUES ('3', 'Físico', 's', '3');
INSERT INTO `tipo_maltrato` VALUES ('4', 'Sexual', 's', '4');
INSERT INTO `tipo_maltrato` VALUES ('5', 'Trabajo Infantil', 's', '5');
INSERT INTO `tipo_maltrato` VALUES ('6', 'Negligencia', 's', '6');

-- ----------------------------
-- Table structure for `tipo_violencia`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_violencia`;
CREATE TABLE `tipo_violencia` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descr` varchar(30) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_violencia
-- ----------------------------
INSERT INTO `tipo_violencia` VALUES ('1', 'Física', 's', '1');
INSERT INTO `tipo_violencia` VALUES ('2', 'Psicológica', 's', '2');
INSERT INTO `tipo_violencia` VALUES ('3', 'Sexual', 's', '3');
INSERT INTO `tipo_violencia` VALUES ('4', 'Económica y patrimonial', 's', '4');
INSERT INTO `tipo_violencia` VALUES ('5', 'Simbólica', 's', '5');
INSERT INTO `tipo_violencia` VALUES ('6', 'Testigo de violencia', 's', '6');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(16) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `acceso` varchar(1) NOT NULL,
  `activo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'ale', '$2y$10$4mp6U6G5W1afG1lgkd1Ev.yg3G/VN0QLkpJ6HCdn76TsQJnYNk6u2', 'Alejandro Salerno', 'a', 's');
INSERT INTO `usuarios` VALUES ('14', 'administrador', '$2y$10$Br9JihNj3mTxlVFWeHSfgeK0VMca3T0S5Z8AorQVXUkNF51WhNij6', 'Administrador', 'a', 'n');
INSERT INTO `usuarios` VALUES ('15', 'supervisor', '$2y$10$1t8il5ds0G3rOyxClz16fer99ofrdKKdsRtjYUfpc7OL8hnBfi6wG', 'Supervisor', 's', 'n');
INSERT INTO `usuarios` VALUES ('20', '144mujer', '$2y$10$Qw96lU1DLbJasfjp0cmafuw8ula0HeTIb0oM0sKcbLfdKQ7ffbNJe', '144mujer', 'o', 'n');

-- ----------------------------
-- Table structure for `victima`
-- ----------------------------
DROP TABLE IF EXISTS `victima`;
CREATE TABLE `victima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `documento` varchar(11) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `altura` int(11) NOT NULL,
  `piso_dpto` varchar(15) NOT NULL,
  `tipo_telefono` varchar(15) NOT NULL,
  `numero_telefono` varchar(15) NOT NULL,
  `lugar_residencia_id` smallint(6) NOT NULL,
  `identidad_genero_id` tinyint(4) NOT NULL,
  `nivel_educativo` varchar(15) NOT NULL,
  `nacionalidad_id` tinyint(4) NOT NULL,
  `situacion_conyugal_id` tinyint(4) NOT NULL,
  `convive_agresor` varchar(2) NOT NULL,
  `convive_meses` smallint(6) NOT NULL,
  `tenencia_vivienda_id` tinyint(4) NOT NULL,
  `hijos` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19784 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of victima
-- ----------------------------

-- ----------------------------
-- Table structure for `victima_actividad`
-- ----------------------------
DROP TABLE IF EXISTS `victima_actividad`;
CREATE TABLE `victima_actividad` (
  `victima_id` int(11) NOT NULL,
  `nitem` tinyint(4) NOT NULL,
  `actividad_id` smallint(6) NOT NULL,
  PRIMARY KEY (`victima_id`,`nitem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of victima_actividad
-- ----------------------------

-- ----------------------------
-- Table structure for `vinculo_agresor`
-- ----------------------------
DROP TABLE IF EXISTS `vinculo_agresor`;
CREATE TABLE `vinculo_agresor` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `vinculo` varchar(20) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vinculo_agresor
-- ----------------------------
INSERT INTO `vinculo_agresor` VALUES ('1', 'Esposo', 's', '1');
INSERT INTO `vinculo_agresor` VALUES ('2', 'Unido de hecho', 's', '3');
INSERT INTO `vinculo_agresor` VALUES ('3', 'Ex Esposo', 's', '2');
INSERT INTO `vinculo_agresor` VALUES ('4', 'Ex Unido de Hecho', 's', '4');
INSERT INTO `vinculo_agresor` VALUES ('5', 'Novio', 's', '7');
INSERT INTO `vinculo_agresor` VALUES ('6', 'Madre', 's', '9');
INSERT INTO `vinculo_agresor` VALUES ('7', 'Padre', 's', '10');
INSERT INTO `vinculo_agresor` VALUES ('8', 'Yerno', 's', '11');
INSERT INTO `vinculo_agresor` VALUES ('9', 'Nuera', 's', '12');
INSERT INTO `vinculo_agresor` VALUES ('10', 'Hijo/a', 's', '13');
INSERT INTO `vinculo_agresor` VALUES ('11', 'Abuelo/a', 's', '14');
INSERT INTO `vinculo_agresor` VALUES ('12', 'Otro', 's', '16');
INSERT INTO `vinculo_agresor` VALUES ('13', 'Ex Novio', 's', '8');
INSERT INTO `vinculo_agresor` VALUES ('14', 'Pareja/No Especifica', 's', '5');
INSERT INTO `vinculo_agresor` VALUES ('15', 'Ex Pareja/NoEsp.', 's', '6');
INSERT INTO `vinculo_agresor` VALUES ('16', 'Vecino/Desconocido', 's', '15');

-- ----------------------------
-- Table structure for `vinculo_consultante`
-- ----------------------------
DROP TABLE IF EXISTS `vinculo_consultante`;
CREATE TABLE `vinculo_consultante` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `vinculo` varchar(20) NOT NULL,
  `activo` varchar(1) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vinculo_consultante
-- ----------------------------
INSERT INTO `vinculo_consultante` VALUES ('1', 'Pariente', 's', '1');
INSERT INTO `vinculo_consultante` VALUES ('2', 'Amiga/o', 's', '2');
INSERT INTO `vinculo_consultante` VALUES ('3', 'Vecina/o', 's', '3');
INSERT INTO `vinculo_consultante` VALUES ('4', 'Profesional', 's', '4');
INSERT INTO `vinculo_consultante` VALUES ('5', 'Institucional', 's', '5');
INSERT INTO `vinculo_consultante` VALUES ('6', 'Otro', 's', '6');
