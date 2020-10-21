<?php

namespace Syrgoma\Ski\Controller;

use Symfony\Component\HttpFoundation\Response;
use Syrgoma\Ski\Interfaces\Controller\ControllerInterface;

class NotFoundController implements ControllerInterface
{
    public function showPage(array $parameters = []): Response
    {
        return new Response(
            "<h1>Erreur 404</h1>",
            Response::HTTP_NOT_FOUND
        );
    }
}
