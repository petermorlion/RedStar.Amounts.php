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

    // TODO: register without base unit

    public function testGetUnitByNameForUnknownUnit()
    {
        $this->expectException(Amounts\UnknownUnitException::class);

        Amounts\UnitManager::getUnitByName('bla');
    }

    public function testTryGetUnitByNameForUnknownUnit()
    {
        $unit = Amounts\UnitManager::tryGetUnitByName('bla');

        $this->assertNull($unit);
    }

    public function testTryGetUnitByNameForKnownUnit()
    {
        $unit = new Amounts\Unit("SomeUnit", "SU", new Amounts\UnitType("SomeUnitType"));
        Amounts\UnitManager::registerUnit($unit);

        $retrievedUnit = Amounts\UnitManager::tryGetUnitByName('SomeUnit');

        $this->assertEquals($unit, $retrievedUnit);
    }
}
?>