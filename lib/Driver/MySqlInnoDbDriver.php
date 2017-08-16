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
 * {@see https://dev.mysql.com/doc/refman/5.7/en/fulltext-stopwords.html}
 */
class MySqlInnoDbDriver extends AbstractDriver
{
    /**
     * {@inheritdoc}
     */
    protected function getDictionary(): array
    {
        return [
            'a',
            'about',
            'an',
            'are',
            'as',
            'at',
            'be',
            'by',
            'com',
            'de',
            'en',
            'for',
            'from',
            'how',
            'i',
            'in',
            'is',
            'it',
            'la',
            'of',
            'on',
            'or',
            'that',
            'the',
            'this',
            'to',
            'was',
            'what',
            'when',
            'where',
            'who',
            'will',
            'with',
            'und',
            'the',
            'www',
        ];
    }
}
