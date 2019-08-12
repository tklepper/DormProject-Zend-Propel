
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- unit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `building_number` INTEGER NOT NULL,
    `floor_number` INTEGER NOT NULL,
    `room_number` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `state` VARCHAR(20) NOT NULL,
    `zip` VARCHAR(11) NOT NULL,
    `phone` VARCHAR(30) NOT NULL,
    `gender` VARCHAR(11) NOT NULL,
    `dob` DATE NOT NULL,
    `student_id` INTEGER(11) NOT NULL,
    `unit_id` INTEGER(11) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_fi_82cc58` (`unit_id`),
    CONSTRAINT `user_fk_82cc58`
        FOREIGN KEY (`unit_id`)
        REFERENCES `unit` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
