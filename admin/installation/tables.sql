CREATE TABLE `question_tbl` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `correct_opt` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) 

CREATE TABLE `result_tbl` (
  `id` int(11) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `score` varchar(25) DEFAULT NULL,
  `score_pcent` varchar(25) DEFAULT NULL,
  `remark` varchar(11) DEFAULT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) 
