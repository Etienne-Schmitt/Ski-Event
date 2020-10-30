<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces\Repository;

use Syrgoma\Ski\Entity\Profil;

interface ProfilRepository
{
    /**
     * Find a Profil entity by his id
     *
     * @param int $profilId
     *
     * @return Profil|null
     */
    public function findOneProfil(int $profilId): ?Profil;

    /**
     * Find all Profil in the repository
     *
     * @return array
     */
    public function findAllProfil(): array;

    /**
     * Find a Profil by a criteria
     *
     * @param string $criteria
     *
     * @return Profil
     */
    public function findOneProfilByName(string $criteria): Profil;

    /**
     * Add a new Profil entity
     *
     * @param string $profil
     */
    public function addProfil(
        string $profil
    ): void;

    /**
     * Edit an existing Profil entity
     *
     * @param Profil      $profil
     * @param string|null $newProfil
     */
    public function editProfil(
        Profil $profil,
        ?string $newProfil
    ): void;

    /**
     * Delete an existing Profil entity
     *
     * @param Profil $profil
     */
    public function deleteProfil(Profil $profil): void;
}