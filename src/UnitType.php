<?php
declare(strict_types=1);

namespace RedStar\Amounts;

final class UnitType
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
?>