
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(255)  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student`;


CREATE TABLE `student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- book
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;


CREATE TABLE `book`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `teacher`;


CREATE TABLE `teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- study
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `study`;


CREATE TABLE `study`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- library_record
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `library_record`;


CREATE TABLE `library_record`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`book_id` INTEGER  NOT NULL,
	`quantity` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
		FOREIGN KEY (`book_id`)
		REFERENCES `book` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- lecture_schedule
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lecture_schedule`;


CREATE TABLE `lecture_schedule`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`teacher_id` INTEGER  NOT NULL,
	`study_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
		FOREIGN KEY (`teacher_id`)
		REFERENCES `teacher` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
		FOREIGN KEY (`study_id`)
		REFERENCES `study` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- library_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `library_user`;


CREATE TABLE `library_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL,
	`library_record_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
		FOREIGN KEY (`library_record_id`)
		REFERENCES `library_record` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- lecture_attendancy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lecture_attendancy`;


CREATE TABLE `lecture_attendancy`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`lecture_id` INTEGER  NOT NULL,
	`student_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
		FOREIGN KEY (`lecture_id`)
		REFERENCES `lecture_schedule` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- graduation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `graduation`;


CREATE TABLE `graduation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`grade` INTEGER  NOT NULL,
	`student_id` INTEGER  NOT NULL,
	`study_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
		FOREIGN KEY (`study_id`)
		REFERENCES `study` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;