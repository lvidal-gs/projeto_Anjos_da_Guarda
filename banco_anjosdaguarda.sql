-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: cadastro_cuidador
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) DEFAULT '3',
  `nome` varchar(220) NOT NULL,
  `sobrenome` varchar(220) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `sexo` enum('M','F','O','U') DEFAULT NULL,
  `nascimento` date NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `necessidade` int(11) DEFAULT '7',
  `cep` varchar(10) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(220) DEFAULT NULL,
  `bairro` varchar(220) DEFAULT NULL,
  `rua` varchar(220) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `comp` varchar(220) DEFAULT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  `descServ` varchar(400) DEFAULT 'Nada informado.',
  `descNece` varchar(400) DEFAULT 'Nada informado.',
  `descObs` varchar(400) DEFAULT 'Nada informado.',
  `created` date NOT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`),
  KEY `fk_nivel` (`nivel`),
  KEY `fk_nece` (`necessidade`),
  CONSTRAINT `fk_nece` FOREIGN KEY (`necessidade`) REFERENCES `necessidades` (`id_necessidade`),
  CONSTRAINT `fk_nivel` FOREIGN KEY (`nivel`) REFERENCES `níveis de acesso` (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,3,'Lucas','Vidal Gimenes dos Santos',43203782880,'M','2000-06-02','lucasvidal.gs@gmail.com','$2y$10$gcT1BS0hGOjfl9dHBhKl7uFiTCx1hdtbAShdty/FEkL7nMRixF29W',11111111111,1,'74805100','GO','GoiÃ¢nia','Jardim GoiÃ¡s','Avenida Fued JosÃ© Sebba','100','','a4be0d1b32624c9f914e578f5676f490.png','Nada informado.','Nada informado.','Nada informado.','2020-12-01','2020-12-06'),(2,3,'Jeferson','Geraldo Gimenes dos Santos',75170351267,'M','1975-07-03','jeffgimenes.tst@gmail.com','$2y$10$x2tS24HHy8I2qi6YK4womuIqtZQMDNP0i2pilTe.4JmSkzfq4OsD.',11989723335,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Nada informado.','Nada informado.','Nada informado.','2020-12-01',NULL),(3,3,'Lucas','Vidal Gimenes dos Santos',66349891090,'M','2000-06-02','lucasvidal.gs2@gmail.com','$2y$10$ERVMPd5FtNY.iIGhG3bec.oWxhzIOg3nFErq9y37H8T4zgXOVXVLa',26565265260,6,'04457100','SP','SÃ£o Paulo','Jardim Palmares (Zona Sul)','Rua Rafael Correia Sampaio','100','','6548a088b44aa2f085f20cc41ddd04c6.png','Nada informado.','Nada informado.','Nada informado.','2020-12-06','2020-12-06'),(4,3,'Alfredo','Sapiens',85398997017,'M','2000-06-02','lucasvidal.gs11@gmail.com','$2y$10$zszmUW5xKPZJ6fGhJF7Uv.fbybZB5JB/P.dEnotYV7uC40XMZlxQe',11989715547,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Nada informado.','Nada informado.','Nada informado.','2020-12-06',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuidador`
--

