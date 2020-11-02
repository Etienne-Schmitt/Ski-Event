<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Database;

use PDO;
use PDOStatement;

class DatabaseConnection
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findOneInDB(string $sql): array
    {
        return $this->executeSQL($sql)->fetch();
    }

    public function findAllInDB(string $sql): array
    {
        return $this->executeSQL($sql)->fetchAll();
    }

    public function findOneInDBWithParams(string $sql, array $params): array
    {
        return $this->prepareAndExecuteSQL($sql, $params)->fetch();
    }

    public function findAllinDBWithParams(string $sql, array $params): array
    {
        return $this->prepareAndExecuteSQL($sql, $params)->fetchAll();
    }

    public function executeSQL(string $sql): PDOStatement
    {
        return $this->db->query($sql);
    }

    public function prepareAndExecuteSQL(string $sql, array $params): PDOStatement
    {
        $sth = $this->db->prepare($sql);
        $sth->execute($params);

        return $sth;
    }
}
