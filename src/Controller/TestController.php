<?php

namespace Syrgoma\Ski\Controller;

use Symfony\Component\HttpFoundation\Response;
use Syrgoma\Ski\Interfaces\Controller\ControllerInterface;

class TestController implements ControllerInterface
{
    public function showPage(array $parameters = []): Response
    {
        return new Response(
            "<h1>Page de test</h1>"
        );
    }
}
