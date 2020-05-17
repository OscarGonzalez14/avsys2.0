-- MySQL dump 10.16  Distrib 10.2.30-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u579024306_avplusys
-- ------------------------------------------------------
-- Server version	10.2.30-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abonos`
--

DROP TABLE IF EXISTS `abonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonos` (
  `id_abono` int(11) NOT NULL AUTO_INCREMENT,
  `monto_abono` varchar(10) DEFAULT NULL,
  `forma_pago` varchar(45) DEFAULT NULL,
  `fecha_abono` date NOT NULL,
  `proximo_abono` date NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_credito` int(11) NOT NULL,
  `n_recibo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `fk_abonos_pacientes_idx` (`id_paciente`),
  KEY `fk_abonos_usuarios_idx` (`id_usuario`),
  KEY `fk_abonos_creditos_idx` (`id_credito`),
  CONSTRAINT `fk_abonos_creditos` FOREIGN KEY (`id_credito`) REFERENCES `creditos` (`id_credito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_abonos_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_abonos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos`
--

/*!40000 ALTER TABLE `abonos` DISABLE KEYS */;
INSERT INTO `abonos` VALUES (35,'58.5','Cheque','2019-06-21','2019-06-23',12,5,26,'R001'),(36,'78','Cheque','2019-06-21','2019-06-24',13,5,25,'R002'),(37,'58.5','Cheque','2019-06-22','2019-06-30',12,5,26,'R0013'),(38,'58.5','Efectivo','2019-06-22','2019-06-29',12,5,26,'R0014'),(39,'19.5','Cheque','2019-06-22','2019-06-30',12,5,27,'R009'),(40,'29.25','Tarjeta de Credito','2019-06-23','2019-06-24',15,5,28,'0020'),(41,'29.25','Cheque','2019-06-25','2019-06-29',15,5,28,'0021'),(42,'29.25','Cheque','2019-06-25','2019-06-29',15,5,28,'34'),(43,'19.5','Tarjeta de Debito','2019-06-25','2019-06-29',12,5,27,'0023'),(44,'64.85','Tarjeta de Credito','2019-07-25','2019-07-25',16,5,29,'R08987');
/*!40000 ALTER TABLE `abonos` ENABLE KEYS */;

--
-- Table structure for table `bodegas`
--

DROP TABLE IF EXISTS `bodegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodegas` (
  `id_bodega` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bodega`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegas`
--

/*!40000 ALTER TABLE `bodegas` DISABLE KEYS */;
INSERT INTO `bodegas` VALUES (1,'BD Metrocentro'),(3,'BD Santa Ana'),(4,'BD San Miguel');
/*!40000 ALTER TABLE `bodegas` ENABLE KEYS */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (4,'Metrocentro','1',5),(5,'Empresarial','1',5),(6,'Santa Ana','1',5),(8,'San Miguel','1',5);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_compra` date NOT NULL,
  `numero_compra` varchar(100) NOT NULL,
  `comprador` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_compras`),
  KEY `fk_compras_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2018-01-31','F000001','eyter',1),(2,'2018-02-06','F000002','eyter',1),(3,'2018-02-07','F000003','eyter',1),(4,'2018-02-07','F000004','eyter',1),(5,'2018-09-04','F000005','eyter',1),(6,'2018-09-05','F000006','eyter',1);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` text DEFAULT NULL,
  `patologias` text DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `oiesfreasl` varchar(10) DEFAULT NULL,
  `oicilindrosl` varchar(10) DEFAULT NULL,
  `oiejesl` varchar(10) DEFAULT NULL,
  `oiprismal` varchar(10) DEFAULT NULL,
  `oiadicionl` varchar(10) DEFAULT NULL,
  `odesferasl` varchar(10) DEFAULT NULL,
  `odcilndrosl` varchar(10) DEFAULT NULL,
  `odejesl` varchar(10) DEFAULT NULL,
  `odprismal` varchar(10) DEFAULT NULL,
  `odadicionl` varchar(10) DEFAULT NULL,
  `oiesferasa` varchar(10) DEFAULT NULL,
  `oicolindrosa` varchar(10) DEFAULT NULL,
  `oiejesa` varchar(10) DEFAULT NULL,
  `oiprismaa` varchar(10) DEFAULT NULL,
  `oiadiciona` varchar(10) DEFAULT NULL,
  `odesferasa` varchar(10) DEFAULT NULL,
  `odcilindrosa` varchar(10) DEFAULT NULL,
  `odejesa` varchar(10) DEFAULT NULL,
  `dprismaa` varchar(10) DEFAULT NULL,
  `oddiciona` varchar(10) DEFAULT NULL,
  `sugeridos` varchar(200) DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `oiesferasf` varchar(10) DEFAULT NULL,
  `oicolindrosf` varchar(10) DEFAULT NULL,
  `oiejesf` varchar(10) DEFAULT NULL,
  `oiprismaf` varchar(10) DEFAULT NULL,
  `oiadicionf` varchar(10) DEFAULT NULL,
  `odesferasf` varchar(10) DEFAULT NULL,
  `odcilindrosf` varchar(10) DEFAULT NULL,
  `odejesf` varchar(10) DEFAULT NULL,
  `dprismaf` varchar(10) DEFAULT NULL,
  `oddicionf` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_consulta_pacientes1_idx` (`id_paciente`),
  KEY `fk_consulta_usuarios` (`id_usuario`),
  CONSTRAINT `fk_consulta_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (9,'','',11,5,'2019-04-10 21:37:31','','','','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Vision Borrosa','Nada',1,5,'2019-04-10 22:49:14','+1','','','','','+1','','','','','+1','','','','','+1','','','','','Vision Sencilla con AR','Hipermetropia','---','--',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Cefalea','----',1,5,'2019-04-10 22:51:56','+2','','','','','+2','','','','','+2','','','','','+2','','','','','----','---','===','----',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Ardor','nada',2,5,'2019-04-10 23:05:57','+3','','','','','+3','','','','','+3','','','','','+3','','','','','Lente Blanco','Miopia','--','---',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'ardor','Ninguna',3,5,'2019-04-11 15:57:53','+4','','','','','+4','','','','','+4','','','','','+4','','','','','Lente Blanco','hipermetropia','Gotas','eeeee',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Hipermetropia','Ninguna',3,5,'2019-04-12 16:39:47','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','Lente rojo','ninguna','Gotas','ninguna','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67'),(15,'nada','ninguna',5,5,'2019-04-13 17:37:55','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','Lente Blanco','Astigmatismo','Gotas','nada','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1'),(16,'Hipermetropia','Astigmatismo',8,5,'2019-04-14 00:15:32','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','Hipermetropia','Gotas','ninguna','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(17,'Hipermetropia','Vision borrosa',10,4,'2019-04-14 01:01:49','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','Lente blanco','Hipermetropia','Gotas','Ninguna','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3'),(18,'Astigmatismo','Hipermetropia',13,5,'2019-04-15 03:49:56','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','nada','Gotas','-----','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(19,'Vision borrosa','miopia',15,4,'2019-04-18 20:33:27','-1.00','','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','VS','miopia','ninguno','Para Lectura','-0.75','','','','','-0.75','','','',''),(20,'cefalea','miopia',15,4,'2019-04-18 20:40:03','-0.75','','','','','-0.75','','','','','-0.75','','','','','-0.75','','','','','VS AR','miopia','','Para ver de lejos','-0.75','','','','','-0.75','','','',''),(21,'Vision Borrosa','Miopia',16,5,'2019-04-25 22:33:25','-1.00','','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','Lente Vision sencilla Plicarbonato c-ar','Miopia','','','-1.00','','','','','-1.00','','','',''),(22,'Cefalea','Mipia',16,4,'2019-04-25 22:36:11','-1.00','-1.00','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','Lente Vision sencilla Plicarbonato c-ar','miopia','','','-1.00','','','','','-1.00','','','',''),(23,'','',16,5,'2019-09-11 01:56:32','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditos` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `monto` varchar(45) NOT NULL,
  `plazo` varchar(45) DEFAULT NULL,
  `saldo` varchar(45) DEFAULT NULL,
  `forma_pago` varchar(100) NOT NULL,
  `numero_venta` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_adquirido` date NOT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `fk_creditos_pacientes_idx` (`id_paciente`),
  KEY `fk_creditos_usuarios_idx` (`id_usuario`),
  KEY `fk_creditos_ventas_idx` (`id_usuario`),
  CONSTRAINT `fk_creditos_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_creditos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditos`
--

/*!40000 ALTER TABLE `creditos` DISABLE KEYS */;
INSERT INTO `creditos` VALUES (39,'234.00','3','234.00','Cargo Automatico','V000001',18,5,'2019-09-25'),(40,'817.02','6','817.02','Cargo Automatico','V000002',19,5,'2019-09-25'),(41,'234.00','5','234.00','Descuento en Planilla','V123345',18,5,'2019-09-26'),(42,'234.00','9','234.00','Cargo Automatico','V123346',18,5,'2019-09-26'),(43,'234.00','3','234.00','Descuento en Planilla','V123347',18,5,'2019-09-26'),(44,'Array','12','Array','Cargo Automatico','01',22,5,'2019-09-26'),(45,'Array','12','Array','Cargo Automatico','01',22,5,'2019-09-26'),(46,'Array','12','Array','Cargo Automatico','04',25,5,'2019-09-27');
/*!40000 ALTER TABLE `creditos` ENABLE KEYS */;

--
-- Table structure for table `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compras` (
  `id_detalle_compras` int(11) NOT NULL AUTO_INCREMENT,
  `numero_compra` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `cantidad_compra` varchar(100) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `sucursal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_compras`),
  KEY `fk_detalle_compras_producto_idx` (`id_producto`),
  KEY `fk_detalle_compras_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_detalle_compras_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` VALUES (25,'I000001',23,'MMJ 590','1','2019-04-05 01:54:54',4,'Metrocentro'),(26,'I00000002',23,'MMJ 590','2','2019-04-05 01:56:24',4,'empresarial metrocentro'),(27,'I00000003',24,'ENVISION','4','2019-04-05 01:57:54',4,'Metrocentro'),(28,'I00000004',24,'ENVISION','1','2019-04-05 01:58:40',4,'empresarial metrocentro'),(29,'I00000005',23,'MMJ 590','4','2019-04-06 15:41:00',5,'Metrocentro'),(30,'I00000005',24,'ENVISION','2','2019-04-06 15:41:00',5,'Metrocentro'),(31,'I00000006',23,'MMJ 590','1','2019-04-06 15:41:44',5,'Metrocentro'),(32,'I00000007',25,'MMJ 590','3','2019-04-20 04:17:23',5,'Metrocentro'),(33,'I00000008',23,'MMJ 590','7','2019-04-21 17:41:37',4,'Metrocentro'),(34,'I00000009',25,'MMJ 590','9','2019-04-21 17:41:55',4,'Metrocentro'),(35,'I00000010',24,'ENVISION','5','2019-04-23 05:07:04',4,'Metrocentro'),(36,'I00000011',23,'MMJ 590','50','2019-04-30 17:42:36',5,'Metrocentro'),(37,'I00000012',24,'ENVISION','20','2019-04-30 19:01:40',5,'Metrocentro'),(38,'I00000013',32,'MMJ 590','10','2019-05-03 03:38:44',5,'empresarial metrocentro'),(39,'I00000014',23,'MMJ 590','60','2019-05-09 16:56:47',5,'Metrocentro'),(40,'I00000015',25,'MMJ 590','34','2019-05-09 16:57:04',5,'Metrocentro'),(41,'I00000016',32,'MMJ 590','15','2019-05-09 16:57:15',5,'Metrocentro'),(42,'I00000017',24,'ENVISION','56','2019-05-09 16:57:29',5,'Metrocentro'),(43,'I00000018',33,'pajarote','27','2019-05-14 20:08:09',5,'Metrocentro'),(44,'I00000019',4,'RB 3050','5','2019-05-18 22:31:24',5,'Metrocentro'),(45,'I00000020',4,'RB 3050','56','2019-05-22 10:18:02',5,'Metrocentro'),(46,'I00000021',16,'v235','1','2019-09-19 23:53:11',5,'Empresarial');
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;

--
-- Table structure for table `detalle_envio`
--

DROP TABLE IF EXISTS `detalle_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_envio` (
  `id_detalle_envio` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_envio` varchar(45) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `cantidad_producto` varchar(45) DEFAULT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sucursal_origen` varchar(100) NOT NULL,
  `sucursal_destino` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_envio`),
  KEY `detalle_envio_id_producto_idx` (`id_producto`),
  KEY `fk_detalle_envio_id_usuario_idx` (`id_usuario`),
  CONSTRAINT `detalle_envio_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_envio_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_envio`
--

/*!40000 ALTER TABLE `detalle_envio` DISABLE KEYS */;
INSERT INTO `detalle_envio` VALUES (29,'E000001',16,'v235','1','2019-09-24 17:23:11','1','3',5),(30,'19-E000002',16,'v235','1','2019-09-24 18:36:58','1','4',5),(31,'19-E000010',16,'v235','1','2019-09-24 18:37:33','3','4',5),(32,'19-E000010',16,'v235','1','2019-09-24 18:38:11','1','3',5),(33,'19-E000010',17,'10347','1','2019-09-24 19:13:13','4','3',5),(34,'19-E000010',17,'10347','1','2019-09-24 19:20:01','4','1',5);
/*!40000 ALTER TABLE `detalle_envio` ENABLE KEYS */;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ventas` (
  `id_detalle_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_venta` varchar(100) NOT NULL,
  `id_producto` varchar(250) DEFAULT NULL,
  `producto` varchar(250) DEFAULT NULL,
  `precio_venta` varchar(100) NOT NULL,
  `cantidad_venta` varchar(100) NOT NULL,
  `descuento` varchar(100) NOT NULL,
  `importe` varchar(100) DEFAULT NULL,
  `fecha_venta` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_ventas`),
  KEY `fk_detalle_ventas_producto_idx` (`id_producto`),
  KEY `fk_detalle_ventas_usuario_idx` (`id_usuario`),
  KEY `fk_detalle_ventas_clientes_idx` (`id_paciente`),
  CONSTRAINT `fk_detalle_ventas_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_ventas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` VALUES (47,'V000001','16','v235','234','1','0','234','2019-09-25',5,18),(48,'V000002','4','RB 3050','175','1','0','175','2019-09-25',5,19),(49,'V000002','8','RB 3050','234','1','0','234','2019-09-25',5,19),(50,'V000002','12','modelo2','234','1','0','234','2019-09-25',5,19),(51,'V000002','7','Visión Sencilla Policarbonato','123.45','1','0','123.45','2019-09-25',5,19),(52,'V000002','9','solucion','3','1','0','3','2019-09-25',5,19),(53,'V000002','14','Lente Antireflejante','23.87','1','0','23.87','2019-09-25',5,19),(54,'V000002','13','antireflejante1','23.7','1','0','23.7','2019-09-25',5,19),(55,'V0123344',NULL,'cualquierproducto','12','','',NULL,'2019-09-25',4,18),(56,'V123345','16','v235','234','1','0','234','2019-09-26',5,18),(57,'V123346','16','v235','234','1','0','234','2019-09-26',5,18),(58,'V123347','16','v235','234','1','0','234','2019-09-26',5,18);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

--
-- Table structure for table `envios`
--

DROP TABLE IF EXISTS `envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `codigo_envio` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_envio`),
  KEY `fk_id_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;

--
-- Table structure for table `existencias`
--

DROP TABLE IF EXISTS `existencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `existencias` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_bodega` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `fk_id_producto_idx` (`id_producto`),
  KEY `fk_id_bodega_idx` (`id_bodega`),
  CONSTRAINT `fk_id_bodega` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `existencias`
--

/*!40000 ALTER TABLE `existencias` DISABLE KEYS */;
INSERT INTO `existencias` VALUES (16,4,17,'3'),(17,4,12,'7'),(18,1,17,'1');
/*!40000 ALTER TABLE `existencias` ENABLE KEYS */;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_bodega` (`id_bodega`),
  CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ingresos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ingresos_ibfk_3` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;

--
-- Table structure for table `lentes`
--

DROP TABLE IF EXISTS `lentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lentes` (
  `id_lente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_lente`),
  KEY `fk_table1_usuarios_idx` (`id_usuario`),
  CONSTRAINT `fk_table1_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lentes`
--

/*!40000 ALTER TABLE `lentes` DISABLE KEYS */;
INSERT INTO `lentes` VALUES (1,'Lente1','127',5);
/*!40000 ALTER TABLE `lentes` ENABLE KEYS */;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `edad` varchar(100) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT 'Ninguna',
  `correo` varchar(200) DEFAULT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  `tipo_tarjeta` varchar(45) DEFAULT NULL,
  `numero_tarjeta` varchar(45) DEFAULT NULL,
  `fecha_vencimiento_tarjeta` varchar(45) DEFAULT NULL,
  `tipo_pac` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (18,'PA000001','Oscar Gonzalez','79745324','28','Estudiante','Ninguna','oscar@gmail.com','2019-09-25 17:44:54',5,'0984757',NULL,NULL,NULL,NULL),(19,'AV000002','Andres Vasquez','12345','45','Optometra','AVPLLUS','andres@gmail.com','2019-09-25 17:57:19',5,'008838',NULL,NULL,NULL,NULL),(21,'AV000004','Carlos Eduardo Rojas','5555555555','22','Estudiante','3','oscargonzawwlez@gmail.com','2019-09-25 20:53:59',5,'0384987u','credito','11111112','2019-09-29',NULL),(22,'AV000005','Karina Guadalupe Ramires','7400013','8','Optometra','AVPLLUS','oscargonzawwledz@gmail.com','2019-09-25 20:58:07',5,'008838','credito','11111112','2019-09-22','c_autom'),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-09-26 20:10:35',5,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-09-26 20:11:23',5,NULL,NULL,NULL,NULL,NULL),(25,'AV000001','MAURICIO FLORES','74000135','20','Optometra','AVPLLUS','eyter@gmail.com','2019-09-26 21:13:01',5,'9030904884','credito','000000','2022-02-10','c_autom'),(26,'AV000002','Cristian Hernandes','5555555555','34','Optometra','AVPLLUS','oscargonzawwlez@gmail.com','2019-09-27 17:44:46',5,'110022','credito','11111112','2019-09-29','c_autom');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Categoria'),(2,'Productos'),(3,'Proveedores'),(4,'Ingresos'),(5,'Pacientes'),(6,'Ventas'),(7,'Reporte de Ingreso de Productos'),(8,'Reporte de Ventas'),(9,'Usuarios'),(10,'Empresa');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) DEFAULT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `stock` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `medidas` varchar(200) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (4,'RB 3050','RayBan','C1','175','2',5,'54-17-45','aros'),(6,'m34','VERSACE','c45','125','9',5,'12-12-33','aros'),(7,'Visión Sencilla Policarbonato',NULL,NULL,'123.45','-23',5,NULL,'lentes'),(8,'RB 3050','RayBan','c5','234','2',5,'12-12-33','aros'),(9,'solucion',NULL,NULL,'3','-4',5,NULL,'accesorios'),(10,'1244455','RayBan 2','c5','234','93',5,'12-12-33','aros'),(11,'','VERSACE','c45','125','105',5,'12-12-33','aros'),(12,'modelo2','RayBan','c5','234','106',5,'12-12-33','aros'),(13,'antireflejante1',NULL,NULL,'23.7','-1',5,NULL,'photosensibles'),(14,'Lente Antireflejante',NULL,NULL,'23.87','-1',5,NULL,'anti-reflejantes'),(15,'antireflejante22',NULL,NULL,'',NULL,5,NULL,'anti-reflejantes'),(16,'v235','van heusen','amarillo','234','19',5,'12345','aros'),(17,'10347','AndVas Metalico','c4','65','31',5,'50-17-140','aros');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

--
-- Table structure for table `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_permiso`),
  KEY `fk_usuario_permiso_usuario_idx` (`id_usuario`),
  KEY `fk_usuario_permiso_permiso_idx` (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permiso`
--

/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` VALUES (32,2,1),(33,2,2),(110,3,1),(111,3,2),(112,3,3),(113,3,4),(114,3,5),(115,3,6),(116,3,7),(117,3,8),(118,3,9),(119,3,10),(140,1,1),(141,1,2),(142,1,3),(143,1,4),(144,1,5),(145,1,6),(146,1,7),(147,1,8),(148,1,9),(149,1,10),(170,5,1),(171,5,2),(172,5,3),(173,5,4),(174,5,5),(175,5,6),(176,5,7),(177,5,8),(178,5,9),(179,5,10),(195,4,1),(196,4,2),(197,4,3),(198,4,4),(199,4,5),(200,4,6),(201,4,7),(202,4,8),(203,4,9),(204,4,10),(205,7,1),(206,7,2),(207,7,3),(208,7,4),(209,7,5),(210,7,6),(211,7,7),(212,7,8),(213,7,9),(214,7,10),(215,6,1),(216,6,2),(217,6,4),(218,6,5),(219,8,5),(220,8,6),(221,8,8),(222,9,5),(223,9,6),(224,9,8),(225,10,5),(226,10,6),(227,11,6),(228,11,8);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cargo` enum('0','1') NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `sucursal` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_id_categoria_idx` (`id_categoria`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'04659166-7','Carlos Andres Vasquez Choto','AV001','79897114','andres01@gmail.com','metrocentro ss, local 7 4ta etapa','1','andvas','and20vas08','2019-03-28','1','',0),(5,'454324','Oscar Antonio Gonzalez','ADMIN001','7912384','oscar@gmail.com','Caserio La Vuelta','0','oscar','12345','2019-03-31','1','Metrocentro',0),(6,'04038907-0','Miguel Ernesto Flores ','av003','77850445','miguel@gmail.com','SS','0','mflores','54321','2019-04-02','1','',0),(7,'04030871-5','Carmen Arely Vasquez Flores','AV002','78538973','carmenarelyflores77@gmail.com','metrocentro ss','1','arely','201188','2019-06-10','1','',0),(8,'04177506-2','Denis Isaac Corvera','av004','71836547','denis@gmail.com','metrocentro ','1','denis','200489','2019-06-10','1','',0),(9,'05410332-1','Josue Noe Rodriguez ','av005','60097577','josue@gmail.com','metrocentro ss','1','josue','120896','2019-06-10','1','',0),(10,'01378707-7','Janet Riximy Cruz','av006','63149057','janet@gmail.com','metrocentro','0','janet','050569','2019-06-10','1','',0),(11,'03362171-2','Mauricio Gregorio Flores','av007','78533789','mauricio@gmail.com','metrocentro','1','mauricio','180885','2019-06-10','1','',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `numero_venta` varchar(100) NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `tipo_pago` varchar(100) NOT NULL,
  `tipo_venta` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `fk_ventas_usuarios_idx` (`id_usuario`),
  KEY `fk_ventas_pacientes_idx` (`id_paciente`),
  CONSTRAINT `fk_ventas_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (32,'2019-09-25','V000001','Oscar Gonzalez','oscar','234.00','Cargo Automatico','Credito',5,18,'Santa Ana'),(33,'2019-09-25','V000002','Andres Vasquez','oscar','817.02','Cargo Automatico','Credito',5,19,'Metrocentro'),(34,'2019-09-26','V123345','Oscar Gonzalez','oscar','234.00','Descuento en Planilla','Credito',5,18,'Empresarial'),(35,'2019-09-26','V123346','Oscar Gonzalez','oscar','234.00','Cargo Automatico','Credito',5,18,'Santa Ana'),(36,'2019-09-26','V123347','Oscar Gonzalez','oscar','234.00','Descuento en Planilla','Credito',5,18,'Empresarial'),(37,'2019-09-26','01','Karina Guadalupe Ramires','5','Array','Cargo Automatico','credito',5,22,'Metrocentro'),(38,'2019-09-26','01','Karina Guadalupe Ramires','5','Array','Cargo Automatico','credito',5,22,'Metrocentro'),(39,'2019-09-27','04','MAURICIO FLORES','5','Array','Cargo Automatico','credito',5,25,'Metrocentro');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

--
-- Dumping routines for database 'u579024306_avplusys'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-17  0:59:49
