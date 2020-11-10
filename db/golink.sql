/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : golink

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 10/11/2020 14:46:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for historia
-- ----------------------------
DROP TABLE IF EXISTS `historia`;
CREATE TABLE `historia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IdApp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IdUser` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fecha`(`hora`) USING BTREE,
  INDEX `hora`(`hora`) USING BTREE,
  INDEX `IdUser`(`IdUser`) USING BTREE,
  INDEX `IdApp`(`IdApp`) USING BTREE,
  FULLTEXT INDEX `descripcion`(`Descripcion`)
) ENGINE = MyISAM AUTO_INCREMENT = 814 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of historia
-- ----------------------------
INSERT INTO `historia` VALUES (812, '2020-11-10', '14:09:30', 'Inicio de Sesion', 'LOGIN', 'admin');
INSERT INTO `historia` VALUES (813, '2020-11-10', '14:40:01', 'Inicio de Sesion', 'LOGIN', 'admin');

-- ----------------------------
-- Table structure for preferences
-- ----------------------------
DROP TABLE IF EXISTS `preferences`;
CREATE TABLE `preferences`  (
  `Preference` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `GroupA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Agrupacion para organizar 1',
  `GroupB` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Agrupacion para organizar 2',
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Preference`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of preferences
-- ----------------------------
INSERT INTO `preferences` VALUES ('Cliente', 'Nombre de tu Cliente', '', '', '');
INSERT INTO `preferences` VALUES ('ColorDeFondo', '#FBEBC6', '', '', '');
INSERT INTO `preferences` VALUES ('ColorPrincipal', '#529E3F', '', '', '');
INSERT INTO `preferences` VALUES ('ColorResaltado', '#EBBF1E', '', '', '');
INSERT INTO `preferences` VALUES ('ColorSecundario', '#F5D281', '', '', '');
INSERT INTO `preferences` VALUES ('CorreoAdministrador', 'printepolis@gmail.com', '', '', '');
INSERT INTO `preferences` VALUES ('Empresa', '', '', '', '');
INSERT INTO `preferences` VALUES ('LogoColorInverso', 'FALSE', '', '', '');
INSERT INTO `preferences` VALUES ('LogoImagePNG', 'TRUE', '', '', '');
INSERT INTO `preferences` VALUES ('LogoPDFWidth', '10', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-Footer', '<b style=color:#005BA0>Dpto. de Informatica | </b>.  Tel. 318-5516 Ext.: <b>46612</b>, <b>46524</b>, <b>46580</b>,  <b>46530</b>, <b>46516</b> y <b>46543</b>', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-Host', 'smtp.gmail.com', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-Password', '', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-Port', '587', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-SMTPSecure', 'tls', '', '', '');
INSERT INTO `preferences` VALUES ('Mail-Username', '', '', '', '');
INSERT INTO `preferences` VALUES ('MailSend', 'TRUE', '', '', '');
INSERT INTO `preferences` VALUES ('MostrarApps', 'TRUE', '', '', '');
INSERT INTO `preferences` VALUES ('NFile', '4', '', '', '');
INSERT INTO `preferences` VALUES ('NuevosReportes', 'FALSE', '', '', '');
INSERT INTO `preferences` VALUES ('PublicIndex', 'FALSE', '', '', '');
INSERT INTO `preferences` VALUES ('SearchVisualList', 'TRUE', '', '', '');
INSERT INTO `preferences` VALUES ('VisualLogo', 'TRUE', '', '', '');

-- ----------------------------
-- Table structure for transparenciago
-- ----------------------------
DROP TABLE IF EXISTS `transparenciago`;
CREATE TABLE `transparenciago`  (
  `IdFile` int(5) NOT NULL COMMENT 'Id del Archivo a Subir',
  `FileNombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre del Archivo Original',
  `IdUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Usuario que lo subio',
  `fecha` date NOT NULL COMMENT 'Fecha de Subida',
  `hora` time(6) NOT NULL COMMENT 'Hora de Subida',
  `FileDescripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Descripcion del Archivo',
  PRIMARY KEY (`IdFile`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transparenciago
-- ----------------------------
INSERT INTO `transparenciago` VALUES (1, 'C:fakepathisimple-free.zip', 'admin', '2020-11-10', '13:38:31.000000', 'test');
INSERT INTO `transparenciago` VALUES (2, 'C:fakepathisimple-free.zip', 'admin', '2020-11-10', '13:40:17.000000', 'asasdasd');
INSERT INTO `transparenciago` VALUES (3, 'C:fakepathisimple-free.zip', 'admin', '2020-11-10', '13:40:41.000000', 'asas');
INSERT INTO `transparenciago` VALUES (4, 'C:fakepathisimple-free.zip', 'admin', '2020-11-10', '13:51:13.000000', 'la descripcion');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `IdUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NIP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdUser`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('admin', 'Ing. Juan Jose Pedraza', 'admin');

-- ----------------------------
-- View structure for files
-- ----------------------------
DROP VIEW IF EXISTS `files`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `files` AS SELECT	
	CONCAT('<b>',IdFile, '</b> -',REPLACE ( FileNombre, 'C:fakepath', '../' ),'<br><cite>', FileDescripcion,'</cite>') as Descripcion,
	CONCAT('<button onclick="Copiar(',IdFile,')">','<img src="icon/copy.png" style="width:23px;">','</button>') as Link,
	fecha,
	hora,
	IdUser 
FROM
	transparenciago ;

SET FOREIGN_KEY_CHECKS = 1;
