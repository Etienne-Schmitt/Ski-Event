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
        $categorieName = $this->db->obtainOneElementSQLWithParams($sql, [$categorieId])['nom'];

        /** Overkill but will stay here for learning confirmation */
        return CategorieFactory::buildNewFromFactory($categorieId, $categorieName);
    }

    public function findAllCategorie(): array
    {
        $sql = "SELECT id, nom FROM categories ORDER BY id";

        $arrayListCategorie = $this->db->obtainArrayElementSQL($sql);
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

        $categorieDetail = $this->db->obtainArrayElementSQLWithParams($sql, [$criteria]);

        return new Categorie($categorieDetail['id'], $categorieDetail['nom']);
    }

    public function addCategorie(string $categorie): void
    {
        $sql = "INSERT INTO categories (nom) VALUES (?)";

        $this->db->executeSQLWithParams($sql, [$categorie]);
    }

    public function editCategorie(Categorie $categorie, ?string $newCategorie): void
    {
        // TODO: Implement editCategorie() method.
    }

    public function deleteCategorie(Categorie $categorie): void
    {
        // TODO: Implement deleteCategorie() method.
    }
}
