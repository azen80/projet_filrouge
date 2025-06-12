/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: villagegreen
-- ------------------------------------------------------
-- Server version	10.11.13-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CLIENT`
--

DROP TABLE IF EXISTS `CLIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLIENT` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `type_client` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse_facturation` text DEFAULT NULL,
  `adresse_livraison` text DEFAULT NULL,
  `coefficient` decimal(5,2) DEFAULT NULL,
  `id_commercial` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `id_commercial` (`id_commercial`),
  CONSTRAINT `CLIENT_ibfk_1` FOREIGN KEY (`id_commercial`) REFERENCES `COMMERCIAL` (`id_commercial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLIENT`
--

LOCK TABLES `CLIENT` WRITE;
/*!40000 ALTER TABLE `CLIENT` DISABLE KEYS */;
INSERT INTO `CLIENT` VALUES
(1,'Alice','Durand','Magasin ZikPro','pro','alice@zikpro.com','0612345678','5 rue du Rock','5 rue du Rock',1.20,1),
(2,'Paul','Martin',NULL,'particulier','paul.m@gmail.com','0698765432','12 avenue Jazz','12 avenue Jazz',1.50,2),
(3,'Durand','Paul',NULL,'Particulier','paul.durand@gmail.com','0611223344','8 rue Beethoven','8 rue Beethoven',1.50,1),
(4,'Sonor Plus',NULL,'Sonor Plus','Professionnel','info@sonorplus.fr','0155667788','20 rue du Son','20 rue du Son',1.10,7),
(5,'Berger','Laura',NULL,'Particulier','laura.berger@gmail.com','0609876543','4 place des Notes','4 place des Notes',1.50,1),
(6,'StudioMax',NULL,'StudioMax SAS','Professionnel','support@studiomax.com','0177889900','45 bd du Studio','45 bd du Studio',1.25,8),
(7,'GuitarMania',NULL,'GuitarMania','Professionnel','contact@guitarmania.com','0188888888','89 rue des Cordes','89 rue des Cordes',1.20,2),
(8,'Renaud','Alex',NULL,'Particulier','alex.renaud@gmail.com','0677665544','3 chemin du Jazz','3 chemin du Jazz',1.50,1);
/*!40000 ALTER TABLE `CLIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMMANDE`
--

DROP TABLE IF EXISTS `COMMANDE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `COMMANDE` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime DEFAULT NULL,
  `montant_total` decimal(10,2) DEFAULT NULL,
  `reduction` decimal(5,2) DEFAULT NULL,
  `mode_paiement` varchar(50) DEFAULT NULL,
  `date_reglement` date DEFAULT NULL,
  `id_statut` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  UNIQUE KEY `id_facture` (`id_facture`),
  KEY `id_statut` (`id_statut`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `COMMANDE_ibfk_1` FOREIGN KEY (`id_statut`) REFERENCES `STATUT_COMMANDE` (`id_statut`),
  CONSTRAINT `COMMANDE_ibfk_2` FOREIGN KEY (`id_facture`) REFERENCES `FACTURE` (`id_facture`),
  CONSTRAINT `COMMANDE_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `CLIENT` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMMANDE`
--

LOCK TABLES `COMMANDE` WRITE;
/*!40000 ALTER TABLE `COMMANDE` DISABLE KEYS */;
INSERT INTO `COMMANDE` VALUES
(1,'2024-05-01 00:00:00',1198.80,0.10,'virement','2024-06-01',1,1,1),
(2,'2024-05-10 00:00:00',958.80,0.00,'carte bancaire','2024-05-10',2,2,2),
(3,'2025-05-03 00:00:00',777.60,0.00,'CB','2025-05-03',3,3,3),
(4,'2025-05-04 00:00:00',1558.80,0.05,'Chèque',NULL,4,4,4),
(5,'2025-05-05 00:00:00',358.80,0.00,'CB','2025-05-05',2,5,5),
(6,'2025-05-06 00:00:00',22.80,0.00,'CB','2025-05-06',2,6,6),
(7,'2025-05-07 00:00:00',154.80,0.00,'CB','2025-05-07',1,7,7),
(8,'2025-05-08 00:00:00',214.80,0.00,'CB','2025-05-08',1,8,8);
/*!40000 ALTER TABLE `COMMANDE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMMERCIAL`
--

DROP TABLE IF EXISTS `COMMERCIAL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `COMMERCIAL` (
  `id_commercial` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_commercial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMMERCIAL`
--

LOCK TABLES `COMMERCIAL` WRITE;
/*!40000 ALTER TABLE `COMMERCIAL` DISABLE KEYS */;
INSERT INTO `COMMERCIAL` VALUES
(1,'Lemoine','Clients professionnels'),
(2,'Bernard','Clients particuliers'),
(3,'Durand','Percussions'),
(4,'Bernard','Pianos'),
(5,'Petit','Vents'),
(6,'Robert','Accessoires'),
(7,'Lemoine','Sonorisation'),
(8,'Faure','Prospection');
/*!40000 ALTER TABLE `COMMERCIAL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FACTURE`
--

DROP TABLE IF EXISTS `FACTURE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `FACTURE` (
  `id_facture` int(11) NOT NULL,
  `date_facture` date DEFAULT NULL,
  `total_HT` decimal(10,2) DEFAULT NULL,
  `TVA` decimal(10,2) DEFAULT NULL,
  `total_TTC` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FACTURE`
--

LOCK TABLES `FACTURE` WRITE;
/*!40000 ALTER TABLE `FACTURE` DISABLE KEYS */;
INSERT INTO `FACTURE` VALUES
(1,'2024-05-01',999.00,199.80,1198.80),
(2,'2024-05-10',799.00,159.80,958.80),
(3,'2025-02-06',100.00,10.00,110.00),
(4,'2025-07-06',250.00,22.00,272.00),
(5,'2025-05-09',299.00,59.80,358.80),
(6,'2025-05-11',19.00,3.80,22.80),
(7,'2025-05-13',129.00,25.80,154.80),
(8,'2025-05-15',179.00,35.80,214.80);
/*!40000 ALTER TABLE `FACTURE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOURNISSEUR`
--

DROP TABLE IF EXISTS `FOURNISSEUR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `FOURNISSEUR` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOURNISSEUR`
--

LOCK TABLES `FOURNISSEUR` WRITE;
/*!40000 ALTER TABLE `FOURNISSEUR` DISABLE KEYS */;
INSERT INTO `FOURNISSEUR` VALUES
(1,'Fender','contact@fender.com'),
(2,'Yamaha','contact@yamaha.com'),
(3,'Roland','roland@contact.com'),
(4,'Gibson','gibson@contact.com'),
(5,'Pearl','pearl@contact.com'),
(6,'Boss','boss@contact.com'),
(7,'Shure','shure@contact.com'),
(8,'Korg','korg@contact.com');
/*!40000 ALTER TABLE `FOURNISSEUR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIGNE`
--

DROP TABLE IF EXISTS `LIGNE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `LIGNE` (
  `id_ligne` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix_unitaire` decimal(10,2) DEFAULT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne`),
  KEY `id_produit` (`id_produit`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `LIGNE_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `PRODUIT` (`id_produit`),
  CONSTRAINT `LIGNE_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `COMMANDE` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIGNE`
--

LOCK TABLES `LIGNE` WRITE;
/*!40000 ALTER TABLE `LIGNE` DISABLE KEYS */;
INSERT INTO `LIGNE` VALUES
(1,2,999.00,2,1),
(2,1,799.00,1,2),
(3,1,649.00,3,3),
(4,1,1299.00,4,4),
(5,1,299.00,5,5),
(6,1,19.00,6,6),
(7,1,129.00,7,7),
(8,1,179.00,8,8);
/*!40000 ALTER TABLE `LIGNE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIVRAISON`
--

DROP TABLE IF EXISTS `LIVRAISON`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `LIVRAISON` (
  `id_livraison` int(11) NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `adresse_livraison` text DEFAULT NULL,
  `id_statut_livraison` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_livraison`),
  KEY `id_statut_livraison` (`id_statut_livraison`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `LIVRAISON_ibfk_1` FOREIGN KEY (`id_statut_livraison`) REFERENCES `STATUT_LIVRAISON` (`id_statut_livraison`),
  CONSTRAINT `LIVRAISON_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `COMMANDE` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIVRAISON`
--

LOCK TABLES `LIVRAISON` WRITE;
/*!40000 ALTER TABLE `LIVRAISON` DISABLE KEYS */;
INSERT INTO `LIVRAISON` VALUES
(1,'2024-05-02','5 rue du Rock',1,1),
(2,'2024-05-11','12 avenue Jazz',1,2),
(3,'2025-05-05','8 rue Beethoven',2,3),
(4,'2025-05-07','20 rue du Son',3,4),
(5,'2025-05-09','4 place des Notes',1,5),
(6,'2025-05-11','45 bd du Studio',2,6),
(7,'2025-05-13','89 rue des Cordes',3,7),
(8,'2025-05-15','3 chemin du Jazz',3,8);
/*!40000 ALTER TABLE `LIVRAISON` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUIT`
--

DROP TABLE IF EXISTS `PRODUIT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `PRODUIT` (
  `id_produit` int(11) NOT NULL,
  `libelle_court` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `reference_fournisseur` varchar(100) DEFAULT NULL,
  `prix_achat` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `statut_publication` tinyint(1) DEFAULT NULL,
  `id_sous_rubrique` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_sous_rubrique` (`id_sous_rubrique`),
  KEY `id_fournisseur` (`id_fournisseur`),
  CONSTRAINT `PRODUIT_ibfk_1` FOREIGN KEY (`id_sous_rubrique`) REFERENCES `SOUS_RUBRIQUE` (`id_sous_rubrique`),
  CONSTRAINT `PRODUIT_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `FOURNISSEUR` (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUIT`
--

LOCK TABLES `PRODUIT` WRITE;
/*!40000 ALTER TABLE `PRODUIT` DISABLE KEYS */;
INSERT INTO `PRODUIT` VALUES
(1,'Guitare Stratocaster','Guitare électrique Fender Stratocaster','FEND123',500.00,'stratocaster.jpg',1,1,1),
(2,'Batterie Yamaha Stage','Batterie acoustique Yamaha 5 fûts','YAM456',650.00,'yamaha_stage.jpg',1,2,2),
(3,'Piano numérique FP-30X','Piano numérique Roland compact','ROL789',400.00,'fp30x.jpg',1,3,3),
(4,'Saxophone Alto YAS-280','Saxophone Yamaha pour débutants','YAM801',900.00,'yas280.jpg',1,4,2),
(5,'Ampli Katana 50','Ampli guitare 50W Boss Katana','BOSS123',180.00,'katana.jpg',1,5,6),
(6,'Accordeur Korg GA-2','Accordeur chromatique Korg','KORG111',10.00,'korg_ga2.jpg',1,6,8),
(7,'Micro Shure SM58','Micro chant dynamique','SHURE58',80.00,'sm58.jpg',1,7,7),
(8,'Interface Focusrite Scarlett 2i2','Interface audio USB Focusrite','FOC222',110.00,'scarlett.jpg',1,8,8);
/*!40000 ALTER TABLE `PRODUIT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RUBRIQUE`
--

DROP TABLE IF EXISTS `RUBRIQUE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `RUBRIQUE` (
  `id_rubrique` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `nom_rubrique` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RUBRIQUE`
--

LOCK TABLES `RUBRIQUE` WRITE;
/*!40000 ALTER TABLE `RUBRIQUE` DISABLE KEYS */;
INSERT INTO `RUBRIQUE` VALUES
(1,'cordes.jpg','Cordes'),
(2,'percussions.jpg','Percussions'),
(3,'claviers.jpg','Claviers'),
(4,'vents.jpg','Instruments à vent'),
(5,'sonorisation.jpg','Sonorisation'),
(6,'accessoires.jpg','Accessoires'),
(7,'microphones.jpg','Microphones'),
(8,'studio.jpg','Studio');
/*!40000 ALTER TABLE `RUBRIQUE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SOUS_RUBRIQUE`
--

DROP TABLE IF EXISTS `SOUS_RUBRIQUE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `SOUS_RUBRIQUE` (
  `id_sous_rubrique` int(11) NOT NULL,
  `nom_sous_rubrique` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_rubrique` int(11) NOT NULL,
  PRIMARY KEY (`id_sous_rubrique`),
  KEY `id_rubrique` (`id_rubrique`),
  CONSTRAINT `SOUS_RUBRIQUE_ibfk_1` FOREIGN KEY (`id_rubrique`) REFERENCES `RUBRIQUE` (`id_rubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SOUS_RUBRIQUE`
--

LOCK TABLES `SOUS_RUBRIQUE` WRITE;
/*!40000 ALTER TABLE `SOUS_RUBRIQUE` DISABLE KEYS */;
INSERT INTO `SOUS_RUBRIQUE` VALUES
(1,'Guitares','guitares.jpg',1),
(2,'Batteries','batteries.jpg',2),
(3,'Pianos numériques','piano_num.jpg',3),
(4,'Saxophones','sax.jpg',4),
(5,'Amplis guitare','amp.jpg',5),
(6,'Accordeurs','accord.jpg',6),
(7,'Micros chant','mic.jpg',7),
(8,'Interfaces audio','audio_if.jpg',8);
/*!40000 ALTER TABLE `SOUS_RUBRIQUE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATUT_COMMANDE`
--

DROP TABLE IF EXISTS `STATUT_COMMANDE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `STATUT_COMMANDE` (
  `id_statut` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STATUT_COMMANDE`
--

LOCK TABLES `STATUT_COMMANDE` WRITE;
/*!40000 ALTER TABLE `STATUT_COMMANDE` DISABLE KEYS */;
INSERT INTO `STATUT_COMMANDE` VALUES
(1,'En attente'),
(2,'Expédiée'),
(3,'Livrée'),
(4,'Annulée');
/*!40000 ALTER TABLE `STATUT_COMMANDE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATUT_LIVRAISON`
--

DROP TABLE IF EXISTS `STATUT_LIVRAISON`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `STATUT_LIVRAISON` (
  `id_statut_livraison` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_statut_livraison`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STATUT_LIVRAISON`
--

LOCK TABLES `STATUT_LIVRAISON` WRITE;
/*!40000 ALTER TABLE `STATUT_LIVRAISON` DISABLE KEYS */;
INSERT INTO `STATUT_LIVRAISON` VALUES
(1,'En attente'),
(2,'Expédiée'),
(3,'Livrée'),
(4,'Annulée');
/*!40000 ALTER TABLE `STATUT_LIVRAISON` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_produit_fournisseur`
--

DROP TABLE IF EXISTS `view_produit_fournisseur`;
/*!50001 DROP VIEW IF EXISTS `view_produit_fournisseur`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_produit_fournisseur` AS SELECT
 1 AS `nom_produit`,
  1 AS `nom_fournisseur` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_produit_rubriques`
--

DROP TABLE IF EXISTS `view_produit_rubriques`;
/*!50001 DROP VIEW IF EXISTS `view_produit_rubriques`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_produit_rubriques` AS SELECT
 1 AS `nom_produit`,
  1 AS `nom_sous_rubrique`,
  1 AS `nom_rubrique` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_produit_fournisseur`
--

/*!50001 DROP VIEW IF EXISTS `view_produit_fournisseur`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_produit_fournisseur` AS select `p`.`libelle_court` AS `nom_produit`,`f`.`nom` AS `nom_fournisseur` from (`PRODUIT` `p` join `FOURNISSEUR` `f` on(`p`.`id_fournisseur` = `f`.`id_fournisseur`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_produit_rubriques`
--

/*!50001 DROP VIEW IF EXISTS `view_produit_rubriques`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_produit_rubriques` AS select `p`.`libelle_court` AS `nom_produit`,`sr`.`nom_sous_rubrique` AS `nom_sous_rubrique`,`r`.`nom_rubrique` AS `nom_rubrique` from ((`PRODUIT` `p` join `SOUS_RUBRIQUE` `sr` on(`p`.`id_sous_rubrique` = `sr`.`id_sous_rubrique`)) join `RUBRIQUE` `r` on(`sr`.`id_rubrique` = `r`.`id_rubrique`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-12 15:38:36
