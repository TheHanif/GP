# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.20-MariaDB)
# Database: grocery
# Generation Time: 2017-02-18 10:02:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `parent_id`, `created_at`, `updated_at`)
VALUES
	(1,'cum2','testing','Quod molestiae facilis molestiae et iste. Eius voluptatem pariatur ducimus id non sapiente magnam.',1,NULL,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(2,'ut','TVDmp9cVSh','Nisi dolorem rerum et et. Qui quia quae qui et. Ipsum libero magni et aperiam quos nemo voluptatibus. Impedit dolorem recusandae vel nostrum exercitationem omnis temporibus.',1,NULL,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(3,'voluptatem','dt97NzNIKi','Laboriosam est qui excepturi quis expedita aut mollitia. Sunt inventore saepe tempore ab assumenda. Nemo optio eius itaque consectetur delectus accusantium facilis. Non illum odit aut velit ea esse.',1,NULL,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(4,'repudiandae','xnIRmOTIVx','Ipsa eum sed dolore inventore. Et a accusantium similique omnis omnis. Doloremque consequatur ut similique et fugit vel nesciunt.',1,NULL,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(5,'quo1','92pS7eyT3n','Ea rerum illum eveniet et facere. Sed et et optio quo nihil enim. Eligendi consequatur et ut.',1,1,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(6,'consequatur','Uwl1Hk3Fuf','Voluptatem odio alias officia sed. Culpa dolorem omnis id provident. Corporis sed molestiae occaecati doloremque quasi quibusdam aut aut.',1,2,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(7,'repellendus','LzcuSZAnA0','Quibusdam vitae exercitationem enim nisi. Ipsam incidunt minima nesciunt occaecati officiis. Ut est nobis vel nihil sint totam.',1,1,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(8,'autem','PgQY9aDiDd12','Magni ut expedita rerum eligendi sed. Id perferendis aut laudantium aut. Maiores eum sit animi ullam ut sed cum.',1,5,'2017-02-11 12:16:44','2017-02-11 12:16:44'),
	(9,'voluptate','rAldvE3zoO','Ducimus eum et earum eum ea omnis doloremque. Et quisquam exercitationem nobis quibusdam dignissimos maxime. Qui autem expedita molestiae quae sequi.',1,NULL,'2017-02-11 12:16:44','2017-02-11 12:16:44');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2017_02_11_103802_create_categories_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
