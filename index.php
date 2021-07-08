<?php
//dev.php только во время разработки
require_once 'application/lib/dev.php';
require_once 'application/lib/Crest.php';

require_once 'autoloader.php';

use application\core\Router;

$router = new Router();
$router->run();