DROP TABLE IF EXISTS `cuidador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuidador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `sobrenome` varchar(220) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `sexo` enum('M','F','O','U') DEFAULT NULL,
  `nascimento` date NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  `resumo` varchar(50) DEFAULT NULL,
  `espec` int(11) DEFAULT '11',
  `zona` varchar(70) DEFAULT 'Nada informado',
  `site` varchar(120) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `instagram` varchar(120) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(220) DEFAULT NULL,
  `bairro` varchar(220) DEFAULT NULL,
  `rua` varchar(220) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `comp` varchar(220) DEFAULT NULL,
  `descSobre` varchar(400) DEFAULT 'Nada informado.',
  `descForm` varchar(400) DEFAULT 'Nada informado.',
  `descExp` varchar(400) DEFAULT 'Nada informado.',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `nivel` int(11) DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`),
  KEY `fk_espec` (`espec`),
  KEY `fk_nivel_cuid` (`nivel`),
  CONSTRAINT `fk_espec` FOREIGN KEY (`espec`) REFERENCES `especialidades` (`id_espec`),
  CONSTRAINT `fk_nivel_cuid` FOREIGN KEY (`nivel`) REFERENCES `níveis de acesso` (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuidador`
--

LOCK TABLES `cuidador` WRITE;
/*!40000 ALTER TABLE `cuidador` DISABLE KEYS */;
INSERT INTO `cuidador` VALUES (1,'Lucas','Vidal Gimenes dos Santos',43203782880,'M','2000-06-02','lucasvidal.gs@gmail.com','$2y$10$4SUm4X9MDWGd1jypl1ULsOM5IJ9DobqR79SVNsauTyr3td2Md7PwW',11989723334,'591b2ca86e111850c6544346dcc62121.png','Cuidador em ascensÃ£o',5,'Zona Sul de SÃ£o Paulo','http://www.fatecsp.br/','','','04457-100','SP','SÃ£o Paulo','Jardim Palmares (Zona Sul)','Rua Rafael Correia Sampaio','122d','','Nada informado.','Nada informado.','Nada informado.','2020-12-01','2020-12-10',2),(2,'Lucas','Andrade',18551931245,'M','1998-07-03','lucasvidal.gs1@gmail.com','$2y$10$e.FPZdVmn/HRXXXOos/kH.cq52FiM7jSTht8dfdzbdVxqYNWBhWMq',11111111111,'c0248ba1f628fc3cf1c7f97e1cec5817.jpg','Sou formado em enfermaria',1,'Parelheiros','','','','22041-001','RJ','Rio de Janeiro','Copacabana','Avenida AtlÃ¢ntica','12','Apto. nÂº3 ultimo andar','Nada informado.','Nada informado.','Nada informado.','2020-12-01','2020-12-06',2),(3,'Jeferson','Cabeca de caixa dagua',61873558813,'M','2000-06-02','lucasvidal.gs2@gmail.com','$2y$10$DT5e3RGwB1UzoXesqZktA.kUSTYwDBTLt29XgdFv8.W5B1zx.FKQ6',11111111112,'a2b2522440d922ce8f73ae916cc7059c.jpg','Sou cuidador de idosos desde 1998',3,'Setor Bueno','','','','74810-070','GO','GoiÃ¢nia','Jardim GoiÃ¡s','Avenida H','123','Apartamento','Sou cuidador desde 1998 e tenho muita experiencia na Ã¡rea.','Enfermeiro formado pela Universidade de Harvard da China.','Tenho bastante, falar pra voces.','2020-12-01','2020-12-05',2),(6,'Lucas',' da Silva Lima',31873172001,'O','1997-06-02','lucasvidal.gs4@gmail.com','$2y$10$8sf0yG8Z5qnfOe6jlos2ie//YcsgeDE5fcQRvZi8XrUVHJI7huJUW',11989723337,NULL,NULL,11,'Nada informado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Nada informado.','Nada informado.','Nada informado.','2020-12-01',NULL,2),(8,'Alfredo','Sapiens',90601372050,'M','2000-07-03','lucasvidal.gs12@gmail.com','$2y$10$08Qfm6HAyR98iiiZAXoTXO17f7aslmBnWtTZ2lYHR.WSajGzzJO5S',11989715545,'27c95b746ccbb073622d5fbfe68167cb.jpg','Atuo na Ã¡rea ja fazem 45 anos',1,'Atuo nas zonas norte e leste de SÃ£o Paulo','','','','02226-140','SP','SÃ£o Paulo','Jardim Brasil (Zona Norte)','Rua Jornada da ParaÃ­ba','','','Nada informado.','Nada informado.','Nada informado.','2020-12-06','2020-12-06',2);
/*!40000 ALTER TABLE `cuidador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidades` (
  `id_espec` int(11) NOT NULL AUTO_INCREMENT,
  `relacao` varchar(50) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_espec`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Cuidador de PcNE\'s','Eu sou cuidador de PcNE\'s'),(2,'Cuidador de PcD\'s','Eu sou cuidador de PcD\'s'),(3,'Cuidador de Idosos','Eu sou cuidador de idosos'),(4,'Cuidador de Criancas','Eu sou cuidador de crianças/babysitter'),(5,'Cuidador de Feridos','Eu sou um tratador de feridos'),(6,'Enfermaria','Eu sou enfermeiro(a) autonomo(a)'),(10,'Nenhuma','Outra'),(11,'Nada Informado','Nada informado.');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `níveis de acesso`
--

DROP TABLE IF EXISTS `níveis de acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `níveis de acesso` (
  `idnivel` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `níveis de acesso`
--

LOCK TABLES `níveis de acesso` WRITE;
/*!40000 ALTER TABLE `níveis de acesso` DISABLE KEYS */;
INSERT INTO `níveis de acesso` VALUES (1,'Nível 1','Acesso de Admins/Mantenedores do sistema Anjos da Guarda. Aprovação e exclusão de usuários.'),(2,'Nível 2','Acesso de cuidadores. Edição de Perfil de Cuidador.'),(3,'Nível 3','Acesso de clientes. Edição de Perfil de Cliente, busca e filtro de cuidadores.');
/*!40000 ALTER TABLE `níveis de acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `necessidades`
--

DROP TABLE IF EXISTS `necessidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `necessidades` (
  `id_necessidade` int(11) NOT NULL AUTO_INCREMENT,
  `nece` varchar(50) DEFAULT NULL,
  `rel_espec` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_necessidade`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `necessidades`
--

LOCK TABLES `necessidades` WRITE;
/*!40000 ALTER TABLE `necessidades` DISABLE KEYS */;
INSERT INTO `necessidades` VALUES (1,'Preciso de enfermeiros autonomos','Enfermeiros autonomos'),(2,'Preciso de um cuidador de idosos','Cuidador de Idosos'),(3,'Preciso de um cuidador de criancas/babysitter','Cuidador de Criancas/Babysitter\'s'),(4,'Preciso de um cuidador de PcD\'s\'','Cuidador de PcD\'s\''),(5,'Preciso de um cuidador de PcNE\'s\'','Cuidador de PcNE\'s\''),(6,'Preciso de um tratador de feridos','Tratador de Feridos'),(7,'Nada informado','Nada Informado'),(8,'Outra','Nenhuma');
/*!40000 ALTER TABLE `necessidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-10 18:59:33
