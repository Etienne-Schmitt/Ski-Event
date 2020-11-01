<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Repository;

use Syrgoma\Ski\Database\DatabaseConnection;
use Syrgoma\Ski\Entity\Profil;
use Syrgoma\Ski\Interfaces\Repository\ProfilRepositoryInterface;

class ProfilRepository implements ProfilRepositoryInterface
{
    private DatabaseConnection $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function findOneProfil(int $profilId): ?Profil
    {
        $sql        = "SELECT nom FROM profils WHERE id = ?";
        $profilName = $this->db->obtainOneElementSQLWithParams($sql, [$profilId]);

        return new Profil($profilName['id'], $profilName['nom']);
    }

    public function findAllProfil(): array
    {
        $sql = "SELECT id, nom FROM profils ORDER BY id";

        $arrayListProfil = $this->db->obtainArrayElementSQL($sql);
        $arrayProfil     = [];

        /** @var array $profil */
        foreach ($arrayListProfil as $profil) {
            $arrayProfil[] = new Profil($profil['id'], $profil['nom']);
        }

        return $arrayProfil;
    }

    public function findOneProfilByName(string $criteria): Profil
    {
        $sql = "SELECT id, nom FROM profils WHERE nom = ?";

        $profilDetail = $this->db->obtainArrayElementSQLWithParams($sql, [$criteria]);

        return new Profil($profilDetail['id'], $profilDetail['nom']);
    }

    public function addProfil(string $profil): void
    {
        $sql = "INSERT INTO profils (nom) VALUES (?)";

        $this->db->executeSQLWithParams($sql, [$profil]);
    }

    public function editProfil(Profil $profil, string $newProfilName): void
    {
        $sql = "UPDATE profils SET nom = ? WHERE id = ?";

        $this->db->executeSQLWithParams(
            $sql,
            [
                $newProfilName,
                $profil->getProfilId(),
            ]
        );
    }

    public function deleteProfil(Profil $profil): void
    {
        $sql = "DELETE FROM profils WHERE id = ?";

        $this->db->executeSQLWithParams($sql, [$profil->getProfilId()]);
    }

    public function countProfil(): int
    {
        $sql = "SELECT COUNT(*) FROM profils";

        return $this->db->obtainOneElementSQL($sql)['COUNT(*)'];
    }
}
