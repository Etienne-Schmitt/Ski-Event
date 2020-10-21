<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL2 or any later version
 */

namespace Syrgoma\Ski\Interfaces\Controller;

use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    /**
     * Will return the webpage to show
     *
     * @param array $parameters optional additional parameters
     *
     * @return Response The page
     */
    public function showPage(array $parameters = []): Response;
}
