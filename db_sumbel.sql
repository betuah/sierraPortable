/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : db_sumbel

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-11-13 15:24:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_folder
-- ----------------------------
DROP TABLE IF EXISTS `tb_folder`;
CREATE TABLE `tb_folder` (
  `id_folder` int(11) NOT NULL AUTO_INCREMENT,
  `nama_folder` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_folder`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_folder
-- ----------------------------
INSERT INTO `tb_folder` VALUES ('1', 'Video');
INSERT INTO `tb_folder` VALUES ('2', 'Buku');
INSERT INTO `tb_folder` VALUES ('3', 'Silabus dan RPP');
INSERT INTO `tb_folder` VALUES ('4', 'LOM');

-- ----------------------------
-- Table structure for tb_jenjang
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenjang`;
CREATE TABLE `tb_jenjang` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jenjang
-- ----------------------------
INSERT INTO `tb_jenjang` VALUES ('1', 'SMA');
INSERT INTO `tb_jenjang` VALUES ('2', 'SMK');

-- ----------------------------
-- Table structure for tb_jur
-- ----------------------------
DROP TABLE IF EXISTS `tb_jur`;
CREATE TABLE `tb_jur` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jur` varchar(255) DEFAULT NULL,
  `jenjang_jur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `fk_to_jenjang_jur` (`jenjang_jur`),
  CONSTRAINT `fk_to_jenjang_jur` FOREIGN KEY (`jenjang_jur`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jur
-- ----------------------------
INSERT INTO `tb_jur` VALUES ('1', 'IPA', '1');
INSERT INTO `tb_jur` VALUES ('2', 'IPS', '1');

-- ----------------------------
-- Table structure for tb_mapel
-- ----------------------------
DROP TABLE IF EXISTS `tb_mapel`;
CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) DEFAULT NULL,
  `nama_mapel` varchar(255) DEFAULT NULL,
  KEY `id_mapel` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_mapel
-- ----------------------------
INSERT INTO `tb_mapel` VALUES ('1', 'Matematika');
INSERT INTO `tb_mapel` VALUES ('2', 'Bahasa Indonesia');
INSERT INTO `tb_mapel` VALUES ('3', 'Bahasa Inggris');
INSERT INTO `tb_mapel` VALUES ('4', 'Fisika');

-- ----------------------------
-- Table structure for tb_materi
-- ----------------------------
DROP TABLE IF EXISTS `tb_materi`;
CREATE TABLE `tb_materi` (
  `id_materi` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `desc` longtext,
  `jen` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `folder` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_materi`),
  KEY `fk_jur` (`id_jurusan`),
  KEY `fk_mapel` (`id_mapel`),
  KEY `fk_jenjang` (`id_jenjang`),
  KEY `fk_folder` (`folder`),
  CONSTRAINT `fk_folder` FOREIGN KEY (`folder`) REFERENCES `tb_folder` (`id_folder`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_jur` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jur` (`id_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_materi
-- ----------------------------
INSERT INTO `tb_materi` VALUES ('00000000003', 'Testing asdasd asd asd asda s das dasda sdas dasdasd asd asd ', 'asdasdasd', 'document', 'K1', '1', '1', '1', 'content_1510217180.pdf', '2', '2017-Nov-0');

-- ----------------------------
-- View structure for v_content
-- ----------------------------
DROP VIEW IF EXISTS `v_content`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_content` AS SELECT
tb_materi.id_materi,
tb_materi.judul,
tb_materi.jen,
tb_materi.kelas,
tb_materi.id_jenjang,
tb_jenjang.ket,
tb_materi.id_mapel,
tb_mapel.nama_mapel,
tb_materi.id_jurusan,
tb_jur.nama_jur,
tb_materi.folder,
tb_folder.nama_folder,
tb_materi.date,
tb_materi.file
FROM
tb_materi
INNER JOIN tb_jenjang ON tb_materi.id_jenjang = tb_jenjang.id_jenjang
INNER JOIN tb_mapel ON tb_materi.id_mapel = tb_mapel.id_mapel
INNER JOIN tb_jur ON tb_jur.jenjang_jur = tb_jenjang.id_jenjang AND tb_materi.id_jurusan = tb_jur.id_jurusan
INNER JOIN tb_folder ON tb_materi.folder = tb_folder.id_folder ;

-- ----------------------------
-- View structure for v_jur
-- ----------------------------
DROP VIEW IF EXISTS `v_jur`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_jur` AS SELECT
tb_jur.id_jurusan,
tb_jur.nama_jur,
tb_jur.jenjang_jur,
tb_jenjang.ket
FROM
tb_jur
INNER JOIN tb_jenjang ON tb_jur.jenjang_jur = tb_jenjang.id_jenjang ;
SET FOREIGN_KEY_CHECKS=1;
