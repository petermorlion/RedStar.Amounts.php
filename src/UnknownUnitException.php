<?php

declare(strict_types=1);

/**
 * Exception thrown whenever an exception is referenced by name, but no
 * unit with the given name is known (registered to the UnitManager).
 */
final class UnknownUnitException extends Exception
{
}

?>