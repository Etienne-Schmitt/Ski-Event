<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Factory;

use Syrgoma\Ski\Entity\Categorie;

class CategorieFactory
{
    public static function buildNewFromFactory(int $categorieId, string $categorieName): Categorie
    {
        return new Categorie($categorieId, $categorieName);
    }
}
