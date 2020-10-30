<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

use Carbon\Traits\Date;

class Inscription
{
    private int $id;
    private Participant $participant;
    private Epreuve $epreuve;

    private Date $passage1;
    private Date $passage2;

    public function getId(): int
    {
        return $this->id;
    }

    public function getParticipant(): Participant
    {
        return $this->participant;
    }

    public function getEpreuve(): Epreuve
    {
        return $this->epreuve;
    }

    public function getPassage1(): Date
    {
        return $this->passage1;
    }

    public function getPassage2(): Date
    {
        return $this->passage2;
    }
    //TODO Add getMoyenne
}
