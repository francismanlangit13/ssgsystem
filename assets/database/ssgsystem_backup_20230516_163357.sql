

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO announcement VALUES("1","1","1","Attention to all Bethelians"," Naa tay activity for Intrams.","2023-05-18 03:15:00","2023-05-19 03:16:00","Active");



CREATE TABLE `fines_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fines_fee` double NOT NULL,
  `fines_date` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `fines_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO fines_transaction VALUES("1","4","256.75","2023-03-02 13:52:35");
INSERT INTO fines_transaction VALUES("2","4","500","2023-04-10 08:43:32");
INSERT INTO fines_transaction VALUES("3","4","1000","2023-05-01 15:54:33");



CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `referencenumber` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment VALUES("1","4","Gcash","14568435355","user_20230503_232958.jpg","2023-05-03 15:24:45","Pending");



CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `qrcode_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `ssg_expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`expense_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `ssg_expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `ssg_expenses_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO ssg_expenses VALUES("1","1","1","Materials","plywood","374.75","1686425","user_20230503_232958.jpg","2023-04-17 15:30:15");
INSERT INTO ssg_expenses VALUES("2","1","1","Supply","Gamit sa intrams","175","116542","user_20230503_232958.jpg","2023-04-17 15:40:15");



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
  `penalty` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("1","User","","Admin","","","admin@gmail.com","09457664949","0192023a7bbd73250516f069df18b500","","","","","user_20230504_101038.png","0000-00-00 00:00:00","","0000-00-00 00:00:00","1","1");
INSERT INTO user VALUES("2","Francis","","Carlo","Jr","Male","franzcarl13@yahoo.com","09457664949","da9c57995b3ecdbe8621f7f7fcf477ab","","","","","user_20230504_101038.png","0000-00-00 00:00:00","User Admin","2023-05-09 15:10:34","2","1");
INSERT INTO user VALUES("3","new parent1","","new","Jr","Male","franzcarl13@yahoo.com","09457664949","da9c57995b3ecdbe8621f7f7fcf477ab","","","","","user_20230504_104014.png","2023-05-03 04:06:31","User Admin","2023-05-09 15:12:41","4","1");
INSERT INTO user VALUES("4","Student","","Franz","Sr","Male","franzcarl13@yahoo.com","09457664949","da9c57995b3ecdbe8621f7f7fcf477ab","2019300208","Grade 10","","","user_20230504_140135.png","2023-04-21 12:07:07","User Admin","2023-05-09 15:13:33","6","1");
INSERT INTO user VALUES("5","new","","admin","","Male","admin1@gmail.com","09457664949","f7b8bb95e0c1c5138688c03f2fce0b2a","","","","","user_20230504_150919.png","0000-00-00 00:00:00","User Admin","2023-05-01 03:11:07","5","1");
INSERT INTO user VALUES("10","Francis Carlo","A","Manlangit","","Male","franzcarl13@yahoo.com","9457664949","edf44baefd0446161387123dda451842","3-2019300208","Grade 12","","","","2023-05-13 23:57:05","User Admin","2023-05-16 16:00:32","6","3");
INSERT INTO user VALUES("11","Christine Mae","I","Balmadres","","Female","christinemae@gmail.com","9457664948","9757a3ae2eee5925ce7db02aa692241e","3-2019300207","Grade 11","","","","2023-05-13 23:57:05","User Admin","2023-05-16 16:00:35","6","3");
INSERT INTO user VALUES("12","Andrie","A","Manlangit","","Male","andrie164@yahoo.com","9452671554","edf44baefd0446161387123dda451842","3-2019300208","","","","","2023-05-14 00:28:14","User Admin","2023-05-14 00:29:45","6","3");
INSERT INTO user VALUES("13","Karl","S","Tare","","Male","karltare@gmail.com","9154625468","9757a3ae2eee5925ce7db02aa692241e","3-2019300207","","","","","2023-05-14 00:28:14","User Admin","2023-05-14 00:29:49","6","3");
INSERT INTO user VALUES("14","Andrie","A","Manlangit","","Male","andrie164@yahoo.com","9452671554","edf44baefd0446161387123dda451842","","","","","","2023-05-14 00:29:59","User Admin","2023-05-14 00:30:04","7","3");
INSERT INTO user VALUES("15","Karl","S","Tare","","Male","karltare@gmail.com","9154625468","9757a3ae2eee5925ce7db02aa692241e","","","","","","2023-05-14 00:29:59","User Admin","2023-05-14 00:30:07","7","3");
INSERT INTO user VALUES("16","Andrie","A","Manlangit","","Male","andrie164@yahoo.com","9452671554","edf44baefd0446161387123dda451842","","","","","","2023-05-14 00:30:34","","0000-00-00 00:00:00","7","1");
INSERT INTO user VALUES("17","Karl","S","Tare","","Male","karltare@gmail.com","9154625468","9757a3ae2eee5925ce7db02aa692241e","","","","","","2023-05-14 00:30:34","","0000-00-00 00:00:00","7","1");
INSERT INTO user VALUES("18","Francis Carlo","A","Manlangit","","Male","franzcarl13@yahoo.com","9457664949","edf44baefd0446161387123dda451842","3-2019300208","Grade 7","","","","2023-05-16 16:00:47","User Admin","2023-05-16 16:02:12","6","3");
INSERT INTO user VALUES("19","Christine Mae","I","Balmadres","","Female","christinemae@gmail.com","9457664948","9757a3ae2eee5925ce7db02aa692241e","3-2019300207","Grade 7","","","","2023-05-16 16:00:47","User Admin","2023-05-16 16:02:15","6","3");
INSERT INTO user VALUES("20","Francis Carlo","A","Manlangit","","Male","franzcarl13@yahoo.com","9457664949","edf44baefd0446161387123dda451842","3-2019300208","Grade 11","","","","2023-05-16 16:02:23","","0000-00-00 00:00:00","6","1");
INSERT INTO user VALUES("21","Christine Mae","I","Balmadres","","Female","christinemae@gmail.com","9457664948","9757a3ae2eee5925ce7db02aa692241e","3-2019300207","Grade 11","","","","2023-05-16 16:02:23","","0000-00-00 00:00:00","6","1");



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

