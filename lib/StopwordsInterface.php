<?php

/*
 * This file is part of the `src-run/cocoa-word-stop-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Cocoa\Word\Stop;

use Psr\Cache\CacheItemPoolInterface;

interface StopwordsInterface
{
   /**
     * @param CacheItemPoolInterface|null $cache
     */
    public function setCache(CacheItemPoolInterface $cache = null): void;

    /**
     * Expects an array of words and returns those words with all stop words removed.
     *
     * @param string[] $words The words to remove stop words from
     *
     * @return string[] The sanitized words
     */
    public function sanitize(array $words): array;

    /**
     * Expects a string containing any number of words (for example a sentence) and returns an array with stop words removed.
     *
     * @param string $sentence The word(s) as a string sentence to remove stop words
     *
     * @return string[] The sanitized words
     */
    public function sanitizeSentence(string $sentence): array;
}
