<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL2 or any later version
 */

namespace Syrgoma\Ski;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Syrgoma\Ski\Controller\ErrorController;
use Syrgoma\Ski\Controller\NotFoundController;
use Syrgoma\Ski\Interfaces\Controller\ControllerInterface;

/**
 * Class Router
 * Only one instance allowed
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

    /** @var RouteCollection|null contain the list of routes */
    protected ?RouteCollection $routeCollection = null;

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
    protected function __wakeup(): void
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

    /**
     * Return the route list in singleton style
     *
     * @return RouteCollection
     */
    protected function getRouteCollection(): RouteCollection
    {
        if ($this->routeCollection === null) {
            $this->routeCollection = new RouteCollection();
        }
        return $this->routeCollection;
    }

    /**
     * This add a new route to the router
     *
     * @param string     $controllerName     name of the controller used
     * @param string     $routeName          name of the route for debugging
     * @param string     $path               path to match
     * @param array|null $otherRouteSettings other settings
     *
     * @example $route->createNewRoute(TestController::class, "test_route", "/test")
     */
    public function createNewRoute(
        string $controllerName,
        string $routeName,
        string $path,
        array $otherRouteSettings = null
    ): void {
        $newRoute = new Route($path, [
                "_controller" => $controllerName,
            ]
        );

        if ($otherRouteSettings !== null) {
            foreach ($otherRouteSettings as $optionName => $optionValue) {
                $newRoute->addOptions([$optionName => $optionValue]);
            }
        }

        $this->getRouteCollection()->add($routeName, $newRoute);
    }

    /**
     * Start the router
     *
     * @return Response
     */
    public function startRouter(): Response
    {
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        $urlMatcher = new UrlMatcher($this->getRouteCollection(), $context);

        try {
            $parameters = $urlMatcher->match($context->getPathInfo());

            if (!isset($parameters['_controller'])) {
                throw new ResourceNotFoundException("Error: Controller not found");
            }

            /** @var ControllerInterface $controller */
            $controller = $parameters['_controller'];
            unset($parameters['_controller']);

            $webPage = new $controller();

            $response = $webPage->showPage($parameters);
        } catch (ResourceNotFoundException $e) {

            error_log($e->getMessage());

            $webPage = new NotFoundController();

            $response = $webPage->showPage();
        } catch (Exception $e) {
            error_log($e->getMessage());

            $webPage = new ErrorController();

            $response = $webPage->showPage();
        }

        return $response->send();
    }
}
