<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski;

use Syrgoma\Ski\Exception\DriverNotAvailableException;
use Syrgoma\Ski\Interfaces\DatabaseConfigInterface;

/**
 * Class DatabaseConfig
 * This class create a object used as a database DSN for connecting to a Database
 *
 * @package Syrgoma\Ski\Database
 */
class DatabaseConfig implements DatabaseConfigInterface
{
    private string $dsn;
    private string $user;
    private string $password;

    /**
     * ConfigDb constructor
     *
     * @param string $dbDriver        Database driver to use
     * @param string $host            Ip/dns of the database server
     * @param string $port
     * @param string $database        Database name
     * @param string $charset
     * @param string $user            Database allowed used
     * @param string $password        Database password for user
     * @param array  $availableDriver List of all driver available on the system
     *
     * @throws DriverNotAvailableException
     */
    public function __construct(
        string $dbDriver,
        string $host,
        string $port,
        string $database,
        string $charset,
        string $user,
        string $password,
        array $availableDriver
    ) {
        if (!in_array($dbDriver, $availableDriver, true)) {
            throw new DriverNotAvailableException("Not a valid database driver : $dbDriver");
        }

        $this->dsn      = "$dbDriver:dbname=$database;host=$host;port=$port;charset=$charset";
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->getDsn();
    }

    /**
     * {@inheritdoc}
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }
}
