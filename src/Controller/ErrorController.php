<?php

namespace Syrgoma\Ski\Controller;

use Symfony\Component\HttpFoundation\Response;
use Syrgoma\Ski\Interfaces\Controller\ControllerInterface;

class ErrorController implements ControllerInterface
{
    public function showPage(array $parameters = []): Response
    {
        return new Response(
            "<h1>Erreur 500</h1>",
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
