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

# License
This tool is free software and is distributed under the MIT license. Please have a look at the LICENSE file for further information.
