<?php
declare(strict_types=1);

namespace RedStar\Amounts\Tests;

use PHPUnit\Framework\TestCase;
use \RedStar\Amounts;

final class UnitManagerTest extends TestCase
{
    public function testGetUnitByNameForUnknownUnit()
    {
        $this->expectException(Amounts\UnknownUnitException::class);

        Amounts\UnitManager::getUnitByName('bla');
    }
}
?>