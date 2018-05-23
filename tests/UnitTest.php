<?php
declare(strict_types=1);

namespace RedStar\Amounts\Tests;

use PHPUnit\Framework\TestCase;
use \RedStar\Amounts;

final class UnitTest extends TestCase
{
    public function testConstructor()
    {
        $unit = new Amounts\Unit("SomeUnit", "SU", new Amounts\UnitType("SomeUnitType"));
        
        $this->assertEquals("SomeUnit", $unit->name);
        $this->assertEquals("SU", $unit->symbol);
        $this->assertEquals(1.0, $unit->factor);
        $this->assertEquals(new Amounts\UnitType("SomeUnitType"), $unit->unitType);
        $this->assertTrue($unit->isNamed);
    }
}
?>