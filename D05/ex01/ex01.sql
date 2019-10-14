CREATE TABLE ft_table(
    `id` INT unsigned AUTO_INCREMENT NOT NULL,
    `login` VARCHAR(8) DEFAULT 'toto' NOT NULL,
    `group` enum('staff', 'student', 'other') NOT NULL,
    `creation_date` DATE NOT NULL,
    PRIMARY KEY (`id`)
);