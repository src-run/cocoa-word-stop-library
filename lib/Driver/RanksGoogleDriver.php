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

/**
 * {@see http://www.ranks.nl/stopwords}
 */
class RanksGoogleDriver extends AbstractDriver
{
    /**
     * {@inheritdoc}
     */
    protected function getDictionary(): array
    {
        return [
            'i ',
            'a ',
            'about ',
            'an ',
            'are ',
            'as ',
            'at ',
            'be ',
            'by ',
            'com ',
            'for ',
            'from',
            'how',
            'in ',
            'is ',
            'it ',
            'of ',
            'on ',
            'or ',
            'that',
            'the ',
            'this',
            'to ',
            'was ',
            'what ',
            'when',
            'where',
            'who ',
            'will ',
            'with',
            'the',
            'www',
        ];
    }
}
