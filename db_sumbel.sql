/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : db_sumbel

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-10-20 16:27:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_folder
-- ----------------------------
DROP TABLE IF EXISTS `tb_folder`;
CREATE TABLE `tb_folder` (
  `id_folder` int(11) NOT NULL AUTO_INCREMENT,
  `nama_folder` varchar(255) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_folder`),
  KEY `fk_folder_jenjang` (`id_jenjang`),
  CONSTRAINT `fk_folder_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_folder
-- ----------------------------

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
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `desc` longtext,
  `jen` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_materi`),
  KEY `fk_jur` (`id_jurusan`),
  KEY `fk_mapel` (`id_mapel`),
  KEY `fk_jenjang` (`id_jenjang`),
  CONSTRAINT `fk_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_jur` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jur` (`id_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_materi
-- ----------------------------

-- ----------------------------
-- View structure for sumbel
-- ----------------------------
DROP VIEW IF EXISTS `sumbel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `sumbel` AS SELECT
db_materi.id_materi,
db_materi.judul,
db_materi.`desc`,
db_materi.jen,
db_materi.kelas,
db_materi.id_jenjang,
tb_jenjang.ket,
db_materi.id_mapel,
db_mapel.nama_mapel,
db_materi.id_jurusan,
db_jur.nama_jur
FROM
db_materi
INNER JOIN db_jur ON db_materi.id_jurusan = db_jur.id_jurusan
INNER JOIN db_mapel ON db_materi.id_mapel = db_mapel.id_mapel
INNER JOIN tb_jenjang ON db_materi.id_jenjang = tb_jenjang.id_jenjang AND db_jur.jenjang_jur = tb_jenjang.id_jenjang ;
SET FOREIGN_KEY_CHECKS=1;
