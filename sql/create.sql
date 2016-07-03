-- You can rename the table as you want
CREATE TABLE `logger` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `context` text NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `level_name` varchar(31) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
