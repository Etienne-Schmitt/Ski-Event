<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

use Carbon\Traits\Date;

class Participant
{
    private int       $id;
    private string    $nom;
    private string    $prenom;
    private Date      $dateDeNaissance;
    private string    $email;
    private string    $cheminPhoto;
    private Categorie $categorie;
    private Profil    $profil;

    public function __construct(
        int $id,
        string $nom,
        string $prenom,
        Date $dateDeNaissance,
        string $email,
        string $cheminPhoto,
        Categorie $categorie,
        Profil $profil
    ) {
        $this->id              = $id;
        $this->nom             = $nom;
        $this->prenom          = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->email           = $email;
        $this->cheminPhoto     = $cheminPhoto;
        $this->categorie       = $categorie;
        $this->profil          = $profil;
    }

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

    public function getParticipantEmail(): string
    {
        return $this->email;
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

    public function setParticipantPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setParticipantDateDeNaissance(Date $dateDeNaissance): void
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    public function setParticipantEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setParticipantCheminPhoto(string $cheminPhoto): void
    {
        $this->cheminPhoto = $cheminPhoto;
    }

    public function setParticipantCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setParticipantProfil(Profil $profil): void
    {
        $this->profil = $profil;
    }

    public function setParticipantNom(string $nom): void
    {
        $this->nom = $nom;
    }
}
