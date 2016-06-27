
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student`;


CREATE TABLE `student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `student_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- book
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;


CREATE TABLE `book`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `book_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `teacher`;


CREATE TABLE `teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `teacher_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- study
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `study`;


CREATE TABLE `study`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `study_U_1` (`name`)
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
	UNIQUE KEY `library_record_U_1` (`name`),
	INDEX `library_record_FI_1` (`book_id`),
	CONSTRAINT `library_record_FK_1`
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
	INDEX `lecture_schedule_FI_1` (`teacher_id`),
	CONSTRAINT `lecture_schedule_FK_1`
		FOREIGN KEY (`teacher_id`)
		REFERENCES `teacher` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `lecture_schedule_FI_2` (`study_id`),
	CONSTRAINT `lecture_schedule_FK_2`
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
	`student_ id` INTEGER  NOT NULL,
	`library_record_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `library_user_FI_1` (`student_ id`),
	CONSTRAINT `library_user_FK_1`
		FOREIGN KEY (`student_ id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `library_user_FI_2` (`library_record_id`),
	CONSTRAINT `library_user_FK_2`
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
	INDEX `lecture_attendancy_FI_1` (`lecture_id`),
	CONSTRAINT `lecture_attendancy_FK_1`
		FOREIGN KEY (`lecture_id`)
		REFERENCES `lecture_schedule` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `lecture_attendancy_FI_2` (`student_id`),
	CONSTRAINT `lecture_attendancy_FK_2`
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
	INDEX `graduation_FI_1` (`student_id`),
	CONSTRAINT `graduation_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `graduation_FI_2` (`study_id`),
	CONSTRAINT `graduation_FK_2`
		FOREIGN KEY (`study_id`)
		REFERENCES `study` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
