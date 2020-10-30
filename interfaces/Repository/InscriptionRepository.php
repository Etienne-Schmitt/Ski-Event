<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces\Repository;

use Carbon\Traits\Date;
use Syrgoma\Ski\Entity\Epreuve;
use Syrgoma\Ski\Entity\Inscription;
use Syrgoma\Ski\Entity\Participant;

interface InscriptionRepository
{
    /**
     * Find a Inscription entity by his id
     *
     * @param int $inscriptionId
     *
     * @return Inscription|null
     */
    public function findOneInscription(int $inscriptionId): ?Inscription;

    /**
     * Find all Inscription in the repository
     *
     * @return array
     */
    public function findAllInscription(): array;

    /**
     * Find Inscription by a criteria
     *
     * @param array $criteria
     *
     * @return array
     */
    public function findInscriptionBy(array $criteria): array;

    /**
     * Find only one Inscription entity by a set of criteria
     *
     * @param array $criteria
     *
     * @return Inscription|null
     */
    public function findOneInscriptionBy(array $criteria): ?Inscription;

    /**
     * Add a new Inscription entity
     *
     * @param Participant $participant
     * @param Epreuve     $epreuve
     * @param Date        $passage1
     * @param Date        $passage2
     */
    public function addInscription(
        Participant $participant,
        Epreuve $epreuve,
        Date $passage1,
        Date $passage2
    ): void;

    /**
     * Edit an existing Inscription entity
     *
     * @param Inscription      $inscription
     * @param Participant|null $newParticipant
     * @param Epreuve|null     $newEpreuve
     * @param Date|null        $passage1
     * @param Date|null        $passage2
     */
    public function editInscription(
        Inscription $inscription,
        ?Participant $newParticipant = null,
        ?Epreuve $newEpreuve = null,
        ?Date $passage1 = null,
        ?Date $passage2 = null
    ): void;

    /**
     * Delete an existing Inscription entity
     *
     * @param Inscription $inscription
     */
    public function deleteInscription(Inscription $inscription): void;
}
