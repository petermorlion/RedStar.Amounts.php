<?php
declare(strict_types=1);

include './unknownUnitException.php';

final class UnitManager
{
    public static function getUnitByName(string $name): Unit
    {
        throw new UnknownUnitException('bla');
    }
}

?>