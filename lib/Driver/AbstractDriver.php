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

abstract class AbstractDriver implements DriverInterface
{
    /**
     * {@inheritdoc}
     */
    public function isStopWord(string $word): bool
    {
        return in_array(strtolower($word), $this->getDictionary());
    }

    /**
     * Returns an array of stop words for the driver.
     *
     * @return string[]
     */
    abstract protected function getDictionary(): array;
}
