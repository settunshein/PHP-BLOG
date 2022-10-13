-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: php_blog
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(225) COLLATE utf8_unicode_ci DEFAULT 'far fa-list-alt',
  `slug` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'HTML','fab fa-html5','html',NULL,'2021-12-31 17:30:00','2022-10-13 15:46:42'),(2,'CSS','fab fa-css3-alt','css',NULL,'2022-01-01 17:30:00','2022-10-13 15:46:42'),(3,'JavaScript','fab fa-js-square','javascript',NULL,'2022-01-02 17:30:00','2022-10-13 15:46:42'),(4,'Bootstrap','fab fa-bootstrap','bootstrap',NULL,'2022-01-03 17:30:00','2022-10-13 15:46:42'),(5,'PHP','fab fa-php','php',NULL,'2022-01-04 17:30:00','2022-10-13 15:46:42'),(6,'Laravel','fab fa-laravel','laravel',NULL,'2022-01-05 17:30:00','2022-10-13 15:46:42');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,6,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(2,1,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(3,8,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(4,14,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(5,9,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(6,7,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(7,7,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(8,11,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(9,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(10,2,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(11,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(12,3,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(13,12,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(14,10,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(15,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(16,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(17,8,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(18,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(19,10,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(20,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(21,8,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(22,8,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(23,3,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(24,9,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(25,15,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(26,7,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(27,8,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(28,3,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(29,10,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(30,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(31,11,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(32,15,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(33,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(34,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(35,14,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(36,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(37,12,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(38,11,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(39,5,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(40,10,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(41,15,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(42,4,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(43,3,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(44,15,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:42','2022-10-13 15:46:42'),(45,10,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43'),(46,3,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43'),(47,12,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43'),(48,11,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43'),(49,15,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43'),(50,9,'Mo Mo','momo@gmail.com','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2022-10-13 15:46:43','2022-10-13 15:46:43');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,4,1,'What Is Semantic HTML and Why You Should Use It','what-is-semantic-html-and-why-you-should-use-it','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','HTML5, Web Development',NULL,1,'2021-12-31 17:30:00','2022-10-13 15:46:42'),(2,4,2,'What Happens When You Create A Flexbox Flex Container?','what-happens-when-you-create-a-flexbox-flex-container-','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','CSS3, Web Development',NULL,1,'2022-01-01 17:30:00','2022-10-13 15:46:42'),(3,1,3,'How to Use Event Listeners in JavaScript','how-to-use-event-listeners-in-javascript','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','JavaScript, Web Development',NULL,1,'2022-01-02 17:30:00','2022-10-13 15:46:42'),(4,2,4,'How the Bootstrap Grid Really Works','how-the-bootstrap-grid-really-works','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Bootstrap4, Web Development',NULL,1,'2022-01-03 17:30:00','2022-10-13 15:46:42'),(5,4,3,'Top ECMAScript – ES6 Features Every Javascript Developer Should Know','top-ecmascript-es6-features-every-javascript-developer-should-know','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','JavaScript, ES6, Web Developement',NULL,1,'2022-01-04 17:30:00','2022-10-13 15:46:42'),(6,4,3,'19 JavaScript Math Methods You Should Master Today','19-javascript-math-methods-you-should-master-today','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','JavaScript, ES6, Web Developement',NULL,1,'2022-01-05 17:30:00','2022-10-13 15:46:42'),(7,5,5,'How to Get the Current Date and Time in PHP','how-to-get-the-current-date-and-time-in-php','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','PHP, Date Functions, Web Developement',NULL,1,'2022-01-06 17:30:00','2022-10-13 15:46:42'),(8,1,5,'PHP Array Functions Complete Reference','php-array-functions-complete-reference','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','PHP, PHP Array Method, Web Developement',NULL,1,'2022-01-07 17:30:00','2022-10-13 15:46:42'),(9,1,3,'How to Use Local Storage in JavaScript','how-to-use-local-storage-in-javascript','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','JavaScript, Local Storage, Web Developement',NULL,1,'2022-01-08 17:30:00','2022-10-13 15:46:42'),(10,2,4,'Media Objects in Bootstrap with Examples','media-objects-in-bootstrap-with-examples','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Bootstrap4, Web Developement',NULL,1,'2022-01-09 17:30:00','2022-10-13 15:46:42'),(11,5,6,'Set Session Variable in Laravel','set-session-variable-in-laravel','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Laravel, PHP Framework, Web Developement',NULL,1,'2022-01-10 17:30:00','2022-10-13 15:46:42'),(12,2,6,'Laravel Custom Authentication Tutorial with Example','laravel-custom-authentication-tutorial-with-example','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Laravel, Web Security, Web Developement',NULL,1,'2022-01-11 17:30:00','2022-10-13 15:46:42'),(13,2,4,'Custom Bootstrap Flex Layouts','custom-bootstrap-flex-layouts','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Bootstrap4, Web Developement',NULL,1,'2022-01-12 17:30:00','2022-10-13 15:46:42'),(14,3,6,'Using Laravel Model Factories in Your Tests','using-laravel-model-factories-in-your-tests','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','Laravel, PHP Framework, Database, Web Developement',NULL,1,'2022-01-13 17:30:00','2022-10-13 15:46:42'),(15,5,2,'CSS Positioning – Position Absolute and Relative Example','css-positioning-position-absolute-and-relative-example','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','CSS3, Web Developement',NULL,1,'2022-01-14 17:30:00','2022-10-13 15:46:42'),(16,2,1,'Working with HTML Forms','working-with-html-forms','\r\n        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?\r\n    ','HTML5, Web Developement',NULL,1,'2022-01-15 17:30:00','2022-10-13 15:46:42');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Maung Maung','mgmg@gmail.com','admin','$2y$10$kwjF1biOQbtIrsrEJIORGO7T.DoWweqi8BEcbVKXKKacc8j1LnVUy',NULL,'Yangon, Myanmar','2021-12-31 17:30:00','2022-10-13 15:46:42'),(2,'Aung Aung','agag@gmail.com','admin','$2y$10$kwjF1biOQbtIrsrEJIORGO7T.DoWweqi8BEcbVKXKKacc8j1LnVUy',NULL,'Yangon, Myanmar','2022-01-01 17:30:00','2022-10-13 15:46:42'),(3,'Mo Mo','momo@gmail.com','author','$2y$10$kwjF1biOQbtIrsrEJIORGO7T.DoWweqi8BEcbVKXKKacc8j1LnVUy',NULL,'Yangon, Myanmar','2022-01-02 17:30:00','2022-10-13 15:46:42'),(4,'Jo Jo','jojo@gmail.com','author','$2y$10$kwjF1biOQbtIrsrEJIORGO7T.DoWweqi8BEcbVKXKKacc8j1LnVUy',NULL,'Yangon, Myanmar','2022-01-03 17:30:00','2022-10-13 15:46:42'),(5,'Ho Ho','hoho@gmail.com','author','$2y$10$kwjF1biOQbtIrsrEJIORGO7T.DoWweqi8BEcbVKXKKacc8j1LnVUy',NULL,'Yangon, Myanmar','2022-01-04 17:30:00','2022-10-13 15:46:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-13 22:28:33
