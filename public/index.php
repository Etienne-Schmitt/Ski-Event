<?php

use Syrgoma\Ski\Controller\IndexController;
use Syrgoma\Ski\Controller\TestController;
use Syrgoma\Ski\Database\DatabaseConfig;
use Syrgoma\Ski\Database\DatabaseConnection;
use Syrgoma\Ski\Exception\ConfigurationException;
use Syrgoma\Ski\Router;

require_once __DIR__ . "/../vendor/autoload.php";

if (!file_exists(__DIR__ . "/../config.php")) {
    throw new ConfigurationException("No config.php found, please create it...");
}

/**
 * @var array $externalConfig defined in config.php
 */
require_once __DIR__ . "/../config.php";

$driverOptions = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$dbConfig = new DatabaseConfig(
    $externalConfig['database'],
    PDO::getAvailableDrivers(),
    $driverOptions
);

$pdoObject = new PDO($dbConfig->getDsn(), $dbConfig->getUser(), $dbConfig->getPassword(), $dbConfig->getOptions());

$db = new DatabaseConnection($pdoObject);

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
