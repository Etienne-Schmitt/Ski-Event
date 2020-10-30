<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Entity;

class Profil
{
    private int $id;
    private string $name;

    public function getProfilId(): ?int
    {
        return $this->id;
    }

    public function getCategorieName(): string
    {
        return $this->name;
    }
}
