DROP TABLE IF EXISTS `Produkte`;
		
CREATE TABLE `Produkte` (
  `id` bigint NULL AUTO_INCREMENT DEFAULT NULL,
  `name` varchar(100) NULL DEFAULT NULL,
  `preis` decimal(10,2) NULL DEFAULT NULL,
  `beschreibung` text NULL DEFAULT NULL,
  `kategorie` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

