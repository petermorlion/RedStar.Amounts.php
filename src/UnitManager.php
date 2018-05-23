<?php
declare(strict_types=1);

namespace RedStar\Amounts;

final class UnitManager
{
    public static function getUnitByName(string $name): Unit
    {
        throw new UnknownUnitException('bla');
    }
}

?>