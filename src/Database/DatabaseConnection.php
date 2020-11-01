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

    public function obtainOneElementSQL(string $sql): array
    {
        return $this->executeSQL($sql)->fetch();
    }

    public function obtainArrayElementSQL(string $sql): array
    {
        return $this->executeSQL($sql)->fetchAll();
    }

    public function obtainOneElementSQLWithParams(string $sql, array $params): array
    {
        return $this->executeSQLWithParams($sql, $params)->fetch();
    }

    public function obtainArrayElementSQLWithParams(string $sql, array $params): array
    {
        return $this->executeSQLWithParams($sql, $params)->fetchAll();
    }

    public function executeSQL(string $sql): PDOStatement
    {
        return $this->db->query($sql);
    }

    public function executeSQLWithParams(string $sql, array $params): PDOStatement
    {
        $sth = $this->db->prepare($sql);
        $sth->execute($params);

        return $sth;
    }
}
