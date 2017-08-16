<?php

/*
 * This file is part of the `src-run/cocoa-word-stop-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Cocoa\Word\Stop\Tests;

use SR\Cocoa\Word\Stop\Driver\DriverInterface;
use SR\Cocoa\Word\Stop\Driver\RanksDefaultDriver;

/**
 * @covers \SR\Cocoa\Word\Stop\Driver\AbstractDriver
 * @covers \SR\Cocoa\Word\Stop\Driver\RanksDefaultDriver
 */
class RanksDefaultDriverTest extends AbstractDriverTest
{
    /**
     * @return DriverInterface
     */
    static protected function getDriverInstance(): DriverInterface
    {
        return new RanksDefaultDriver();
    }
}
