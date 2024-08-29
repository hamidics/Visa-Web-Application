SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS basebook;

CREATE TABLE `basebook` (
  `student_id` int(11) NOT NULL,
  `offical_letter_no` varchar(20) DEFAULT NULL,
  `offical_letter_date` date DEFAULT NULL,
  `offical_to` varchar(50) DEFAULT NULL,
  `conversion_letter_no` varchar(20) DEFAULT NULL,
  `conversion_letter_date` date DEFAULT NULL,
  `conversion_from` varchar(50) DEFAULT NULL,
  `conversion_to` varchar(50) DEFAULT NULL,
  `interim_separate_subject` varchar(50) DEFAULT NULL,
  `interim_separate_letter_no` varchar(50) DEFAULT NULL,
  `interim_separate_letter_date` date DEFAULT NULL,
  `permanent_separate_subject` varchar(50) DEFAULT NULL,
  `permanent_separate_letter_no` varchar(20) DEFAULT NULL,
  `permanent_separate_letter_date` date DEFAULT NULL,
  `exclude_one_semester` varchar(50) DEFAULT NULL,
  `exclude_two_semesters` varchar(50) DEFAULT NULL,
  `warning` varchar(50) DEFAULT NULL,
  `separation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO basebook VALUES("1","34","0000-00-00","computer sience","342","0000-00-00","male","male","on","898","0000-00-00","tajel","679","1350-06-07","yes","no","no","21");



DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO category VALUES("1","پروگرام نویسی","");
INSERT INTO category VALUES("2","علوم‌ كمپيوتر","");
INSERT INTO category VALUES("3","ریاضات","");
INSERT INTO category VALUES("4","انگلیسی","");
INSERT INTO category VALUES("5","اسلامیات","");
INSERT INTO category VALUES("6","شبکه","");
INSERT INTO category VALUES("7","مدیریت","");
INSERT INTO category VALUES("8","سافتویر انجینیرنگ","");
INSERT INTO category VALUES("9","نوشتاری علمی","");
INSERT INTO category VALUES("10","داتابیس","");
INSERT INTO category VALUES("11","علوم‌ كمپيوتر و اجتماع","");
INSERT INTO category VALUES("12","کد باز","");
INSERT INTO category VALUES("13","پایان نامه","");



DROP TABLE IF EXISTS departement;

CREATE TABLE `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `establish_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO departement VALUES("1","داتابیس","2011-03-01");
INSERT INTO departement VALUES("2","نیتورکینگ","2011-03-01");
INSERT INTO departement VALUES("3","سافتویر انجینیرنگ","2011-03-01");
INSERT INTO departement VALUES("4","عمومی","2004-03-01");



DROP TABLE IF EXISTS dependent;

CREATE TABLE `dependent` (
  `name` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `occupation_place` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `relation` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO dependent VALUES("عغغهع","13","غعهغهع","عهغه","76868","father");
INSERT INTO dependent VALUES("فغف","14","غفع","فغعف","5656","father");
INSERT INTO dependent VALUES("لات","15","التال","لاتل","76677","brother");
INSERT INTO dependent VALUES("الال","16","لال","لال","5656","brother");
INSERT INTO dependent VALUES("فغغف","16","فغفغ","غفغعف","6767","father");
INSERT INTO dependent VALUES("ستبنسمت","17","تنت","تنت","تنمت","uncle");
INSERT INTO dependent VALUES("اعاغعه","19","غعغ","غعهغهع","عهغ","brother");
INSERT INTO dependent VALUES("iuyiy","16","yuiyu","uiyui","yuiyui","father");



DROP TABLE IF EXISTS district;

CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

INSERT INTO district VALUES("1","ترینکوت","1");
INSERT INTO district VALUES("2","چوره","1");
INSERT INTO district VALUES("3","خاص ارزگان","1");
INSERT INTO district VALUES("4","ده راود","1");
INSERT INTO district VALUES("5","شهیدحساس","1");
INSERT INTO district VALUES("6","آب کمری","2");
INSERT INTO district VALUES("7","جاوند","2");
INSERT INTO district VALUES("8","غورماچ","2");
INSERT INTO district VALUES("9","قادس","2");
INSERT INTO district VALUES("10","قلعه نو","2");
INSERT INTO district VALUES("11","مرغاب","2");
INSERT INTO district VALUES("12","مقور","2");
INSERT INTO district VALUES("13","کابل","22");
INSERT INTO district VALUES("14","میربچه کوت","22");
INSERT INTO district VALUES("15","ده سبز","22");
INSERT INTO district VALUES("16","کلکان","22");
INSERT INTO district VALUES("17","قره باغ","22");
INSERT INTO district VALUES("18","استالف","22");
INSERT INTO district VALUES("19","شکردره","22");
INSERT INTO district VALUES("20","پغمان","22");
INSERT INTO district VALUES("21","چهارآسیاب","22");
INSERT INTO district VALUES("22","بگرامی","22");
INSERT INTO district VALUES("23","خاک جبار","22");
INSERT INTO district VALUES("24","سروبی","22");
INSERT INTO district VALUES("25","گلدره","22");
INSERT INTO district VALUES("26","موسی","22");
INSERT INTO district VALUES("27","فرزه","22");
INSERT INTO district VALUES("28","هرات","33");
INSERT INTO district VALUES("29","انجیل","33");
INSERT INTO district VALUES("30","گذره","33");
INSERT INTO district VALUES("31","پشتون زرغون","33");
INSERT INTO district VALUES("32","کروخ","33");
INSERT INTO district VALUES("33","کوشک","33");
INSERT INTO district VALUES("34","گلران","33");
INSERT INTO district VALUES("35","خواشان","33");
INSERT INTO district VALUES("36","غوریان","33");
INSERT INTO district VALUES("37","اندجان","33");
INSERT INTO district VALUES("38","ادرسکن","33");
INSERT INTO district VALUES("39","اوبی","33");
INSERT INTO district VALUES("40","فارسی","33");
INSERT INTO district VALUES("41","شندند","33");
INSERT INTO district VALUES("42","چشت شریف","33");
INSERT INTO district VALUES("43","کشک کهنه","33");



DROP TABLE IF EXISTS droped;

CREATE TABLE `droped` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `goten_credits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO droped VALUES("1","1","1","5");
INSERT INTO droped VALUES("2","1","1","5");
INSERT INTO droped VALUES("3","1","2","5");
INSERT INTO droped VALUES("4","1","3","5");
INSERT INTO droped VALUES("5","1","4","5");
INSERT INTO droped VALUES("6","1","5","5");
INSERT INTO droped VALUES("7","1","6","5");
INSERT INTO droped VALUES("8","1","7","5");
INSERT INTO droped VALUES("9","1","8","5");
INSERT INTO droped VALUES("10","1","0","5");
INSERT INTO droped VALUES("11","1","1","5");



DROP TABLE IF EXISTS province;

CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO province VALUES("1","ارزگان");
INSERT INTO province VALUES("2","بادغیس");
INSERT INTO province VALUES("3","بامیان");
INSERT INTO province VALUES("4","بدخشان");
INSERT INTO province VALUES("5","بغلان");
INSERT INTO province VALUES("6","بلخ");
INSERT INTO province VALUES("7","پروان");
INSERT INTO province VALUES("8","پکتیا");
INSERT INTO province VALUES("9","پکتیکا");
INSERT INTO province VALUES("10","پنجشیر");
INSERT INTO province VALUES("11","تخار");
INSERT INTO province VALUES("12","جوزجان");
INSERT INTO province VALUES("13","خوست");
INSERT INTO province VALUES("14","دایکندی");
INSERT INTO province VALUES("15","زابل");
INSERT INTO province VALUES("16","سرپل");
INSERT INTO province VALUES("17","سمنگان");
INSERT INTO province VALUES("18","غزنی");
INSERT INTO province VALUES("19","غور");
INSERT INTO province VALUES("20","فاریاب");
INSERT INTO province VALUES("21","فراه");
INSERT INTO province VALUES("22","کابل");
INSERT INTO province VALUES("23","کاپیسا");
INSERT INTO province VALUES("24","کندوز");
INSERT INTO province VALUES("25","کندهار");
INSERT INTO province VALUES("26","کنر");
INSERT INTO province VALUES("27","لغمان");
INSERT INTO province VALUES("28","لوگر");
INSERT INTO province VALUES("29","ننگرهار");
INSERT INTO province VALUES("30","نورستان");
INSERT INTO province VALUES("31","نیمروز");
INSERT INTO province VALUES("32","وردک");
INSERT INTO province VALUES("33","هرات");
INSERT INTO province VALUES("34","هیلمند");



DROP TABLE IF EXISTS score;

CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `semester_term_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `chance_1` float DEFAULT NULL,
  `chance_2` float DEFAULT NULL,
  `present` int(11) DEFAULT NULL,
  `absent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

INSERT INTO score VALUES("1","1","1","1","22","23","22","22");
INSERT INTO score VALUES("2","2","1","1","34","34","33","33");
INSERT INTO score VALUES("3","3","1","1","45","80","2","2");
INSERT INTO score VALUES("4","4","1","1","0","0","0","0");
INSERT INTO score VALUES("5","5","1","1","45","49","100","100");
INSERT INTO score VALUES("6","6","2","1","95","","95","5");
INSERT INTO score VALUES("7","7","2","1","1","1","1","1");
INSERT INTO score VALUES("8","41","2","8","100","100","100","100");
INSERT INTO score VALUES("9","8","2","1","95","0","90","10");
INSERT INTO score VALUES("10","41","2","10","100","100","100","100");
INSERT INTO score VALUES("11","11","3","1","94","","98","2");
INSERT INTO score VALUES("12","12","3","1","0","0","0","0");
INSERT INTO score VALUES("13","13","3","1","100","100","100","100");
INSERT INTO score VALUES("14","14","3","1","1","1","1","1");
INSERT INTO score VALUES("15","15","3","1","96","","95","5");
INSERT INTO score VALUES("16","16","4","1","97","","100","0");
INSERT INTO score VALUES("17","17","4","1","90","","97","3");
INSERT INTO score VALUES("18","18","4","1","100","","97","3");
INSERT INTO score VALUES("19","19","4","1","91","","90","10");
INSERT INTO score VALUES("20","20","4","1","89","","95","5");
INSERT INTO score VALUES("21","1","1","2","22","65","90","10");
INSERT INTO score VALUES("22","2","1","2","24","59","93","7");
INSERT INTO score VALUES("23","3","1","2","56","0","90","10");
INSERT INTO score VALUES("24","4","1","2","89","0","87","13");
INSERT INTO score VALUES("25","5","1","2","100","100","100","100");
INSERT INTO score VALUES("26","6","2","2","0","100","0","0");
INSERT INTO score VALUES("27","7","2","2","1","1","1","1");
INSERT INTO score VALUES("28","8","2","2","83","","90","10");
INSERT INTO score VALUES("29","9","2","2","12","12","12","12");
INSERT INTO score VALUES("30","10","2","2","89","0","95","5");
INSERT INTO score VALUES("31","11","3","2","92","0","89","11");
INSERT INTO score VALUES("32","12","3","2","0","0","0","0");
INSERT INTO score VALUES("33","13","3","2","100","100","100","100");
INSERT INTO score VALUES("34","14","3","2","1","1","1","1");
INSERT INTO score VALUES("35","15","3","2","92","0","89","11");
INSERT INTO score VALUES("36","16","4","2","85","","98","2");
INSERT INTO score VALUES("37","17","4","2","85","","89","11");
INSERT INTO score VALUES("38","18","4","2","89","","90","10");
INSERT INTO score VALUES("39","19","4","2","89","","95","5");
INSERT INTO score VALUES("40","20","4","2","87","","89","11");
INSERT INTO score VALUES("41","1","1","3","99","0","98","2");
INSERT INTO score VALUES("42","2","1","3","49","55","97","3");
INSERT INTO score VALUES("43","3","1","3","55","0","97","3");
INSERT INTO score VALUES("44","4","1","3","42","78","95","5");
INSERT INTO score VALUES("45","5","1","3","23","54","100","100");
INSERT INTO score VALUES("46","6","2","3","70","","100","0");
INSERT INTO score VALUES("47","7","2","3","123","1","1","1");
INSERT INTO score VALUES("48","8","2","3","81","","97","3");
INSERT INTO score VALUES("49","9","2","3","89","","90","10");
INSERT INTO score VALUES("50","10","2","3","89","","89","11");
INSERT INTO score VALUES("51","11","3","3","77","","100","0");
INSERT INTO score VALUES("52","12","3","3","0","0","0","0");
INSERT INTO score VALUES("53","13","3","3","100","100","100","100");
INSERT INTO score VALUES("54","14","3","3","1","1","1","1");
INSERT INTO score VALUES("55","15","3","3","87","","95","5");
INSERT INTO score VALUES("56","16","4","3","80","","98","2");
INSERT INTO score VALUES("57","17","4","3","86","","93","7");
INSERT INTO score VALUES("58","18","4","3","70","","90","10");
INSERT INTO score VALUES("59","19","4","3","78","","95","5");
INSERT INTO score VALUES("60","20","4","3","89","","89","11");
INSERT INTO score VALUES("61","1","9","7","50","81","90","10");
INSERT INTO score VALUES("62","2","9","7","80","","97","3");
INSERT INTO score VALUES("63","3","9","7","77","","90","10");
INSERT INTO score VALUES("64","4","9","7","83","","87","13");
INSERT INTO score VALUES("65","5","9","7","87","","89","11");
INSERT INTO score VALUES("66","6","10","7","77","","98","2");
INSERT INTO score VALUES("67","7","10","7","80","0","93","7");
INSERT INTO score VALUES("68","8","10","7","81","","90","10");
INSERT INTO score VALUES("69","9","10","7","22","67","22","22");
INSERT INTO score VALUES("70","10","10","7","33","0","89","11");
INSERT INTO score VALUES("71","11","11","7","79","","90","10");
INSERT INTO score VALUES("72","12","11","7","55","55","55","55");
INSERT INTO score VALUES("73","13","11","7","0","0","0","0");
INSERT INTO score VALUES("74","14","11","7","89","","95","5");
INSERT INTO score VALUES("75","15","11","7","80","","92","8");
INSERT INTO score VALUES("76","16","12","7","73","","96","4");
INSERT INTO score VALUES("77","17","12","7","100","100","100","100");
INSERT INTO score VALUES("78","18","12","7","81","","90","10");
INSERT INTO score VALUES("79","43","12","8","95","0","95","5");
INSERT INTO score VALUES("80","44","12","8","100","0","100","0");
INSERT INTO score VALUES("81","1","9","9","87","","90","10");
INSERT INTO score VALUES("82","2","9","9","85","","89","11");
INSERT INTO score VALUES("83","3","9","9","83","","92","8");
INSERT INTO score VALUES("84","4","9","9","91","","87","13");
INSERT INTO score VALUES("85","5","9","9","80","","80","20");
INSERT INTO score VALUES("86","6","10","9","85","","95","5");
INSERT INTO score VALUES("87","7","10","9","86","0","97","3");
INSERT INTO score VALUES("88","8","10","9","77","","90","10");
INSERT INTO score VALUES("89","9","10","9","91","0","95","5");
INSERT INTO score VALUES("90","10","10","9","33","0","89","11");
INSERT INTO score VALUES("91","11","11","9","85","","98","2");
INSERT INTO score VALUES("92","12","11","9","76","","93","7");
INSERT INTO score VALUES("93","13","11","9","0","0","0","0");
INSERT INTO score VALUES("94","14","11","9","78","","95","5");
INSERT INTO score VALUES("95","15","11","9","87","","95","5");
INSERT INTO score VALUES("96","16","12","9","50","50","50","50");
INSERT INTO score VALUES("97","17","12","9","85","","97","3");
INSERT INTO score VALUES("98","18","12","9","83","","92","8");
INSERT INTO score VALUES("99","19","12","9","22","22","22","22");
INSERT INTO score VALUES("100","20","12","9","89","","80","20");
INSERT INTO score VALUES("101","1","9","10","67","","88","12");
INSERT INTO score VALUES("102","43","9","10","95","0","95","5");
INSERT INTO score VALUES("103","44","9","10","100","0","100","0");
INSERT INTO score VALUES("104","4","9","10","78","","87","13");
INSERT INTO score VALUES("105","5","9","10","69","","89","11");
INSERT INTO score VALUES("106","6","10","10","77","","88","12");
INSERT INTO score VALUES("107","7","10","10","1","56","1","1");
INSERT INTO score VALUES("108","8","10","10","74","","97","3");
INSERT INTO score VALUES("109","9","10","10","83","0","90","10");
INSERT INTO score VALUES("110","10","10","10","22","0","92","8");
INSERT INTO score VALUES("111","11","11","10","87","","90","10");
INSERT INTO score VALUES("112","12","11","10","73","","99","1");
INSERT INTO score VALUES("113","13","11","10","0","0","0","0");
INSERT INTO score VALUES("114","14","11","10","91","","95","5");
INSERT INTO score VALUES("115","15","11","10","89","","95","5");
INSERT INTO score VALUES("116","16","12","10","43","77","98","2");
INSERT INTO score VALUES("117","17","12","10","86","","93","7");
INSERT INTO score VALUES("118","18","12","10","70","","97","3");
INSERT INTO score VALUES("119","19","12","9","22","22","22","22");
INSERT INTO score VALUES("120","20","12","10","87","","95","5");
INSERT INTO score VALUES("121","2","2","2","24","59","93","7");
INSERT INTO score VALUES("122","2","2","3","49","55","97","3");
INSERT INTO score VALUES("123","3","3","3","55","0","97","3");
INSERT INTO score VALUES("124","23","8","20364","","","","");
INSERT INTO score VALUES("125","24","8","20345","","","","");
INSERT INTO score VALUES("126","23","6","4444","","","","");
INSERT INTO score VALUES("127","27","6","1","","","","");
INSERT INTO score VALUES("128","28","6","1","","","","");
INSERT INTO score VALUES("129","29","6","1","","","","");
INSERT INTO score VALUES("130","30","6","1","","","","");
INSERT INTO score VALUES("131","27","6","6","22","22","22","22");
INSERT INTO score VALUES("132","28","6","6","","","","");
INSERT INTO score VALUES("133","29","6","6","","","","");
INSERT INTO score VALUES("134","30","6","6","45","65","88","12");
INSERT INTO score VALUES("135","27","20","11","55","0","95","5");
INSERT INTO score VALUES("136","28","20","11","33","97","97","3");
INSERT INTO score VALUES("137","29","20","11","78","0","98","2");
INSERT INTO score VALUES("138","30","20","11","88","0","89","11");
INSERT INTO score VALUES("141","45","8","1","","","","");
INSERT INTO score VALUES("140","0","0","0","","","","");
INSERT INTO score VALUES("142","44","8","1","","","","");
INSERT INTO score VALUES("143","42","8","1","","","","");
INSERT INTO score VALUES("144","4","1","5","0","0","0","0");
INSERT INTO score VALUES("145","7","6","5","","","","");
INSERT INTO score VALUES("146","0","0","0","","","","");
INSERT INTO score VALUES("147","0","0","0","","","","");
INSERT INTO score VALUES("148","0","0","0","","","","");
INSERT INTO score VALUES("149","0","0","0","","","","");
INSERT INTO score VALUES("150","0","0","0","","","","");
INSERT INTO score VALUES("151","0","0","0","","","","");
INSERT INTO score VALUES("152","4","1","1","0","0","0","0");
INSERT INTO score VALUES("153","22","15","22","","","","");
INSERT INTO score VALUES("154","0","17","0","","","","");
INSERT INTO score VALUES("155","65","19","0","","","","");
INSERT INTO score VALUES("156","65","19","1","","","","");



DROP TABLE IF EXISTS semester;

CREATE TABLE `semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO semester VALUES("1","سمستر اول");
INSERT INTO semester VALUES("2","سمستر دوم");
INSERT INTO semester VALUES("3","سمستر سوم");
INSERT INTO semester VALUES("4","سمستر چهارم");
INSERT INTO semester VALUES("5","سمستر پنجم");
INSERT INTO semester VALUES("6","سمستر ششم");
INSERT INTO semester VALUES("7","سمستر هفتم");
INSERT INTO semester VALUES("8","سمستر هشتم");



DROP TABLE IF EXISTS semester_term;

CREATE TABLE `semester_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO semester_term VALUES("1","5","1","2008-03-01","2008-07-15");
INSERT INTO semester_term VALUES("2","5","2","2008-08-16","2008-12-31");
INSERT INTO semester_term VALUES("3","5","3","2009-03-01","2009-07-15");
INSERT INTO semester_term VALUES("4","5","4","2009-08-16","2009-12-31");
INSERT INTO semester_term VALUES("5","5","5","2010-03-01","2010-07-15");
INSERT INTO semester_term VALUES("6","5","6","2010-08-16","2010-12-31");
INSERT INTO semester_term VALUES("7","5","7","2011-03-01","2011-07-15");
INSERT INTO semester_term VALUES("8","5","8","2011-08-16","2011-12-31");
INSERT INTO semester_term VALUES("9","6","1","2009-03-01","2009-07-15");
INSERT INTO semester_term VALUES("10","6","2","2009-08-16","2009-12-31");
INSERT INTO semester_term VALUES("11","6","3","2010-03-01","2010-07-15");
INSERT INTO semester_term VALUES("12","6","4","2010-08-16","2010-12-31");
INSERT INTO semester_term VALUES("13","6","5","2011-03-01","2011-07-15");
INSERT INTO semester_term VALUES("14","6","6","2011-08-16","2011-12-31");
INSERT INTO semester_term VALUES("15","7","1","2010-03-01","2010-07-15");
INSERT INTO semester_term VALUES("16","7","2","2010-08-16","2010-12-31");
INSERT INTO semester_term VALUES("17","7","3","2011-03-01","2011-07-15");
INSERT INTO semester_term VALUES("18","7","4","2011-08-16","2011-12-31");
INSERT INTO semester_term VALUES("19","8","1","2011-03-01","2011-07-15");
INSERT INTO semester_term VALUES("20","8","2","2011-08-16","2011-12-31");



DROP TABLE IF EXISTS student;

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `photo` text,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `grand_father_name` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `native_language` varchar(50) NOT NULL,
  `bio_page` varchar(50) NOT NULL,
  `bio_volume` varchar(50) NOT NULL,
  `bio_record` varchar(50) NOT NULL,
  `bio_issue_in` int(11) NOT NULL,
  `bio_general_no` varchar(50) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `high_school` varchar(100) NOT NULL,
  `sch_graduation_year` date NOT NULL,
  `cur_district_id` int(11) NOT NULL,
  `current_passage` varchar(100) DEFAULT NULL,
  `per_district_id` int(11) NOT NULL,
  `permenanet_passage` varchar(100) NOT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `kankor_marks` int(11) NOT NULL,
  `enrollment_year` int(11) NOT NULL,
  `identification_card` varchar(10) DEFAULT NULL,
  `conversion_no` varchar(20) DEFAULT NULL,
  `postpone_no` varchar(20) DEFAULT NULL,
  `re_enrollment_no` varchar(20) DEFAULT NULL,
  `sever_no` varchar(20) DEFAULT NULL,
  `per_ejection_reason` varchar(100) DEFAULT NULL,
  `dormitory_no` varchar(20) DEFAULT NULL,
  `study_field` varchar(50) DEFAULT NULL,
  `retribution` varchar(100) DEFAULT NULL,
  `punishment` varchar(100) DEFAULT NULL,
  `uni_graduation_year` varchar(10) DEFAULT NULL,
  `monograph_subject` varchar(100) DEFAULT NULL,
  `monograph_no` varchar(20) DEFAULT NULL,
  `monograph_result` int(11) DEFAULT NULL,
  `semester_id` varchar(15) NOT NULL,
  `semester_term_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bio_general_no` (`bio_general_no`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO student VALUES("1","1_student.jpg","حمید رضا ","زرسازان","محمد ظاهر","حاجی محمد یغوب","مذکر","1986-05-01","دری","45","ج32","123","0","420320","متحل","0700448788","لیسه مولانا عبدالرحمن جامی","2007-12-15","28","ناحیه 3","28","ناحیه 3","1","284","2008","20336","","","","","","","","","","2011","سیستم طلاسازی","34","0","Dropped","1");
INSERT INTO student VALUES("2","","علی احمد","فقیری","حاجی بصیر احمد","حاجی نصیر احمد","مذکر","1990-09-12","دری","87","ج23","789","0","230480","مجرد","0700464662","لیسه استاد ریاض","2007-11-28","28","ناحیه 5","32","قلعه حاجی آخند","1","280","2008","20348","","","","","","","","","","","","","","2","1");
INSERT INTO student VALUES("3","","ناز گل","نازی","نور گل","محمد گل","مونث","1983-09-15","پشتو","9","ج99","929","0","980990","مجرد","0799494999","لیسه نور خان","2005-12-01","29","مسجد سفید","8","بالا آب","2","260","2007","","","","","","","","","","","","","","","2","1");
INSERT INTO student VALUES("4","","حکمت","نظری","محسن","نظر محمد","مذکر","1989-03-15","دری","46","ج73","345","0","553263","مجرد","0799402378","لیسه استاد ریاض","2006-12-05","28","ناحیه 3","28","ناحیه 3","1","267","2008","","","","","","","","","","","","","","","4","1");
INSERT INTO student VALUES("5","","زهره","حکیمی","سید حکیم","سید عبدالملک","مونث","1991-03-13","دری","43","ج543","522","0","3241453","مجرد","0798343232","لیسه تجربوی","2007-12-05","28","ناحیه 5","13","کارته پروان","1","280","2008","","","","","","","","","","","","","","","5","1");
INSERT INTO student VALUES("6","","ویدا","وهابزاده","عبدالوهاب","عبدالودود","مونث","1997-03-21","دری","55","ج48","534","0","349302","مجرد","0748384329","لیسه تجربوی","2008-12-17","28","ناحیه 3","32","سره آب","4","290","2009","","","","","","","","","","","","","","","6","1");
INSERT INTO student VALUES("7","","مرجان","جامی","بصیر احمد","حاجی وحید","مونث","1996-04-18","پشتو","654","ج213","4523","0","5342352","متحل","0789343232","لیسه مریم","2008-12-16","30","بالا بلوک","18","پنج دره","4","300","2009","","","","","","","","","","","","","","","5","0");
INSERT INTO student VALUES("8","","فرهاد","حیدری","نجیب الله","حیدر","مذکر","1987-01-06","دری","53","ج89","793","0","7530290","متحل","0799837382","لیسه انقلاب","2009-12-17","28","ناحیه 9","28","ناحیه 9","4","302","2009","","","","","","","","","","","","","","","8","0");
INSERT INTO student VALUES("9","","حامد","عطایی","جمعه گل","حاجی جمعه خان","مذکر","1987-05-12","پشتو","342","ج673","42","0","35788722","مجرد","0786342422","لیسه جهاد","2009-12-08","28","ناحیه 5","15","سر کوچه","4","310","2009","","","","","","","","","","","","","","","5","0");
INSERT INTO student VALUES("10","","پریوش","پرنیان","پرویز","حاجی فیصل","مونث","1987-06-02","دری","44","ج83","503","0","4850302","متحل","07772432421","لیسه پروان","2007-12-19","28","ناحیه 9","1","کوتل پروان","4","276","2009","","","","","","","","","","","","","","","5","0");
INSERT INTO student VALUES("11","","نازدانه","نازی","دیوانه","بی پدر","زن","1992-11-02","دری","ج67","98","1378","0","420420","بی شوهر","0700333333","لیسه بی حجابی","2008-11-02","28","هرات","28","زیرخاک","4","333","2009","203333","","","","","","","","","","","","","","2","0");
INSERT INTO student VALUES("12","1","یاسر","اکرمی","احمد ضیاز","حاجی غلام غوث","male","1368-03-20","dari","65","6","30","55","8","single","0700461283","لیسه انقلاب","0000-00-00","0","","0","","","253","1386","تانتان","65","","65","","","","کامپیوتر ساینس","","","","","","","1","5");
INSERT INTO student VALUES("33","33_student.jpg","حاسن","پوریا","محمد عارف","اسلام خان","male","2011-12-17","دری","23","87","67","65","345","مجرد","78979","لیسه مولانا عبدالرحمن جامی","2011-12-30","12","نتمتمنت","67","تنکمتنمککم","76","89","1386","789","7897","7987","7897","8797","تاانانما","5657","کامپیوتر ساینس","نستیابنستا","تنامنا","7856","وب دیزاین","7897","0","1","3");



DROP TABLE IF EXISTS subject;

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_id` int(11) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code_no` varchar(20) DEFAULT NULL,
  `total_credits` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

INSERT INTO subject VALUES("1","1","4","1","پروگرام نویسی به زبان جاوا","PRO2008-1","5","5","لکچر");
INSERT INTO subject VALUES("2","1","4","2"," سخت افزار","CS2008-1","5","5","لکچر");
INSERT INTO subject VALUES("3","1","4","3","سیستم باینری","MAT2008-1","5","5","لکچر");
INSERT INTO subject VALUES("4","1","4","4","انگلیسی","ENG2008-1","3","3","لکچر");
INSERT INTO subject VALUES("5","1","4","5","ثقافت اسلامی","ISL2008-1","1","1","لکچر");
INSERT INTO subject VALUES("6","2","4","1","پروگرام نویسی به زبان جاوا","PRO2008-2","5","5","لکچر");
INSERT INTO subject VALUES("7","2","4","2","اساس کمپیوتر","CS2008-2","5","5","لکچر");
INSERT INTO subject VALUES("8","2","4","3","ریاضیات پیشرفته یک","MAT2008-2","5","5","لکچر");
INSERT INTO subject VALUES("9","2","4","4","انگلیسی","ENG2008-2","2","2","لکچر");
INSERT INTO subject VALUES("10","2","4","5","ثقافت اسلامی","ISL2008-2","2","2","لکچر");
INSERT INTO subject VALUES("11","3","4","1","پروگرام نویسی به زبان جاوا","PRO2009-1","5","5","لکچر");
INSERT INTO subject VALUES("12","3","4","2","اساس کمپیوتر دو","CS2009-1","5","5","لکچر");
INSERT INTO subject VALUES("13","3","4","3","لمیت و لگارتم","MATH2009-1","5","5","لکچر");
INSERT INTO subject VALUES("14","3","4","4","انگلیسی","ENG2009-1","3","3","لکچر");
INSERT INTO subject VALUES("15","3","4","5","ثقافت اسلامی","ISL2009-1","1","1","لکچر");
INSERT INTO subject VALUES("16","4","4","1","پروگرام نویسی به زبان جاوا","PRO2009-2","5","5","لکچر");
INSERT INTO subject VALUES("17","4","4","7","تکنالوژی تحت ویب","MAN2009-2","5","5","لکچر");
INSERT INTO subject VALUES("18","4","4","3","ریاضیات پیشرفته دو","MAT2009-2","5","5","لکچر");
INSERT INTO subject VALUES("19","4","4","4","انگلیسی","ENG2009-2","2","2","سمینار");
INSERT INTO subject VALUES("20","4","4","5","ثقافت اسلامی","ISL2009-2","2","2","لکچر");
INSERT INTO subject VALUES("21","5","4","1","C/C++  پروگرام نویسی به زبان","PRO2010-1","4","4","لکچر");
INSERT INTO subject VALUES("22","5","4","8","بنیاد عملی علوم کمپیوتر","CS2010-1","4","4","لکچر");
INSERT INTO subject VALUES("23","5","4","7","مدیریت دو","MAN2010-1","4","4","لکچر");
INSERT INTO subject VALUES("24","5","4","3","ریاضیات عالی","MAT2010-1","4","4","لکچر");
INSERT INTO subject VALUES("25","5","4","9","نوشتاری علمی","SW2010-1","3","3","لکچر");
INSERT INTO subject VALUES("26","5","4","5","ثقافت اسلامی","ISL2010-1","1","1","سمینار");
INSERT INTO subject VALUES("27","6","4","10","اساسات داتابیس","DB2010-2","4","4","لکچر");
INSERT INTO subject VALUES("28","6","4","8","بنیاد عملی علوم کمپیوتر دو","CS2010-2","4","4","لکچر");
INSERT INTO subject VALUES("29","6","4","6","تکنالوژی شبکه","NET2010-2","4","4","لکچر");
INSERT INTO subject VALUES("30","6","4","7","مدیریت سه","MAN2010-2","4","4","لکچر");
INSERT INTO subject VALUES("31","6","4","9","نوشتاری علمی دو","SW2010-2","3","3","لکچر");
INSERT INTO subject VALUES("32","6","4","5","ثقافت اسلامی","ISL2010-2","1","1","لکچر");
INSERT INTO subject VALUES("33","7","1","10","مدیریت اطلاعات","DB2011-1","5","5","لکچر");
INSERT INTO subject VALUES("34","7","1","10","PHP","DB2011-1","5","5","لکچر");
INSERT INTO subject VALUES("35","7","4","11","علوم کمپیوتر و اجتماع","CSS2011-1","5","5","سمینار");
INSERT INTO subject VALUES("36","7","4","12","دنیای کد باز و اجتماع","OSS","3","3","سمینار");
INSERT INTO subject VALUES("37","7","4","5","ثقافت اسلامی","ISL2011-1","1","1","لکچر");
INSERT INTO subject VALUES("38","7","2","6","تکنالوژی شبکه","NET2010-1","5","5","لکچر");
INSERT INTO subject VALUES("39","7","2","6","شبکه در سطح عالی","NET2011-1","5","5","لکچر");
INSERT INTO subject VALUES("40","7","3","8","سافتویر انجینیرنگ","CS2011-1","10","7","لکچر");
INSERT INTO subject VALUES("41","8","1","10","سیستم نمره دهی ","DB2011-2","7","5","پروژه");
INSERT INTO subject VALUES("42","8","4","13","منگراف","MON2011-2","10","5","پروژه");
INSERT INTO subject VALUES("43","8","2","6","شبکه بندی فاکلته","NET2011-2","7","5","پروژه");
INSERT INTO subject VALUES("44","8","3","8","سیستم حاضری فاکلته","CS2011-2","7","5","پروژه");
INSERT INTO subject VALUES("45","8","4","5","ثقافت اسلامی","ISL2011-2","1","1","لکچر");
INSERT INTO subject VALUES("46","9","4","1","پروگرام نویسی به زبان جاوا","PRO2009-1","5","5","لکچر");
INSERT INTO subject VALUES("47","9","4","2","سخت افزار","CS2009-1","5","5","لکچر");
INSERT INTO subject VALUES("48","9","4","3","سیستم باینری","MAT2009-1","5","5","لکچر");
INSERT INTO subject VALUES("49","9","4","4","انگلیسی","ENG2009-1","3","3","لکچر");
INSERT INTO subject VALUES("50","9","4","5","ثقافت اسلامی","ISL2009-1","1","1","لکچر");
INSERT INTO subject VALUES("51","10","4","1","پروگرام نویسی به زبان جاوا","PRO2009-2","5","5","لکچر");
INSERT INTO subject VALUES("52","10","4","2","اساس کمپیوتر","CS2009-2","5","5","لکچر");
INSERT INTO subject VALUES("53","10","4","3","ریاضیات پیشرفته یک","MAT2009-2","5","5","لکچر");
INSERT INTO subject VALUES("54","10","4","4","انگلیسی","ENG2009-2","2","2","لکچر");
INSERT INTO subject VALUES("55","10","4","5","ثقافت اسلامی","ISL2009-2","2","2","لکچر");
INSERT INTO subject VALUES("56","11","4","1","پروگرام نویسی به زبان جاوا","PRO2010-1","5","5","لکچر");
INSERT INTO subject VALUES("57","11","4","2","اساس کمپیوتر دو","CS2010-1","5","5","لکچر");
INSERT INTO subject VALUES("58","11","4","3","ریاضیات پیشرفته دو","MAT2010-1","5","5","لکچر");
INSERT INTO subject VALUES("59","11","4","4","انگلیسی","ENG210-1","3","3","لکچر");
INSERT INTO subject VALUES("60","11","4","5","ثقافت اسلامی","ISL2010-1","1","1","لکچر");
INSERT INTO subject VALUES("61","12","4","1","پروگرام نویسی به زبان جاوا","PRO2010-2","5","5","لکچر");
INSERT INTO subject VALUES("62","12","4","7","تکنالوژی تحت ویب","MON2010-2","5","5","لکچر");
INSERT INTO subject VALUES("63","12","4","3","لمیت و لوگارتم","MAN2010-2","5","5","لکچر");
INSERT INTO subject VALUES("64","12","4","4","انگلیسی","ENG210-2","3","3","سمینار");
INSERT INTO subject VALUES("65","12","4","5","ثقافت اسلامی","ISL2010-2","1","1","لکچر");
INSERT INTO subject VALUES("66","2","0","1","","","0","0","subjectType");



DROP TABLE IF EXISTS term;

CREATE TABLE `term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`start_date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO term VALUES("1","دوره اول","2004-03-01");
INSERT INTO term VALUES("2","دوره","2005-03-01");
INSERT INTO term VALUES("3","دوره سوم","2006-03-01");
INSERT INTO term VALUES("4","دوره چهارم","2007-03-01");
INSERT INTO term VALUES("5","دوره پنجم","2008-03-01");
INSERT INTO term VALUES("6","دوره ششم","2009-03-01");
INSERT INTO term VALUES("7","دوره هفتم","2010-03-01");
INSERT INTO term VALUES("8","دوره هشتم","2011-03-01");



DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `roll` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("2","admin","admin","admin@domain.com","admin","admin","admin");
INSERT INTO user VALUES("3","user","user","user@domain.com","user","user","user");



SET FOREIGN_KEY_CHECKS=1; 
