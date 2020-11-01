<?php

use Syrgoma\Ski\Controller\IndexController;
use Syrgoma\Ski\Controller\TestController;
use Syrgoma\Ski\DatabaseConfig;
use Syrgoma\Ski\Exception\ConfigurationException;
use Syrgoma\Ski\Router;

require_once __DIR__ . "/../vendor/autoload.php";

if (!file_exists(__DIR__ . "/../config.php")) {
    throw new ConfigurationException("No config.php found, please create it...");
}

require_once __DIR__ . "/../config.php";
if (isset($databaseConfig)) {
    $dbConfig = new DatabaseConfig($databaseConfig, PDO::getAvailableDrivers());
} else {
    throw new ConfigurationException("Error, the config.php file is not at the correct format...");
}

$router = Router::getRouterInstance();

$router->createNewRoute(
    IndexController::class,
    "index_page",
    "/",
    ["_locale" => "fr"]
);
$router->createNewRoute(
    TestController::class,
    "test_page",
    "/test"
);

$router->startRouter();
