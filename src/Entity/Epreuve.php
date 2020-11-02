<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

use Carbon\Carbon;
use Syrgoma\Ski\Exception\BadObjectException;
use Syrgoma\Ski\Exception\BadTypeException;

class Epreuve
{
    private int $id;
    private string $lieu;
    private Carbon $date;
    private array $participants;

    public function setEpreuveLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }

    public function setEpreuveDate(Carbon $date): void
    {
        $this->date = $date;
    }

    public function setEpreuveParticipants(array $participantsList): void
    {
        if (!empty($participantsList)) {
            foreach ($participantsList as $participant) {
                if (!is_object($participant)) {
                    throw new BadTypeException("Error, $participant is not an object");
                }
                if (!get_class($participant) === Participant::class) {
                    throw new BadObjectException("Error, $participant is not a Participant object");
                }
            }
        }
        $this->participants = $participantsList;
    }

    public function getEpreuveId(): ?int
    {
        return $this->id;
    }

    public function getEpreuveLieu(): ?string
    {
        return $this->lieu;
    }

    public function getEpreuveDate(): ?Carbon
    {
        return $this->date;
    }

    public function getEpreuveParticipants(): ?array
    {
        return $this->participants;
    }
}
