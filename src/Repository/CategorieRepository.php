<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Repository;

use Syrgoma\Ski\Database\DatabaseConnection;
use Syrgoma\Ski\Entity\Categorie;
use Syrgoma\Ski\Factory\CategorieFactory;
use Syrgoma\Ski\Interfaces\Repository\CategorieRepositoryInterface;

class CategorieRepository implements CategorieRepositoryInterface
{
    private DatabaseConnection $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function findOneCategorie(int $categorieId): ?Categorie
    {
        $sql           = "SELECT nom FROM categories WHERE id = ?";
        $categorieName = $this->db->findOneInDBWithParams($sql, [$categorieId])['nom'];

        /** Overkill but will stay here for learning confirmation */
        return CategorieFactory::buildNewFromFactory($categorieId, $categorieName);
    }

    public function findAllCategorie(): array
    {
        $sql = "SELECT id, nom FROM categories ORDER BY id";

        $arrayListCategorie = $this->db->findAllInDB($sql);
        $arrayCategorie     = [];

        /** @var array $categorie */
        foreach ($arrayListCategorie as $categorie) {
            $arrayCategorie[] = new Categorie($categorie['id'], $categorie['nom']);
        }

        return $arrayCategorie;
    }

    public function findOneCategorieByName(string $criteria): Categorie
    {
        $sql = "SELECT id, nom FROM categories WHERE nom = ?";

        $categorieDetail = $this->db->findAllinDBWithParams($sql, [$criteria]);

        return new Categorie($categorieDetail['id'], $categorieDetail['nom']);
    }

    public function addCategorie(string $categorie): int
    {
        $sql = "INSERT INTO categories (nom) VALUES (?)";

        return $this->db->prepareAndExecuteSQL($sql, [$categorie])->fetch();
    }

    public function editCategorie(Categorie $categorie, string $newCategorieName): void
    {
        $sql = "UPDATE categories SET nom = ? WHERE id = ?";

        $this->db->prepareAndExecuteSQL(
            $sql,
            [
                $newCategorieName,
                $categorie->getCategorieId(),
            ]
        );
    }

    public function deleteCategorie(Categorie $categorie): void
    {
        $sql = "DELETE FROM categories WHERE id = ?";

        $this->db->prepareAndExecuteSQL($sql, [$categorie->getCategorieId()]);
    }

    public function countCategorie(): int
    {
        $sql = "SELECT COUNT(*) FROM categories";

        return $this->db->findOneInDB($sql)['COUNT(*)'];
    }
}
