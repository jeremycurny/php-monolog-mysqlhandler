monolog-mysql
=============

MySQL Handler for Monolog

# Example

```php
use Monolog\Handler\MysqlHandler;
use Monolog\Logger;

$logger = new Logger("myLogger");
$tableName = "logger";

$logger->pushHandler(new MysqlHandler($pdo, $tableName, Logger::DEBUG));

$logger->info("This is my first log !");
```

# Create the table
```mysql
CREATE TABLE `logger` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `context` text NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `level_name` varchar(31) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

# License
This tool is free software and is distributed under the MIT license. Please have a look at the LICENSE file for further information.
