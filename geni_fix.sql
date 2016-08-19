/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.16 : Database - coba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `gen_0101_user` */

DROP TABLE IF EXISTS `gen_0101_user`;

CREATE TABLE `gen_0101_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_company` varchar(100) DEFAULT NULL,
  `user_typecompany` varchar(50) DEFAULT NULL,
  `user_addresscompany` longtext,
  `user_timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_tokenrest` varchar(100) DEFAULT NULL,
  `user_isactive` tinyint(4) DEFAULT '0',
  `user_isadmin` tinyint(4) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `gen_0101_user` */

insert  into `gen_0101_user`(`id`,`password`,`user_email`,`user_name`,`user_company`,`user_typecompany`,`user_addresscompany`,`user_timecreated`,`user_tokenrest`,`user_isactive`,`user_isadmin`,`deleted_at`) values (11,'$2y$10$wnxUWIckWUilw6GWrigf/u2nVZWYIgjZXLqL5roL5m6ZtxRt75cka','admin@gmail.com','admin','admin','admin','admin','2016-08-15 14:04:51',NULL,0,1,NULL),(12,'$2y$10$eYwiG8Dhuy5BYWG0AadAA.sjY/.w5f1aG3uaU711ZYqDJXnhIMI9K','imamzarqoni95@gmail.com','imam zarqoni','izar inc','IT','jl ITS','2016-08-15 14:49:28','$2y$10$G6v2YXuKIELh3sXNFrvjqOslC2IzIAR4Zibcos15NgjnR7CIEswSu',0,0,NULL);

/*Table structure for table `gen_0102_payment` */

DROP TABLE IF EXISTS `gen_0102_payment`;

CREATE TABLE `gen_0102_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_username` varchar(50) DEFAULT NULL,
  `payment_email` varchar(100) DEFAULT NULL,
  `payment_bank` varchar(50) DEFAULT NULL,
  `payment_description` longtext,
  `payment_isconfirmed` tinyint(4) DEFAULT '0',
  `payment_month` int(11) DEFAULT NULL,
  `payment_payslip` varchar(100) DEFAULT NULL,
  `payment_timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `gen_0102_payment` */

insert  into `gen_0102_payment`(`payment_id`,`payment_username`,`payment_email`,`payment_bank`,`payment_description`,`payment_isconfirmed`,`payment_month`,`payment_payslip`,`payment_timecreated`) values (7,'h','izar@gmail.com','Mandiri','kljlk',1,2,'uploads/payment/21226.jpg','2016-08-16 05:19:44'),(8,'kjka','izar@gmail.com','Mandiri','kljlkjasdf',0,2,'uploads/payment/38780.jpg','2016-08-16 05:30:47');

/*Table structure for table `gen_0103_contact` */

DROP TABLE IF EXISTS `gen_0103_contact`;

CREATE TABLE `gen_0103_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_subject` text,
  `contact_message` longtext,
  `contact_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `gen_0103_contact` */

insert  into `gen_0103_contact`(`contact_id`,`contact_name`,`contact_email`,`contact_subject`,`contact_message`,`contact_timecreated`,`deleted_at`) values (1,'ree','asda@gmail.com','fafaa','afafafafafa','2016-08-09 12:40:55','2016-08-09 05:40:55'),(2,'izar','sasa@gmail.com','asdada','dadadaadafafafafafa','2016-07-29 13:13:57',NULL),(3,'renanda','rectarenanda2@gmail.com','coba contact','halo dunia','2016-07-29 13:16:21',NULL),(4,'wiuwiu','wiwu@gmail.com','dadad','saiawkkwanfandka','2016-07-29 13:17:02',NULL),(5,'uul','uul@yahoo.com','coba','wiuwiuwiuwiu','2016-07-29 13:20:40',NULL),(6,'izar','izar@gmail.com','dasdasd','sadadadada','2016-08-01 15:53:05',NULL),(7,'imam zarqoni','imam@gmail.com','ingin bertanya perihal produk','halo, saya izar dari its\nsaya ingin menanyakan apakah produk yang anda punya dapat digunakan dilingkungan kampus?\nterima kasih','2016-08-09 12:35:41',NULL),(8,'test','test@gmail.com','test','test','2016-08-12 15:11:33',NULL),(9,'ayu','asdf@gmail.com','coba','hay','2016-08-12 15:33:50',NULL),(10,'adad','da@gmail.com','dadaasdadq','adadaddad','2016-08-15 10:55:16',NULL),(11,'izar','izar@gmail.com','test','test test','2016-08-15 14:45:47',NULL),(12,'ciba','coba@gmail.com','cococo','cocococo','2016-08-16 15:53:05',NULL);

/*Table structure for table `gen_0104_news` */

DROP TABLE IF EXISTS `gen_0104_news`;

