SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `gerenciador_processos` ;
CREATE SCHEMA IF NOT EXISTS `gerenciador_processos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gerenciador_processos` ;

-- -----------------------------------------------------
-- Table `gerenciador_processos`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_processos`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_processos`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`idcategoria`)) 
ENGINE = InnoDB
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Default');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `gerenciador_processos`.`processo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_processos`.`processo` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_processos`.`processo` (
  `idprocesso` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL ,
  `descricao` VARCHAR(120) NOT NULL, 
  `versao` VARCHAR(6) NOT NULL, 
  `dd_modificado` DATETIME NOT NULL,
  `autor` VARCHAR(60) NOT NULL,
  `contador` INT NOT NULL,
  `path_config` VARCHAR(250) NOT NULL,
  `idcategoria_categoria` INT NOT NULL, 
  PRIMARY KEY (`idprocesso`),
  INDEX `processo_categoria_fk` (`idcategoria_categoria` ASC) ,
        CONSTRAINT `processo_categoria_fk`
        FOREIGN KEY (`idcategoria_categoria` )
        REFERENCES `gerenciador_processos`.`categoria` (`idcategoria` )
                   ON DELETE NO ACTION
                   ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
