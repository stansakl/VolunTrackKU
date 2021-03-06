CREATE TABLE IF NOT EXISTS `voluntrack`.`USERS` (
  `USER_ID` INT NOT NULL AUTO_INCREMENT,
  `NAME_FIRST` varchar(45) NOT NULL,
  `NAME_LAST` varchar(45) NOT NULL,
  `NAME_MIDDLE` varchar(45) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `USERNAME` varchar(45) NOT NULL,
  `CREATE_DT_TM` datetime DEFAULT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `IS_ADMIN` bit(1) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USERNAME_UNIQUE` (`USERNAME`),
  UNIQUE KEY `USER_ID_UNIQUE` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
