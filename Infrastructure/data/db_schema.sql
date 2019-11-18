CREATE TABLE `ie_users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(100),
    `password` VARCHAR(100),
    PRIMARY KEY (`id`),
    UNIQUE KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;

CREATE TABLE `ie_sections` (
    `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_lv` VARCHAR(100),
    `title_ru` VARCHAR(100),
    `lessons_count` TINYINT UNSIGNED,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `ie_lessons` (
   `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
   `section_id` TINYINT UNSIGNED NOT NULL,
   `index_letter` CHAR(1) NOT NULL,
   `title_lv` VARCHAR(100),
   `title_ru` VARCHAR(100),
   `words_count` TINYINT UNSIGNED,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `ie_words` (
   `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
   `section_id` TINYINT UNSIGNED NOT NULL,
   `lesson_id` SMALLINT UNSIGNED NOT NULL,
   `word` VARCHAR(100),
   `translation` VARCHAR(100),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;