<?php
declare(strict_types=1);

namespace RedStar\Amounts;

final class UnitManager
{
    private static $instance;
    
    private $allUnits;
    private $unitsByType;
    private $unitsByName;
    private $unitsBySymbol;

    private function __construct()
    {
        $this->allUnits = [];
        $this->unitsByType = [];
        $this->unitsByName = [];
        $this->unitsBySymbol = [];
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new UnitManager();
        }

        return self::$instance;
    }

    public static function getUnitByName(string $name): Unit
    {
        if (is_null(self::tryGetUnitByName($name)))
        {
            throw new UnknownUnitException("No unit found named {$name}.");
        }

        return self::getInstance()->unitsByName[$name];
    }

    public static function tryGetUnitByName(string $name)
    {
        // TODO: allow resolving unit at runtime (see .NET implementation with UnitResolve event)

        if (array_key_exists($name, self::getInstance()->unitsByName))
        {
            return self::getInstance()->unitsByName[$name];
        }

        return NULL;
    }

    public static function getUnitBySymbol(string $symbol): Unit
    {
        if (!array_key_exists($symbol, self::getInstance()->unitsBySymbol))
        {
            throw new UnknownUnitException("No unit found with symbol {$symbol}.");
        }

        return self::getInstance()->unitsBySymbol[$symbol];
    }

    public static function registerUnit(Unit $unit)
    {
        //TODO: add locking like in .NET version

        foreach (self::getInstance()->allUnits as $u)
        {
            if ($u === $unit)
            {
                return;
            }
        }

        // Register unit in allUnits
        self::getInstance()->allUnits[] = $unit;

        // Register unit in unitsByType
        $unitTypeName = $unit->unitType->name;
        if (!array_key_exists($unitTypeName, self::getInstance()->unitsByType))
        {
            self::getInstance()->unitsByType[$unitTypeName] = [];
        }

        self::getInstance()->unitsByType[$unitTypeName][] = $unit;

        // Register unit by name and symbol
        self::getInstance()->unitsByName[$unit->name] = $unit;
        self::getInstance()->unitsBySymbol[$unit->symbol] = $unit;
    }
}

?>