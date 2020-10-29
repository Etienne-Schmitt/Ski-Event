<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces;

interface DatabaseConfigInterface
{
    /**
     * Will return the dsn for connect to the database
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Will return the dsn for connect to the database
     *
     * @return string
     */
    public function getDsn(): string;

    /**
     * Will return the configured database user
     *
     * @return string
     */
    public function getUser(): string;

    /**
     * Will return the configured database password
     *
     * @return string
     */
    public function getPassword(): string;
}
