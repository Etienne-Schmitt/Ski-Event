<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Database;

use Syrgoma\Ski\Exception\DriverNotFoundException;
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
    private array  $options;

    /**
     * ConfigDb constructor
     *
     * @param array $dbConfig        Database config to use
     * @param array $availableDriver List of all driver available on the system
     * @param array $dbOptions
     */
    public function __construct(array $dbConfig, array $availableDriver, array $dbOptions)
    {
        $dbDriver = $dbConfig["driver"];
        $host     = $dbConfig["host"];
        $port     = $dbConfig["port"];
        $database = $dbConfig["database"];
        $charset  = $dbConfig["charset"];
        $user     = $dbConfig["user"];
        $password = $dbConfig["password"];

        if (!in_array($dbDriver, $availableDriver, true)) {
            throw new DriverNotFoundException("Not a valid database driver : $dbDriver");
        }

        $this->dsn      = "$dbDriver:dbname=$database;host=$host;port=$port;charset=$charset";
        $this->user     = $user;
        $this->password = $password;
        $this->options  = $dbOptions;
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

    public function getOptions(): array
    {
        return $this->options;
    }
}
