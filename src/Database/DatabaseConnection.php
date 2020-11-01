<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Database;

use PDO;

class DatabaseConnection
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function runOne(string $sql, array $args = []): array
    {
        if (empty($args)) {
            /**
             * Use PDO::query() is not a good idea, but because
             * we don't have arguments we can do it instead right now
             * instead of preparing and then executing later
             */
            return $this->db->query($sql)->fetch();
        }
        $sth = $this->db->prepare($sql);
        $sth->execute($args);

        return $sth->fetch();
    }

    public function runArray(string $sql, array $args = []): array
    {
        if (empty($args)) {
            /**
             * Use PDO::query() is not a good idea, but because
             * we don't have arguments we can do it instead right now
             * instead of preparing and then executing later
             */
            return $this->db->query($sql)->fetchAll();
        }
        $sth = $this->db->prepare($sql);
        $sth->execute($args);

        return $sth->fetchAll();
    }
}
