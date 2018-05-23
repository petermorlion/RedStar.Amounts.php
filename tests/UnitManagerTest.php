<?php
declare(strict_types=1);

namespace RedStar\Amounts\Tests;

use PHPUnit\Framework\TestCase;
use \RedStar\Amounts;

final class UnitManagerTest extends TestCase
{
    public function testRegisteringUnit()
    {
        $unit = new Amounts\Unit("SomeUnit", "SU", new Amounts\UnitType("SomeUnitType"));
        Amounts\UnitManager::registerUnit($unit);

        $byName = Amounts\UnitManager::getUnitByName("SomeUnit");
        $this->assertEquals($unit, $byName);

        $bySymbol = Amounts\UnitManager::getUnitBySymbol("SU");
        $this->assertEquals($unit, $bySymbol);
    }

    public function testGetUnitByNameForUnknownUnit()
    {
        $this->expectException(Amounts\UnknownUnitException::class);

        Amounts\UnitManager::getUnitByName('bla');
    }
}
?>