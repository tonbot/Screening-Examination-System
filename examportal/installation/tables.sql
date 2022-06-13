CREATE TABLE `question_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` varchar(255) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `correct_opt` tinyint(1) NOT NULL,
  `section` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1


CREATE TABLE `result_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `sectionA_score` varchar(25) DEFAULT NULL,
  `sectionB_score` varchar(25) DEFAULT NULL,
  `sectionC_score` varchar(25) DEFAULT NULL,
  `sectionD_score` varchar(25) DEFAULT NULL,
  `total_score` varchar(25) DEFAULT NULL,
  `totalScore_pcent` varchar(25) DEFAULT NULL,
  `remark` varchar(11) DEFAULT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1


CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1


CREATE TABLE `admin_tbl` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
