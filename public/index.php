<?php

use Syrgoma\Ski\Controller\IndexController;
use Syrgoma\Ski\Controller\TestController;
use Syrgoma\Ski\Router;

require_once __DIR__ . "/../vendor/autoload.php";

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
