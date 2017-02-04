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
  `ambient_variables` longtext,
  `time` datetime DEFAULT NULL,
  `test_has_questiont_idtest_has_question` int(11) NOT NULL,
  `idstudent` int(11) NOT NULL,
  PRIMARY KEY (`idanswer`),
  KEY `fk_answer_test_has_question1_idx` (`test_has_questiont_idtest_has_question`),
  KEY `fk_answer_2_idx` (`idstudent`),
  CONSTRAINT `fk_answer_1` FOREIGN KEY (`test_has_questiont_idtest_has_question`) REFERENCES `test_has_question` (`idtest_has_question`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_2` FOREIGN KEY (`idstudent`) REFERENCES `student` (`idsubject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `issubjective` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcriterion`),
  KEY `fk_criterion_question1_idx` (`question_idquestion`),
  CONSTRAINT `fk_criterion_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `ambient_variables` longtext NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`idevaluation`),
  KEY `fk_evaluation_evaluator1_idx` (`evaluator_idevaluator`),
  KEY `fk_evaluation_answer1_idx` (`answer_idanswer`),
  CONSTRAINT `fk_evaluation_answer1` FOREIGN KEY (`answer_idanswer`) REFERENCES `answer` (`idanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluation_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idprofessor`),
  KEY `fk_professor_evaluator1_idx` (`evaluator_idevaluator`),
  KEY `fk_professor_1_idx` (`iduser`),
  CONSTRAINT `fk_professor_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shouldevaluate`
--

DROP TABLE IF EXISTS `shouldevaluate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shouldevaluate` (
  `idshouldevaluate` int(11) NOT NULL AUTO_INCREMENT,
  `idevaluator` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  PRIMARY KEY (`idshouldevaluate`),
  KEY `fk_shouldevaluate_1_idx` (`idevaluator`),
  KEY `fk_shouldevaluate_2_idx` (`idsubject`),
  CONSTRAINT `fk_shouldevaluate_1` FOREIGN KEY (`idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shouldevaluate_2` FOREIGN KEY (`idsubject`) REFERENCES `student` (`idsubject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=563 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idsubject`),
  KEY `fk_subject_test1_idx` (`test_idtest`),
  KEY `fk_student_evaluator1_idx` (`evaluator_idevaluator`),
  KEY `fk_student_class1_idx` (`group_idgroup`),
  KEY `fk_student_1_idx` (`iduser`),
  CONSTRAINT `fk_student_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_class1` FOREIGN KEY (`group_idgroup`) REFERENCES `studentgroup` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_evaluator1` FOREIGN KEY (`evaluator_idevaluator`) REFERENCES `evaluator` (`idevaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_test1` FOREIGN KEY (`test_idtest`) REFERENCES `test` (`idtest`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `studentgroup`
--

DROP TABLE IF EXISTS `studentgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentgroup` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `school` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test_has_question`
--

DROP TABLE IF EXISTS `test_has_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_has_question` (
  `idtest_has_question` int(11) NOT NULL AUTO_INCREMENT,
  `test_idtest` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `usesStressors` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtest_has_question`),
  KEY `fk_test_has_question_question1_idx` (`question_idquestion`),
  KEY `fk_test_has_question_test_idx` (`test_idtest`),
  CONSTRAINT `fk_test_has_question_1` FOREIGN KEY (`test_idtest`) REFERENCES `test` (`idtest`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_has_question_2` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-04 13:07:00
