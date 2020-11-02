<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Repository;

use Carbon\Carbon;
use Exception;
use Syrgoma\Ski\Database\DatabaseConnection;
use Syrgoma\Ski\Entity\Categorie;
use Syrgoma\Ski\Entity\Participant;
use Syrgoma\Ski\Entity\Profil;
use Syrgoma\Ski\Factory\ParticipantFactory;
use Syrgoma\Ski\Interfaces\Repository\ParticipantRepositoryInterface;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    private DatabaseConnection $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function findOneParticipant(int $participantId): ?Participant
    {
        $sql         = "SELECT * FROM participants WHERE id = ?";
        $participant = $this->db->obtainOneElementSQLWithParams($sql, [$participantId]);

        return ParticipantFactory::buildNewParticipantFromFactory($participant, $this->db);
    }

    /**
     * @throws Exception
     */
    public function findAllParticipant(): array
    {
        $sql          = "SELECT * FROM participants";
        $participants = $this->db->obtainArrayElementSQL($sql);

        $allParticipants = [];
        foreach ($participants as $participant) {
            $allParticipants[] = ParticipantFactory::buildNewParticipantFromFactory($participant, $this->db);
        }

        return $allParticipants;
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function findParticipantBy(array $criteria): array
    {
        $listCriteria = array_keys($criteria);
        $sql          = $this->makeDynamicSQLFromList($listCriteria);
        $params       = $this->makeDynamicParamsFromList($criteria);

        $participants = $this->db->obtainArrayElementSQLWithParams(
            $sql,
            $params
        );

        $listParticipants = [];
        foreach ($participants as $participant) {
            $listParticipants[] = ParticipantFactory::buildNewParticipantFromFactory(
                $participant,
                $this->db
            );
        }

        return $listParticipants;
    }

    private function makeDynamicSQLFromList(array $listCriteria): string
    {
        $sql = "SELECT * FROM participants WHERE " . $listCriteria[0] . " = ?";
        for ($i = 1, $iMax = count($listCriteria); $iMax > $i; $i++) {
            $sql .= " AND " . $listCriteria[$i] . " = ?";
        }

        return $sql;
    }

    private function makeDynamicParamsFromList(array $listCriteria): array
    {
        $params = [];
        foreach ($listCriteria as $criteriaValue) {
            $params[] = $criteriaValue;
        }

        return $params;
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
