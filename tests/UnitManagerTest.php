<?php
declare(strict_types=1);

include '../src/unknownUnitException.php';
include '../src/unitManager.php';

use PHPUnit\Framework\TestCase;

final class UnitManagerTest extends TestCase
{
    public function testGetUnitByNameForUnknownUnit()
    {
        $this->expectException(UnknownUnitException::class);

        UnitManager::getUnitByName('bla');
    }
}
?>