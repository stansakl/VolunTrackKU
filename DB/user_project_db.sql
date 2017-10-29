CREATE TABLE  IF NOT EXISTS `user_project` (
  `USER_ID` int(10) unsigned NOT NULL,
  `PROJECT_ID` int(10) unsigned NOT NULL,
  `PROJECT_START_DATE_TIME` datetime NOT NULL,
  `PROJECT_END_DATE_TIME` datetime NOT NULL,
  KEY `User_id _idx` (`USER_ID`),
  KEY `PROJECT_ID_idx` (`PROJECT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
