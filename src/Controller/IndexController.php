<?php

namespace Syrgoma\Ski\Controller;

use Symfony\Component\HttpFoundation\Response;
use Syrgoma\Ski\Interfaces\Controller\ControllerInterface;

class IndexController implements ControllerInterface
{
    public function showPage(array $parameters = []): Response
    {
        return new Response(
            "<h1>Index du site</h1>"
        );
    }
}
