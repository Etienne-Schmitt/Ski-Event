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

    public function run(string $sql, array $args = []): PDOStatement
    {
        if (empty($args)) {
            /**
             * Use PDO::query() is not a good idea, but because
             * we don't have arguments we can do it instead right now
             * instead of preparing and then executing later
             */
            return $this->db->query($sql);
        }
        $sth = $this->db->prepare($sql);
        $sth->execute($args);

        return $sth;
    }
}
