/*
SQLyog Ultimate v8.55 
MySQL - 5.6.17 : Database - buriphp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`buriphp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `buriphp`;

/*Table structure for table `contato` */

DROP TABLE IF EXISTS `contato`;

CREATE TABLE `contato` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` smallint(1) NOT NULL COMMENT '1 - Masculino / 2 - Feminino',
  `cidade` varchar(255) COLLATE utf8_bin NOT NULL,
  `estado` char(2) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(25) COLLATE utf8_bin NOT NULL,
  `melhorHorario` varchar(255) COLLATE utf8_bin NOT NULL,
  `mensagem` text COLLATE utf8_bin NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `arquivoAnexo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `contato` */

insert  into `contato`(`id`,`nome`,`email`,`nascimento`,`sexo`,`cidade`,`estado`,`telefone`,`melhorHorario`,`mensagem`,`dataCadastro`,`arquivoAnexo`) values (1,'EDER MARTINS FRANCO','efranco23@gmail.com','2015-04-18',1,'PORT SAINT LUCIE','AM','7722038970','ManhÃ£,Tarde,Noite,Qualquer horÃ¡rio','adadasd','2015-04-18 17:31:46',NULL),(2,'Eder Martins Franco','efranco23@gmail.com','2015-04-25',1,'Manaus','RR','(92) 99999-9999','','dasad','2015-04-25 15:47:28',NULL),(3,'Eder Martins Franco','efranco23@gmail.com','1983-06-17',1,'Manaus','AM','(92) 99999-9999','ManhÃ£','fasfdf','2015-04-25 16:48:47','arquivo-usuario-25042015164841.jpg'),(4,'Eder Martins Franco','efranco23@gmail.com','1983-06-17',1,'Manaus','AM','(92) 99999-9999','Tarde,Qualquer horÃ¡rio','Teste','2015-04-25 17:08:47','arquivo-usuario-25042015170841.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