CREATE TABLE `gen_0104_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text,
  `news_content` longtext NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `gen_0104_news` */

insert  into `gen_0104_news`(`news_id`,`news_title`,`news_content`,`news_image`,`news_timecreated`,`deleted_at`) values (22,'tes ss','<p>nih</p>\n','uploads/24655.jpg','2016-08-09 16:06:40','2016-08-18 03:04:43'),(23,'coba terakhir','<p>dan ternyata ?</p>\n','uploads/43109.jpg','2016-08-09 16:17:39','2016-08-18 03:04:39'),(24,'test lllkk','<p>jijiji</p>\n','uploads/44723.jpg','2016-08-09 16:37:43','2016-08-18 03:04:35'),(25,'mencoba','<p>mencoba</p>\r\n','uploads/82820.jpg','2016-08-11 07:02:14','2016-08-18 03:04:29'),(26,'dimakan harimau','<p>hari minggu pulang dari KBS dimakan harimau</p>\r\n','uploads/23437.JPG','2016-08-11 07:42:54','2016-08-18 03:04:25'),(27,'fitur terbaru','<p>Lorem ipsum dolor sit amet, mel natum possim platonem at. Consulatu incorrupte honestatis ad est, nulla pericula appellantur ius ea. Et aeque aperiam eum, in mucius bonorum vis, at nibh aliquip mea. Sea quidam deseruisse at. Aperiri feugiat voluptaria te quo. Amet delenit vituperatoribus sit te.\r\n\r\nIus an clita recteque. Nihil dissentiunt in has. His ea dicam malorum, mea legere salutatus definitionem an. Cotidieque delicatissimi qui eu, pri tale saepe melius eu, ius sonet admodum praesent eu. Sed ea ferri ceteros feugait, et sit feugait hendrerit.\r\n\r\nNihil discere oportere ea eos. Qui an saepe rationibus repudiandae, id pro tempor imperdiet, minim verterem mei cu. Quot omnesque recteque eu pri, est at ignota facilisi inimicus. Sea no quas iudicabit, mei dicam philosophia at, nemore erroribus ne eum. Vis ei affert nostro. Eum eu quem quis philosophia.\r\n\r\nHis alii consetetur ne. Qui sale essent volutpat ei. Sit fabulas vocibus ei. Vel an novum bonorum fabellas. Vix ut cibo dicat, mei ea duis saepe.\r\n\r\nIn noster facilis officiis ius, sed eu eligendi lobortis intellegebat. Animal labores facilisi ut nec, ut eum iudico electram deterruisset. Vix id harum nihil moderatius. An usu oblique inimicus erroribus, in reque iudicabit eam.</p>\r\n','uploads/54842.JPG','2016-08-11 07:43:56','2016-08-18 03:04:21'),(28,'nanda the noob','<div id=\"Translation\">\r\n<h3><strong>Naskah Lorem Ipsum standar yang digunakan sejak tahun 1500an</strong></h3>\r\n\r\n<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n\r\n<h3>Bagian 1.10.32 dari \"de Finibus Bonorum et Malorum\", ditulis oleh Cicero pada tahun 45 sebelum masehi</h3>\r\n\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>\r\n\r\n<h3>Terjemahan tahun 1914 oleh H. Rackham</h3>\r\n\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>\r\n\r\n<h3>Bagian 1.10.33 dari \"de Finibus Bonorum et Malorum\", ditulis oleh Cicero pada tahun 45 sebelum masehi</h3>\r\n\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>\r\n\r\n<h3>Terjemahan tahun 1914 oleh H. Rackham</h3>\r\n\r\n<p>\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>\r\n</div>\r\n','uploads/76557.jpg','2016-08-11 09:54:35','2016-08-18 03:04:17'),(29,'dongeng','<p>dongeng sebelum <s>tidur </s></p>\r\n','uploads/32733.jpg','2016-08-12 08:38:43','2016-08-12 08:42:11'),(30,'dongeng lalalalalala','<p>dongeng sebelum <s>tidur </s></p>\r\n','uploads/30642.jpg','2016-08-12 08:40:57','2016-08-18 03:04:13'),(31,'Teknologi Baru','<p>wiuwiuwiwuwiu</p>\r\n','uploads/94580.png','2016-08-18 03:06:52',NULL),(32,'flashdisk 128GB','<p>coba flashdisk</p>\r\n','uploads/90247.jpg','2016-08-18 04:06:26',NULL),(33,'Jaringan Wireless','<p>lorem ipsum dolor sit amet</p>\r\n','uploads/74679.jpg','2016-08-18 04:06:57',NULL),(34,'Modern Technology','<p>jaman sekarang, teknologi sudah berkembang pesat</p>\r\n','uploads/48597.jpg','2016-08-18 04:09:13',NULL);

/*Table structure for table `gen_0301_billing` */

DROP TABLE IF EXISTS `gen_0301_billing`;

CREATE TABLE `gen_0301_billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `billing_date` date NOT NULL,
  `billing_duedate` date NOT NULL,
  `billing_activeperiod` int(11) NOT NULL DEFAULT '15',
  `billing_remainingperiod` int(11) NOT NULL DEFAULT '15',
  `billing_status` enum('Trial','Active','Grace Period') NOT NULL DEFAULT 'Trial',
  `billing_isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`billing_id`),
  KEY `FK_gen_0301_billing_gen_0101_user` (`fk_user_id`),
  CONSTRAINT `FK_gen_0301_billing_gen_0101_user` FOREIGN KEY (`fk_user_id`) REFERENCES `gen_0101_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `gen_0301_billing` */

insert  into `gen_0301_billing`(`billing_id`,`fk_user_id`,`billing_date`,`billing_duedate`,`billing_activeperiod`,`billing_remainingperiod`,`billing_status`,`billing_isactive`) values (51,12,'2016-08-15','2016-12-28',135,135,'Active',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
