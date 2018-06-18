/*
MySQL Data Transfer
Source Host: localhost
Source Database: db_sams
Target Host: localhost
Target Database: db_sams
Date: 5/22/2017 6:34:32 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tbl_activitylog
-- ----------------------------
CREATE TABLE `tbl_activitylog` (
  `fld_activityId` int(11) NOT NULL AUTO_INCREMENT,
  `fld_activity` varchar(70) DEFAULT NULL,
  `fld_date` varchar(20) DEFAULT NULL,
  `fld_time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`fld_activityId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tbl_attendance_record
-- ----------------------------
CREATE TABLE `tbl_attendance_record` (
  `fld_stud_id` varchar(10) NOT NULL DEFAULT '',
  `fld_stud_name` varchar(50) DEFAULT NULL,
  `fld_absent` int(11) DEFAULT NULL,
  `fld_consumed_hours` int(11) DEFAULT NULL,
  `fld_remaining_hours` double(11,0) DEFAULT NULL,
  `fld_date` varchar(20) DEFAULT NULL,
  `fld_time` varchar(20) DEFAULT NULL,
  `fld_attendance` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`fld_stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tbl_attendancelog
-- ----------------------------
CREATE TABLE `tbl_attendancelog` (
  `fld_stud_id` varchar(10) DEFAULT NULL,
  `fld_stud_name` varchar(50) DEFAULT NULL,
  `fld_login` varchar(20) DEFAULT NULL,
  `fld_logout` varchar(20) DEFAULT NULL,
  `fld_date` varchar(20) DEFAULT NULL,
  `fld_hours_rendered` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tbl_students
-- ----------------------------
CREATE TABLE `tbl_students` (
  `fld_stud_id` varchar(10) NOT NULL DEFAULT '',
  `fld_stud_fname` varchar(15) DEFAULT NULL,
  `fld_stud_mname` varchar(15) DEFAULT NULL,
  `fld_stud_lname` varchar(15) DEFAULT NULL,
  `fld_stud_course` varchar(6) DEFAULT NULL,
  `fld_workplace` varchar(30) DEFAULT NULL,
  `fld_cpnumber` varchar(15) DEFAULT NULL,
  `fld_address` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`fld_stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
CREATE TABLE `tbl_users` (
  `fld_username` varchar(20) DEFAULT NULL,
  `fld_password` varchar(20) DEFAULT NULL,
  `fld_fname` varchar(30) DEFAULT NULL,
  `fld_mname` varchar(20) DEFAULT NULL,
  `fld_lname` varchar(20) DEFAULT NULL,
  `fld_userlevel` varchar(20) DEFAULT NULL,
  `fld_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tbl_attendance_record` VALUES ('14100225', 'Gapuz, Romar Alvarez', '1', '0', '480', '', '', '0');
INSERT INTO `tbl_attendance_record` VALUES ('14101259', 'Lodia, Khervy Duane Cadavis', '0', '0', '480', '', '', '0');
INSERT INTO `tbl_attendance_record` VALUES ('14101708', 'Casugay, Romuel John Madela', '0', '0', '480', '', '', '0');
INSERT INTO `tbl_students` VALUES ('14100225', 'Romar', 'Alvarez', 'Gapuz', 'BSIT', 'Student Affairs Office', '9123456789', 'Lioac Sur, Naguilian La Union');
INSERT INTO `tbl_students` VALUES ('14101259', 'Khervy Duane', 'Cadavis', 'Lodia', 'BSIT', 'Student Affairs Office', '9123456789', 'Ortiz, Naguilian La Union');
INSERT INTO `tbl_students` VALUES ('14101708', 'Romuel John', 'Madela', 'Casugay', 'BSIT', 'Student Affairs Office', '9123456789', 'Lingsat, San Fernando La Union');
INSERT INTO `tbl_users` VALUES ('admingapuz123', '€ðv±},¹Ñ\"¦]4Ì', 'Romar', 'Alvarez', 'Gapuz', 'Admin', '1');
INSERT INTO `tbl_users` VALUES ('adminkhervz123', '€‰$0˜e\'AÂ\r©3yoš', 'Khervy Duane', 'Cadabis', 'Lodia', 'Admin', '1');
INSERT INTO `tbl_users` VALUES ('adminromuax123', '€M’§è$‰Ç§Ùc{ÙË×', 'Romuel John', 'Madela', 'Casugay', 'Admin', '1');
INSERT INTO `tbl_users` VALUES ('dsadsad', '€Yèµðûý®ÇDã´', 'Kier', 'Dsadsa', 'Dsadas', 'Admin', '1');
