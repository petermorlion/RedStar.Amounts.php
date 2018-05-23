<?php
declare(strict_types=1);

namespace RedStar\Amounts\Tests;

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