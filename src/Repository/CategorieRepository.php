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
        $categorieName = $this->db->runOne($sql, [$categorieId])['nom'];

        return CategorieFactory::buildNewFromFactory($categorieId, $categorieName);
    }

    public function findAllCategorie(): array
    {
        // TODO: Implement findAllCategorie() method.
    }

    public function findOneCategorieByName(string $criteria): Categorie
    {
        // TODO: Implement findOneCategorieByName() method.
    }

    public function addCategorie(string $categorie): void
    {
        // TODO: Implement addCategorie() method.
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
