<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Interfaces\Repository;

use Carbon\Traits\Date;
use Syrgoma\Ski\Entity\Categorie;
use Syrgoma\Ski\Entity\Participant;
use Syrgoma\Ski\Entity\Profil;

interface ParticipantRepositoryInterface
{
    /**
     * Find a Participant entity by his id
     *
     * @param int $participantId
     *
     * @return Participant|null
     */
    public function findOneParticipant(int $participantId): ?Participant;

    /**
     * Find all Participant in the repository
     *
     * @return array
     */
    public function findAllParticipant(): array;

    /**
     * Find Participant by a criteria
     *
     * @param array $criteria
     *
     * @return array
     */
    public function findParticipantBy(array $criteria): array;

    /**
     * Find only one Participant entity by a set of criteria
     *
     * @param array $criteria
     *
     * @return Participant|null
     */
    public function findOneParticipantBy(array $criteria): ?Participant;

    /**
     * Add a new Participant entity
     *
     * @param string    $nom
     * @param string    $prenom
     * @param Date      $dateDeNaissance
     * @param string    $email
     * @param string    $cheminPhoto
     * @param Categorie $categorie
     * @param Profil    $profil
     */
    public function addParticipant(
        string $nom,
        string $prenom,
        Date $dateDeNaissance,
        string $email,
        string $cheminPhoto,
        Categorie $categorie,
        Profil $profil
    ): void;

    /**
     * Edit an existing Participant entity
     *
     * @param Participant    $participant
     * @param string|null    $nom
     * @param string|null    $prenom
     * @param Date|null      $dateDeNaissance
     * @param string|null    $email
     * @param string|null    $cheminPhoto
     * @param Categorie|null $categorie
     * @param Profil|null    $profil
     */
    public function editParticipant(
        Participant $participant,
        ?string $nom,
        ?string $prenom,
        ?Date $dateDeNaissance,
        ?string $email,
        ?string $cheminPhoto,
        ?Categorie $categorie,
        ?Profil $profil
    ): void;

    /**
     * Delete an existing Participant entity
     *
     * @param Participant $participant
     */
    public function deleteParticipant(Participant $participant): void;
}
