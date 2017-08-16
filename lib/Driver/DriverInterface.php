<?php

/*
 * This file is part of the `src-run/cocoa-word-stop-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Cocoa\Word\Stop\Driver;

interface DriverInterface
{
    /**
     * Returns true if the passed word is a "stop word" or false if it is not.
     *
     * @param string $word The word to check if it is a stop word
     *
     * @return bool Whether the passed word is a stop word
     */
    public function isStopWord(string $word): bool;
}
