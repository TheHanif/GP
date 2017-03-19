# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.20-MariaDB)
# Database: grocery
# Generation Time: 2017-03-15 17:59:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Brand 1','brand-1','uploads/dummy/170x90.png','Description 1',1,NULL,NULL),
	(2,'Brand 2','brand-2','uploads/dummy/170x90.png','Description 2',1,NULL,NULL),
	(3,'Brand 3','brand-3','uploads/dummy/170x90.png','Description 3',1,NULL,NULL),
	(4,'Brand 4','brand-4','uploads/dummy/170x90.png','Description 4',1,NULL,NULL),
	(5,'Brand 5','brand-5','uploads/dummy/170x90.png','Description 5',1,NULL,NULL),
	(6,'Brand 6','brand-6','uploads/dummy/170x90.png','Description 6',1,NULL,NULL),
	(7,'Brand 7','brand-7','uploads/dummy/170x90.png','Description 7',1,NULL,NULL);

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_index` (`user_id`),
  KEY `cart_product_id_index` (`product_id`),
  CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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


# Dump of table category_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `category_product_category_id_index` (`category_id`),
  KEY `category_product_product_id_index` (`product_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;

INSERT INTO `category_product` (`category_id`, `product_id`)
VALUES
	(3,1),
	(3,2),
	(3,3),
	(8,1),
	(8,2);

/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table manufacturers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `manufacturers`;

CREATE TABLE `manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `manufacturers` WRITE;
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;

INSERT INTO `manufacturers` (`id`, `name`, `slug`, `logo`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Nokia','nokia','uploads/dummy/170x90.png','Nokia Manufacturer',1,'2017-03-11 11:28:28','2017-03-11 11:28:28');

/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;
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
	(1,'2017_02_11_103802_create_categories_table',1),
	(2,'2014_10_12_000000_create_users_table',2),
	(3,'2014_10_12_100000_create_password_resets_table',2),
	(4,'2017_02_18_150306_create_products_table',3),
	(5,'2017_02_18_162231_create_category_product_pivot_table',4),
	(7,'2017_02_20_170546_create_product_images_table',5),
	(11,'2017_02_23_171439_create_brands_table',6),
	(12,'2017_03_11_061749_create_manufacturers_table',7),
	(13,'2017_03_12_112819_create_related_products_pivot_table',8),
	(14,'2017_03_15_175238_create_cart_table',9);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_index` (`product_id`),
  KEY `product_images_size_index` (`size`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `name`, `size`, `path`, `created_at`, `updated_at`)
VALUES
	(1,1,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,1,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,1,'800.png','large','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,2,'800.png','large','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,2,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,2,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,3,'800.png','large','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,3,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,3,'300.png','thumbnail','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(10,1,'800.png','large','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,1,'800.png','large','uploads/dummy/','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_metas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_metas`;

CREATE TABLE `product_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_metas_product_id_index` (`product_id`),
  KEY `product_metas_meta_key_index` (`meta_key`),
  CONSTRAINT `product_metas_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_metas` WRITE;
/*!40000 ALTER TABLE `product_metas` DISABLE KEYS */;

INSERT INTO `product_metas` (`id`, `product_id`, `meta_key`, `meta_value`)
VALUES
	(1,1,'description','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from'),
	(3,1,'meta_description','Meta Description'),
	(4,1,'long_description','<p>Did you know that your body loses a certain amount of Calcium every day? This Calcium needs to be replenished daily since our body cannot produce it on its own.</p><p>With more Calcium than regular milk, NESTLÉ NESVITA Calcium Plus locks the Calcium in your bones making them strong and healthy. This is because it contains Calci-Lock, a unique combination of Calcium, Vitamin D and other essential vitamins and minerals.</p><p>Just two glasses of NESTLÉ NESVITA Calcium Plus milk helps meet 80% of an adults daily requirement for Calcium intake* and that too with less than 1% fat.</p><p><strong>Storage Instruction:&nbsp;</strong>Once opened, refrigerate and use within 4 days.</p><p><strong>Features &amp; Benefits:</strong></p><ol><li>High Calcium that helps your bones become Strong.</li><li>Low fat</li></ol><p><strong>Ingredients &amp; Allergen Information:</strong>&nbsp;Low Fat Milk, Stabilizer, Minerals and Vitamins.</p>');

/*!40000 ALTER TABLE `product_metas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `sku` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `discount_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_name_index` (`name`),
  KEY `products_slug_index` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_manufacturer_id_foreign` (`manufacturer_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `slug`, `manufacturer_id`, `brand_id`, `sku`, `price`, `discount`, `discount_type`, `status`, `cost`, `created_at`, `updated_at`)
VALUES
	(1,'Product 1','product-1',1,1,'sku1',10.00,10.10,'percentage',1,0.00,NULL,NULL),
	(2,'Product 2','product-2',1,2,'sku2',10.00,2.00,'flat',1,0.00,NULL,NULL),
	(3,'Product 3','product-3',1,1,'sku3',0.00,0.00,'',1,0.00,NULL,NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table related_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `related_products`;

CREATE TABLE `related_products` (
  `product_id` int(10) unsigned NOT NULL,
  `related_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`,`related_id`),
  KEY `related_products_product_id_index` (`product_id`),
  KEY `related_products_related_id_index` (`related_id`),
  CONSTRAINT `related_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `related_products_related_id_foreign` FOREIGN KEY (`related_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `related_products` WRITE;
/*!40000 ALTER TABLE `related_products` DISABLE KEYS */;

INSERT INTO `related_products` (`product_id`, `related_id`)
VALUES
	(1,2),
	(1,3);

/*!40000 ALTER TABLE `related_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Hanif','hanif@hanif.com','$2y$10$PPP/vFPKsnvJplwBSyT8TOePLKPajww7AwrCpVcvDRm/kAcQ8.yOS','rEAohKwpGNivQRZk23yVrc5zxmFVvshQC5hRwbLLbb1ZVpLTMW1ujDaQDARD','2017-03-15 17:47:35','2017-03-15 17:47:35');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
