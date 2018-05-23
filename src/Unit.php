<?php
declare(strict_types=1);

namespace RedStar\Amounts;

final class Unit
{
    public $name;
    public $symbol;
    public $factor;
    public $unitType;
    public $isNamed;

    public function __construct(string $name, string $symbol, UnitType $unitType, float $factor = 1.0, bool $isNamed = true)
    {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->factor = $factor;
        $this->unitType = $unitType;
        $this->isNamed = $isNamed;
    }
}
?>