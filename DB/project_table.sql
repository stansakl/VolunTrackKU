CREATE TABLE IF NOT EXISTS `ebdb`.`PROJECT` (
  `Project_id` INT NOT NULL AUTO_INCREMENT,
  `Project_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Project_id`),
  UNIQUE INDEX `Project_id_UNIQUE` (`Project_id` ASC),
  UNIQUE INDEX `Project_Name_UNIQUE` (`Project_Name` ASC))
ENGINE = InnoDB
