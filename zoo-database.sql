CREATE TABLE IF NOT EXISTS `Enclos` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	`description` varchar(200) NOT NULL,
	`created_at` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Animaux` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	`description` int NOT NULL,
	`espece` int NOT NULL,
	`created_at` datetime NOT NULL,
	`enclos_id` int NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `Animaux` ADD CONSTRAINT `Animaux_fk5` FOREIGN KEY (`enclos_id`) REFERENCES `Enclos`(`id`);