<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

use Carbon\Traits\Date;

class Epreuve
{
    private int $id;
    private string $lieu;
    private Date $date;
    private array $participants;

    public function getEpreuveId(): ?int
    {
        return $this->id;
    }

    public function getEpreuveLieu(): ?string
    {
        return $this->lieu;
    }

    public function getEpreuveDate(): ?Date
    {
        return $this->date;
    }

    public function getEpreuveParticipants(): ?array
    {
        return $this->participants;
    }

}
