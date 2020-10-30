<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces\Repository;

use Carbon\Traits\Date;
use Syrgoma\Ski\Entity\Epreuve;

interface EpreuveRepository
{
    /**
     * Find a Epreuve entity by his id
     *
     * @param int $epreuveId
     *
     * @return Epreuve|null
     */
    public function findOneEpreuve(int $epreuveId): ?Epreuve;

    /**
     * Find all Epreuve in the repository
     *
     * @return array
     */
    public function findAllEpreuve(): array;

    /**
     * Find Epreuve by a criteria
     *
     * @param array $criteria
     *
     * @return array
     */
    public function findEpreuveBy(array $criteria): array;

    /**
     * Find only one Epreuve entity by a set of criteria
     *
     * @param array $criteria
     *
     * @return Epreuve|null
     */
    public function findOneEpreuveBy(array $criteria): ?Epreuve;

    /**
     * Add a new Epreuve entity
     *
     * @param string $lieu
     * @param Date   $date
     * @param array  $inscription
     */
    public function addEpreuve(
        string $lieu,
        Date $date,
        array $inscription = []
    ): void;

    /**
     * Edit an existing Epreuve entity
     *
     * @param Epreuve     $epreuve
     * @param string|null $newLieu
     * @param Date|null   $newDate
     * @param array|null  $inscription
     */
    public function editEpreuve(
        Epreuve $epreuve,
        ?string $newLieu = null,
        ?Date $newDate = null,
        ?array $inscription = null
    ): void;

    /**
     * Delete an existing Epreuve entity
     *
     * @param Epreuve $epreuve
     */
    public function deleteEpreuve(Epreuve $epreuve): void;
}
