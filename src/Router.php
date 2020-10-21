<?php

namespace Syrgoma\Ski;

/**
 * Class Router
 * Only one instance allowed
 *
 * A router class for routing requests
 *
 * @package Syrgoma\Ski
 * @author  Etienne-Schmitt <etienne@schmitt-etienne.fr>
 */
class Router
{
    /**
     * @var Router|null contain the router instance
     */
    protected static ?Router $routerInstance = null;

    /**
     * __construct() protected for singleton class
     */
    protected function __construct()
    {
    }

    /**
     * Return the router in singleton style
     *
     * @return Router
     */
    public static function getRouterInstance(): Router
    {
        if (self::$routerInstance === null) {
            self::$routerInstance = new self();
        }
        return self::$routerInstance;
    }

    /**
     * __wakeup() protected for singleton class
     *
     * @return void
     */
    protected function __wakeup()
    {
    }

    /**
     * __clone() protected for singleton class
     *
     * @return void
     */
    protected function __clone()
    {
    }
}
