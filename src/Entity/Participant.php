<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

use Carbon\Traits\Date;

class Participant
{
    private int $id;

    private string $nom;
    private string $prenom;
    private Date $dateDeNaissance;
    private string $cheminPhoto;
    private Categorie $categorie;
    private Profil $profil;

    public function getParticipantId(): int
    {
        return $this->id;
    }

    public function getParticipantNom(): string
    {
        return $this->nom;
    }

    public function getParticipantPrenom(): string
    {
        return $this->prenom;
    }

    public function getParticipantDateDeNaissance(): Date
    {
        return $this->dateDeNaissance;
    }

    public function getParticipantCheminPhoto(): string
    {
        return $this->cheminPhoto;
    }

    public function getParticipantCategorie(): Categorie
    {
        return $this->categorie;
    }

    public function getParticipantProfil(): Profil
    {
        return $this->profil;
    }
}
