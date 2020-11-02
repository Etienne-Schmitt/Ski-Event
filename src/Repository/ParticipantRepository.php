<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Repository;

use Carbon\Carbon;
use Syrgoma\Ski\Entity\Categorie;
use Syrgoma\Ski\Entity\Participant;
use Syrgoma\Ski\Entity\Profil;
use Syrgoma\Ski\Interfaces\Repository\ParticipantRepositoryInterface;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    public function findOneParticipant(int $participantId): ?Participant
    {
        // TODO: Implement findOneParticipant() method.
    }

    public function findAllParticipant(): array
    {
        // TODO: Implement findAllParticipant() method.
    }

    public function findParticipantBy(array $criteria): array
    {
        // TODO: Implement findParticipantBy() method.
    }

    public function findOneParticipantBy(array $criteria): ?Participant
    {
        // TODO: Implement findOneParticipantBy() method.
    }

    public function addParticipant(
        string $nom,
        string $prenom,
        Carbon $dateDeNaissance,
        string $email,
        string $cheminPhoto,
        Categorie $categorie,
        Profil $profil
    ): void {
        // TODO: Implement addParticipant() method.
    }

    public function editParticipant(
        Participant $participant,
        ?string $nom,
        ?string $prenom,
        ?Carbon $dateDeNaissance,
        ?string $email,
        ?string $cheminPhoto,
        ?Categorie $categorie,
        ?Profil $profil
    ): void {
        // TODO: Implement editParticipant() method.
    }

    public function deleteParticipant(Participant $participant): void
    {
        // TODO: Implement deleteParticipant() method.
    }

    public function countParticipant(): int
    {
        $sql = "SELECT COUNT(*) FROM participants";

        return $this->db->obtainOneElementSQL($sql)['COUNT(*)'];
    }
}
