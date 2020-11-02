<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Factory;

use Carbon\Carbon;
use Exception;
use Syrgoma\Ski\Database\DatabaseConnection;
use Syrgoma\Ski\Entity\Categorie;
use Syrgoma\Ski\Entity\Participant;
use Syrgoma\Ski\Entity\Profil;

class ParticipantFactory
{
    /**
     * @param array              $participant
     * @param DatabaseConnection $db
     *
     * @return Participant
     * @throws Exception
     */
    public static function buildNewParticipantFromFactory(array $participant, DatabaseConnection $db): Participant
    {

        $categorieParticipantSql     = "SELECT categorie_id FROM participants_categorie WHERE participant_id = ?";
        $categorieParticipantRequest = $db->findOneInDBWithParams(
            $categorieParticipantSql,
            [$participant['id']]
        );

        $categorieSql     = "SELECT * FROM categories WHERE id = ?";
        $categorieRequest = $db->findOneInDBWithParams(
            $categorieSql,
            [$categorieParticipantRequest['categorie_id']]
        );
        $categorie        = new Categorie($categorieRequest['id'], $categorieRequest['nom']);

        $profilParticipantSql     = "SELECT profil_id FROM participants_profil WHERE participant_id = ?";
        $profilParticipantRequest = $db->findOneInDBWithParams(
            $profilParticipantSql,
            [$participant['id']]
        );

        $profilSql     = "SELECT * FROM categories WHERE id = ?";
        $profilRequest = $db->findOneInDBWithParams(
            $profilSql,
            [$profilParticipantRequest['profil_id']]
        );
        $profil        = new Profil($profilRequest['id'], $profilRequest['nom']);

        return new Participant(
            $participant['id'],
            $participant['nom'],
            $participant['prenom'],
            new Carbon($participant['date_de_naissance']),
            $participant['email'],
            $participant['photo_chemin'],
            $categorie,
            $profil
        );
    }
}
