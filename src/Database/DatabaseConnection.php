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

    public function runOneSQL(string $sql): array
    {
        return $this->runSQL($sql)->fetch();
    }

    public function runArraySQL(string $sql): array
    {
        return $this->runSQL($sql)->fetchAll();
    }

    public function runOneSQLParams(string $sql, array $params): array
    {
        return $this->runSQLParams($sql, $params)->fetch();
    }

    public function runArraySQLParams(string $sql, array $params): array
    {
        return $this->runSQLParams($sql, $params)->fetchAll();
    }

    private function runSQL(string $sql): PDOStatement
    {
        return $this->db->query($sql);
    }

    private function runSQLParams(string $sql, array $params): PDOStatement
    {
        $sth = $this->db->prepare($sql);
        $sth->execute($params);

        return $sth;
    }
}
