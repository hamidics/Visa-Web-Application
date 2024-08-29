SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS applicant_foreign_address;

CREATE TABLE `applicant_foreign_address` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `home_phone` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `id_card` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `home_address` text COLLATE utf8_persian_ci NOT NULL,
  `home_address2` text COLLATE utf8_persian_ci NOT NULL,
  `home_address3` text COLLATE utf8_persian_ci NOT NULL,
  `relation` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `applicant_id` int(30) NOT NULL,
  `parentid` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;




DROP TABLE IF EXISTS applicants;

CREATE TABLE `applicants` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `job` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_no` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `birth_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `birth_place` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `pass_issue_date` date NOT NULL,
  `pass_issue_place` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `pass_validation_date` date NOT NULL,
  `applicant_type` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `phone_num` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `applicant_parent` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO applicants VALUES("2","عبدالله","حمیدی","جمعه گل","کارمند","7987","980","هرات","1391-09-22","هرات","1391-09-21","","88098","");
INSERT INTO applicants VALUES("3","علی احمد","کریمی","کریم شاه","کارمند","همراه (7987)","789","هرات","0000-00-00","همراه ","0000-00-00","سرپرست","8797","7987");
INSERT INTO applicants VALUES("4","مخسی","نمسیتب","نمستی","تتمنیبس","همراه (7987)","987","هرات","0000-00-00","همراه ","0000-00-00","","87897","7987");
INSERT INTO applicants VALUES("5","تمنت","نت","نمت","نت","همراه (7987)","هرات","هرات","0000-00-00","همراه ","0000-00-00","","87897","7987");



DROP TABLE IF EXISTS blacklist;

CREATE TABLE `blacklist` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `created_at` date NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_no` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `details` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;




DROP TABLE IF EXISTS karvan;

CREATE TABLE `karvan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `send_number` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `recipe_date` date NOT NULL,
  `resume` date NOT NULL,
  `omana` date NOT NULL,
  `list_accept` date NOT NULL,
  `interview` date NOT NULL,
  `monifest` date NOT NULL,
  `bill` date NOT NULL,
  `laboratory` date NOT NULL,
  `warranty` date NOT NULL,
  `consultency` date NOT NULL,
  `photos` date NOT NULL,
  `car` date NOT NULL,
  `border` date NOT NULL,
  `back` date NOT NULL,
  `report` date NOT NULL,
  `status` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `mosque_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO karvan VALUES("2","K-000001","ادمین","98","1391-09-14","1391-09-20","1391-09-27","1391-09-21","1391-09-14","1391-09-21","1391-09-21","1391-09-21","1391-09-19","1391-09-19","1391-09-19","0000-00-00","1391-09-12","1391-09-12","1391-09-21","sent","3");



DROP TABLE IF EXISTS karvan_applicants_getinfo;

CREATE TABLE `karvan_applicants_getinfo` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(30) NOT NULL,
  `karvan_id` int(30) NOT NULL,
  `last_address_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO karvan_applicants_getinfo VALUES("2","2","2","0");
INSERT INTO karvan_applicants_getinfo VALUES("3","3","2","0");
INSERT INTO karvan_applicants_getinfo VALUES("4","4","2","0");
INSERT INTO karvan_applicants_getinfo VALUES("5","5","2","0");



DROP TABLE IF EXISTS mosques;

CREATE TABLE `mosques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `responsible` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO mosques VALUES("3","مسجد برامان","هرات","کریم شاه","CM-00001");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `karvans` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `karvan_archive` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `karvan_center` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `report` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `user_management` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `visa_centers` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `newvisa` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `visa_archive` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `visa_resume` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `backup` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO users VALUES("3","ادمین","karim@gmail.com","admin","admin","admin","1","","","","","","","","","","","");



DROP TABLE IF EXISTS visa_applicants;

CREATE TABLE `visa_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `created_at` date NOT NULL,
  `visa_center_id` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `birth_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `birth_place` text COLLATE utf8_persian_ci NOT NULL,
  `marital_status` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_kind` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_num` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_issue_date` date NOT NULL,
  `passport_issue_place` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `job` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `education` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `add_in_iran` text COLLATE utf8_persian_ci NOT NULL,
  `phone_in_iran` text COLLATE utf8_persian_ci NOT NULL,
  `add_in_afghanistan` text COLLATE utf8_persian_ci NOT NULL,
  `phone_in_afghanistan` text COLLATE utf8_persian_ci NOT NULL,
  `job_add_in_afghanistan` text COLLATE utf8_persian_ci NOT NULL,
  `job_phone_in_afghanistan` text COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO visa_applicants VALUES("1","","1391-09-21","none","علی احمد","کریمی","کریم شاه","12","یسی","متاهل","عادی","89","1391-09-20","نتمن","نت","نت","نتمت","808","نمت","منت","نمتمن","ع8","old","");



DROP TABLE IF EXISTS visa_centers;

CREATE TABLE `visa_centers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `responsible` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;




DROP TABLE IF EXISTS visa_dependants;

CREATE TABLE `visa_dependants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `job` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `birth_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `relation` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `education` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO visa_dependants VALUES("1","نت","نت","نت","نتنم","8798","نتمن","نتنم","1");



DROP TABLE IF EXISTS visa_info;

CREATE TABLE `visa_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attach` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `command` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `specialist` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `num_center_mojavez` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `date_center_mojavez` date NOT NULL,
  `visa_type` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `period_of_stay` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `arjaeat` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `issue_date` date NOT NULL,
  `visa_num` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO visa_info VALUES("1","درخواست متقاضی","منت","نمت","نمت","1391-09-13","سیاحتی","90","30","عادی","1391-09-21","89","1");



SET FOREIGN_KEY_CHECKS=1; 
