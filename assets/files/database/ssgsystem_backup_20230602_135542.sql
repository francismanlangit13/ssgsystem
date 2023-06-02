

CREATE TABLE `activity` (
  `activity_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO activity VALUES("1","1","Instamurals 2023","Active");



CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_body` text NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `user_id` (`user_id`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO announcement VALUES("1","1","1","Attention to all Bethelians"," Naa tay activity for Intrams.","2023-05-18 03:15:00","2023-05-19 03:16:00","Active");
INSERT INTO announcement VALUES("2","1","1","adasdada111","asdasdasd ","2023-06-07 21:47:00","2023-06-09 21:47:00","Active");



CREATE TABLE `password_reset_temp` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `password_reset_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `referencenumber` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment VALUES("1","2","Gcash","270","5006289283841","onlinepay_20230601_101610.jpg","2023-06-01 10:38:27","Approved");



CREATE TABLE `payment_platform` (
  `platform_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`platform_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `payment_platform_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment_platform VALUES("1","6","Gcash","image_20230521_143651.jpg","09457664949","2023-05-21 14:43:44","Active");



CREATE TABLE `penalties` (
  `penalty_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `penalty_fee` double NOT NULL,
  `penalty_reason` varchar(255) NOT NULL,
  `penalty_date` datetime NOT NULL,
  PRIMARY KEY (`penalty_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `penalties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO penalties VALUES("1","2","270","Not wearing ID","2023-06-01 10:11:09");



CREATE TABLE `ssg_expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`expense_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `ssg_expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `ssg_expenses_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type_id` (`user_type_id`,`user_status_id`) USING BTREE,
  KEY `user_status_id` (`user_status_id`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("1","User","","Admin","","Male","admin@gmail.com","09347637483","0192023a7bbd73250516f069df18b500","","","0","user_20230601_094744.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","1","1");
INSERT INTO user VALUES("2","Mark Lester","","Summinguit","","Male","franzcarl13@yahoo.com","09545454545","c93ccd78b2076528346216b3b2f701e6","21024851","Grade 10","0","user_20230601_095924.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","6","1");
INSERT INTO user VALUES("3","Vince","","Mutya","","Male","president@gmail.com","09656764646","0192023a7bbd73250516f069df18b500","","","0","user_20230601_100129.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","2","1");
INSERT INTO user VALUES("4","Angelo","","Nobleza","","Male","vicepresident@gmail.com","09267464616","0192023a7bbd73250516f069df18b500","","","0","user_20230601_100217.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","3","1");
INSERT INTO user VALUES("5","Kate","","Ozaraga","II","Female","secretary@gmail.com","09355474316","0192023a7bbd73250516f069df18b500","","","0","user_20230601_100301.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","4","1");
INSERT INTO user VALUES("6","Mike","","Cuadra","Sr","Male","treasurer@gmail.com","09756531646","0192023a7bbd73250516f069df18b500","","","0","user_20230601_100340.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","5","1");
INSERT INTO user VALUES("7","Jovito","Darug","Ebarat","","Male","parent@gmail.com","09846564646","0192023a7bbd73250516f069df18b500","","","0","user_20230601_132159.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","7","1");



CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_status VALUES("1","Active");
INSERT INTO user_status VALUES("2","In Active");
INSERT INTO user_status VALUES("3","Archive");



CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_type VALUES("1","Admin");
INSERT INTO user_type VALUES("2","President");
INSERT INTO user_type VALUES("3","Vice President");
INSERT INTO user_type VALUES("4","Secretary");
INSERT INTO user_type VALUES("5","Treasurer");
INSERT INTO user_type VALUES("6","Student");
INSERT INTO user_type VALUES("7","Parent");

