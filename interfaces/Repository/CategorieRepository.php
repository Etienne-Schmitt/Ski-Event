<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces\Repository;

use Syrgoma\Ski\Entity\Categorie;

interface CategorieRepository
{
    /**
     * Find a Categorie entity by his id
     *
     * @param int $categorieId
     *
     * @return Categorie|null
     */
    public function findOneCategorie(int $categorieId): ?Categorie;

    /**
     * Find all Categorie in the repository
     *
     * @return array
     */
    public function findAllCategorie(): array;

    /**
     * Find a Categorie by a criteria
     *
     * @param string $criteria
     *
     * @return Categorie
     */
    public function findOneCategorieByName(string $criteria): Categorie;

    /**
     * Add a new Categorie entity
     *
     * @param string $categorie
     */
    public function addCategorie(
        string $categorie
    ): void;

    /**
     * Edit an existing Categorie entity
     *
     * @param Categorie   $categorie
     * @param string|null $newCategorie
     */
    public function editCategorie(
        Categorie $categorie,
        ?string $newCategorie
    ): void;

    /**
     * Delete an existing Categorie entity
     *
     * @param Categorie $categorie
     */
    public function deleteCategorie(Categorie $categorie): void;
}
