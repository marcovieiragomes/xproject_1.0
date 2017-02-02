CREATE DATABASE  IF NOT EXISTS `xdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `xdb`;
-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: xdb
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `idanswer` int(11) NOT NULL AUTO_INCREMENT,
  `text` mediumtext,
  `ambient_variables` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `test_has_questiont_idtest_has_question` int(11) NOT NULL,
  PRIMARY KEY (`idanswer`),
  KEY `fk_answer_test_has_question1_idx` (`test_has_questiont_idtest_has_question`),
  CONSTRAINT `fk_answer_1` FOREIGN KEY (`test_has_questiont_idtest_has_question`) REFERENCES `test_has_question` (`test_idtest`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (8,'a1','TO-BE-DETERMINED','2017-02-02 12:54:04',1),(9,'another and we\'re done','TO-BE-DETERMINED','2017-02-02 12:54:38',2);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterion`
--

DROP TABLE IF EXISTS `criterion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterion` (
  `idcriterion` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `question_idquestion` int(11) DEFAULT NULL,
  `issubjective` binary(1) DEFAULT NULL,
  PRIMARY KEY (`idcriterion`),
  KEY `fk_criterion_question1_idx` (`question_idquestion`),
  CONSTRAINT `fk_criterion_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterion`
--

LOCK TABLES `criterion` WRITE;
/*!40000 ALTER TABLE `criterion` DISABLE KEYS */;
/*!40000 ALTER TABLE `criterion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation` (
  `idevaluation` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation` int(11) DEFAULT NULL,
  `evaluator_idevaluator` int(11) DEFAULT NULL,
  `answer_idanswer` int(11) DEFAULT NULL,
  `criterion_accomplished` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idevaluation`),
  KEY `fk_evaluation_evaluator1_idx` (`evaluator_idevaluator`),
  KEY `fk_evaluation_answer1_idx` (`answer_idanswer`),
  CONSTRAINT `fk_evaluation_answer1` FOREIGN KEY (`answer_idanswer`) REFERENCES `answer` (`idanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluation_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation`
--

LOCK TABLES `evaluation` WRITE;
/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluator`
--

DROP TABLE IF EXISTS `evaluator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluator` (
  `idevaluator` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idevaluator`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluator`
--

LOCK TABLES `evaluator` WRITE;
/*!40000 ALTER TABLE `evaluator` DISABLE KEYS */;
INSERT INTO `evaluator` VALUES (1,'first_evaluator'),(2,'student_evaluator');
/*!40000 ALTER TABLE `evaluator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `school` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'c1','2017','some school');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `idprofessor` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `evaluator_idevaluator` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprofessor`),
  KEY `fk_professor_evaluator1_idx` (`evaluator_idevaluator`),
  CONSTRAINT `fk_professor_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'teacher',1);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `idquestion` int(11) NOT NULL AUTO_INCREMENT,
  `text` mediumtext,
  `evaluation` int(11) DEFAULT NULL,
  PRIMARY KEY (`idquestion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'this is what I ask',1),(2,'this is a good one',1),(3,'from another test entirely',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idroles` int(11) NOT NULL AUTO_INCREMENT,
  `rolescol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shouldevaluate`
--

DROP TABLE IF EXISTS `shouldevaluate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shouldevaluate` (
  `idshouldevaluate` int(11) NOT NULL,
  `idevaluator` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  PRIMARY KEY (`idshouldevaluate`),
  KEY `fk_shouldevaluate_1_idx` (`idevaluator`),
  KEY `fk_shouldevaluate_2_idx` (`idsubject`),
  CONSTRAINT `fk_shouldevaluate_1` FOREIGN KEY (`idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shouldevaluate_2` FOREIGN KEY (`idsubject`) REFERENCES `student` (`idsubject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shouldevaluate`
--

LOCK TABLES `shouldevaluate` WRITE;
/*!40000 ALTER TABLE `shouldevaluate` DISABLE KEYS */;
INSERT INTO `shouldevaluate` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `shouldevaluate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialanalysis`
--

DROP TABLE IF EXISTS `socialanalysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socialanalysis` (
  `idsocialanalysis` int(11) NOT NULL AUTO_INCREMENT,
  `hidrance` int(11) DEFAULT NULL,
  `friendship1` int(11) DEFAULT NULL,
  `friendship2` int(11) DEFAULT NULL,
  `advice` int(11) DEFAULT NULL,
  `confidence` int(11) DEFAULT NULL,
  `experiment_idexperiment` int(11) DEFAULT NULL,
  `student_idsubject` int(11) DEFAULT NULL,
  `student_idsubject1` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsocialanalysis`),
  KEY `fk_socialanalysis_student1_idx` (`student_idsubject`),
  KEY `fk_socialanalysis_student2_idx` (`student_idsubject1`),
  CONSTRAINT `fk_socialanalysis_student1` FOREIGN KEY (`student_idsubject`) REFERENCES `student` (`idsubject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_socialanalysis_student2` FOREIGN KEY (`student_idsubject1`) REFERENCES `student` (`idsubject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socialanalysis`
--

LOCK TABLES `socialanalysis` WRITE;
/*!40000 ALTER TABLE `socialanalysis` DISABLE KEYS */;
/*!40000 ALTER TABLE `socialanalysis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `idsubject` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `test_idtest` int(11) DEFAULT NULL,
  `evaluator_idevaluator` int(11) DEFAULT NULL,
  `group_idgroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubject`),
  KEY `fk_subject_test1_idx` (`test_idtest`),
  KEY `fk_student_evaluator1_idx` (`evaluator_idevaluator`),
  KEY `fk_student_class1_idx` (`group_idgroup`),
  CONSTRAINT `fk_student_class1` FOREIGN KEY (`group_idgroup`) REFERENCES `group` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_test1` FOREIGN KEY (`test_idtest`) REFERENCES `test` (`idtest`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'paco',20,'M','11',1,2,1),(2,'joao',19,'M','10',1,2,1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `idtest` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `professor_idprofessor` int(11) NOT NULL,
  `locale` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idtest`),
  KEY `fk_test_professor1_idx` (`professor_idprofessor`),
  CONSTRAINT `fk_test_professor1` FOREIGN KEY (`professor_idprofessor`) REFERENCES `professor` (`idprofessor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'first_test',1,'pt','2017-01-01 00:00:00'),(2,'some_other_test',1,'pt','2017-01-01 00:00:00');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_has_question`
--

DROP TABLE IF EXISTS `test_has_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_has_question` (
  `idtest_has_question` int(11) NOT NULL,
  `test_idtest` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `usesStressors` binary(1) DEFAULT NULL,
  PRIMARY KEY (`idtest_has_question`),
  KEY `fk_test_has_question_question1_idx` (`question_idquestion`),
  KEY `fk_test_has_question_test_idx` (`test_idtest`),
  CONSTRAINT `fk_test_has_question_1` FOREIGN KEY (`test_idtest`) REFERENCES `test` (`idtest`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_has_question_2` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_has_question`
--

LOCK TABLES `test_has_question` WRITE;
/*!40000 ALTER TABLE `test_has_question` DISABLE KEYS */;
INSERT INTO `test_has_question` VALUES (1,1,1,10,NULL),(2,1,2,10,'1'),(3,2,3,10,NULL);
/*!40000 ALTER TABLE `test_has_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(65) DEFAULT NULL,
  `isActive` binary(1) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idroles` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_role1_idx` (`role_idroles`),
  CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_idroles`) REFERENCES `role` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-02 13:25:45
