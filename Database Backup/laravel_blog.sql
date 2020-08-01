/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - laravel_blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `laravel_blog`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(2,'C++','C++ Description','2020-07-29 01:58:05','2020-07-29 01:58:05'),
(3,'PHP','PHP Description','2020-07-29 01:58:26','2020-07-29 01:58:26'),
(4,'Java','Java Description','2020-07-29 01:58:48','2020-07-29 01:58:48'),
(5,'voluptatum','Explicabo ab numquam eos ab.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(6,'et','Dolores qui deserunt consequuntur dolor cumque cum consequatur.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(7,'sunt','Ipsum eius possimus sapiente ex et iusto dolorem.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(8,'quae','Cum atque illo eos dolorum animi quos.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(9,'architecto','Nobis autem quo repellendus reprehenderit.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(10,'dignissimos','Quidem esse et dolores rerum non.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(11,'at','Incidunt repudiandae consequuntur exercitationem et natus.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(12,'tenetur','Error eligendi repudiandae at exercitationem quae sapiente quidem.','2020-07-30 02:06:44','2020-07-30 02:06:44'),
(13,'voluptate','Est cumque sunt eum quos.','2020-07-30 02:06:45','2020-07-30 02:06:45'),
(14,'esse','Fugit velit assumenda voluptates occaecati.','2020-07-30 02:06:45','2020-07-30 02:06:45');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `comments` */

insert  into `comments`(`id`,`body`,`post_id`,`user_id`,`created_at`,`updated_at`) values 
(1,'this is my first comment',2,1,'2020-07-31 00:46:13','2020-07-31 00:46:13');

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `likes` */

insert  into `likes`(`id`,`user_id`,`likeable_type`,`likeable_id`,`created_at`,`updated_at`) values 
(1,2,'App\\Post',4,'2020-07-31 03:38:24','2020-07-31 03:38:24');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2020_07_28_230101_create_posts_table',1),
(4,'2020_07_28_231226_create_categories_table',1),
(6,'2020_07_29_043756_create_tags_table',2),
(7,'2020_07_29_054417_create_post_tag_table',3),
(8,'2020_07_31_001435_create_comments_table',4),
(9,'2020_07_31_030233_create_likes_table',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `post_tag` */

DROP TABLE IF EXISTS `post_tag`;

CREATE TABLE `post_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_tag` */

insert  into `post_tag`(`id`,`post_id`,`tag_id`) values 
(1,4,3),
(2,4,5),
(3,4,2),
(4,1,3),
(5,1,4),
(6,1,5),
(7,2,3),
(8,2,4),
(9,5,2),
(10,5,3),
(11,6,1),
(12,6,5),
(13,7,1),
(14,7,2),
(15,7,5);

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`body`,`thumbnail`,`status`,`category_id`,`user_id`,`created_at`,`updated_at`) values 
(1,'Object Oriented Programming','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','1.jpg',0,4,NULL,'2020-07-29 03:24:04','2020-07-30 06:38:40'),
(2,'Core C++ part 2','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.','2.jpg',0,2,NULL,'2020-07-29 03:26:15','2020-07-30 04:25:50'),
(4,'First Post','this is post body of \"First Post\"','4.jpg',0,4,NULL,'2020-07-29 08:46:44','2020-07-30 04:26:32'),
(5,'Post with image','bla bla blaaaaaaaaa','5.jpg',0,5,NULL,'2020-07-30 03:01:49','2020-07-30 03:01:49'),
(6,'Post with image 2','new post ...........','6.jpg',0,8,NULL,'2020-07-30 03:05:03','2020-07-30 03:41:15'),
(7,'Hello World','This is for test purpose only','7.jpg',0,9,NULL,'2020-07-30 04:23:12','2020-07-30 04:23:12');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(1,'HTML','New Tag','2020-07-29 05:12:04','2020-07-29 05:12:04'),
(2,'CSS',NULL,'2020-07-29 05:12:30','2020-07-29 05:12:30'),
(3,'JS',NULL,'2020-07-29 06:02:29','2020-07-29 06:02:29'),
(4,'JQuery','JQuery desc','2020-07-29 08:13:42','2020-07-29 08:13:42'),
(5,'Vue JS','Vue JS Info','2020-07-29 08:14:17','2020-07-29 08:14:17');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Adib','adib@gmail.com',NULL,'$2y$10$HHGGAbs/vBaDrvbGPrCo5.OjK1HMa5R8qPKQODrbMGbI2r5FEMwGi',NULL,'2020-07-31 01:39:21','2020-07-31 01:39:21'),
(2,'Imran','imran@gmail.com',NULL,'$2y$10$CJupK.XHjJxyIU9w7MtNtuFwYTKqHNylCmStcimcvUSjIiGAsHlvi',NULL,'2020-07-31 01:42:01','2020-07-31 01:42:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
