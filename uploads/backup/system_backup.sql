#
# TABLE STRUCTURE FOR: attendance
#

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `atten_batch_id` int(11) NOT NULL,
  `atten_student_id` int(11) NOT NULL,
  `present` varchar(2) NOT NULL,
  `atten_date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: batch
#

DROP TABLE IF EXISTS `batch`;

CREATE TABLE `batch` (
  `batchid` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `batch_day` varchar(250) NOT NULL,
  `batch_time` varchar(50) NOT NULL,
  `batch_status` varchar(10) NOT NULL DEFAULT 'Running',
  PRIMARY KEY (`batchid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `batch` (`batchid`, `batch_id`, `start_date`, `batch_day`, `batch_time`, `batch_status`) VALUES (15, '1802', '2018-07-11', 'Sat,Mon,Wed', '10 : 03 AM', 'Running');
INSERT INTO `batch` (`batchid`, `batch_id`, `start_date`, `batch_day`, `batch_time`, `batch_status`) VALUES (18, '1805', '2018-07-23', 'Sat,Mon,Tue', '3 : 35 PM', 'End');
INSERT INTO `batch` (`batchid`, `batch_id`, `start_date`, `batch_day`, `batch_time`, `batch_status`) VALUES (19, '1806', '2018-07-01', 'Sat,Mon,Wed', '4 : 09 PM', 'End');
INSERT INTO `batch` (`batchid`, `batch_id`, `start_date`, `batch_day`, `batch_time`, `batch_status`) VALUES (20, '1807', '2018-07-16', 'Sat,Mon', '4 : 00 PM', 'Running');


#
# TABLE STRUCTURE FOR: payment
#

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `payment_batch_id` int(11) NOT NULL,
  `payment_st_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_month` varchar(11) NOT NULL,
  `pay` int(11) NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO `payment` (`paymentid`, `payment_batch_id`, `payment_st_id`, `pay_date`, `pay_month`, `pay`) VALUES (28, 15, 6, '2018-07-31', '1811', 300);
INSERT INTO `payment` (`paymentid`, `payment_batch_id`, `payment_st_id`, `pay_date`, `pay_month`, `pay`) VALUES (29, 15, 11, '2018-07-31', '1810', 300);


#
# TABLE STRUCTURE FOR: student
#

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_mobile` varchar(15) NOT NULL,
  `education` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `activity` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `student` (`studentid`, `student_id`, `batch_id`, `student_name`, `student_mobile`, `education`, `class`, `address`, `blood_group`, `activity`) VALUES (6, '180202', '15', 'Joy Mazumder', '45343', '', '', '', '', 'Active');
INSERT INTO `student` (`studentid`, `student_id`, `batch_id`, `student_name`, `student_mobile`, `education`, `class`, `address`, `blood_group`, `activity`) VALUES (7, '180203', '15', 'dfshgfdgsdfg', '4544545', '', '', '', '', 'Close');
INSERT INTO `student` (`studentid`, `student_id`, `batch_id`, `student_name`, `student_mobile`, `education`, `class`, `address`, `blood_group`, `activity`) VALUES (10, '180501', '18', 'fgsdf', '4532', '', '', '', '', 'Closed');
INSERT INTO `student` (`studentid`, `student_id`, `batch_id`, `student_name`, `student_mobile`, `education`, `class`, `address`, `blood_group`, `activity`) VALUES (11, '180204', '15', 'dfgd', '4323425', '', '', '', '', 'Active');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `last_login` text NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `name`, `email`, `user_mobile`, `user_name`, `password`, `status`, `last_login`, `role`) VALUES (1, 'Shipan Mazumder', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active', '', 'admin');
INSERT INTO `users` (`user_id`, `name`, `email`, `user_mobile`, `user_name`, `password`, `status`, `last_login`, `role`) VALUES (2, 'User', 'user@gmail.com', '0180000000000', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'active', '', 'user');


