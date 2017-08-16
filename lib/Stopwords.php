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
use SR\Cocoa\Word\Stop\Driver\DriverInterface;

class Stopwords implements StopwordsInterface
{
    /**
     * @var DriverInterface[]
     */
    private $drivers;

    /**
     * @var null|CacheItemPoolInterface
     */
    private $cache;

    /**
     * Stopword constructor.
     *
     * @param DriverInterface[] ...$drivers
     */
    public function __construct(DriverInterface ...$drivers)
    {
        $this->drivers = $drivers;
    }

    /**
     * @param CacheItemPoolInterface|null $cache
     */
    public function setCache(CacheItemPoolInterface $cache = null): void
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function sanitize(array $words): array
    {
        return array_filter(array_filter($words, function ($word) {
            return strlen($word) > 0;
        }), function (string $word) {
            return $this->cache ? $this->processCached($word) : $this->processDirect($word);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function sanitizeSentence(string $sentence): array
    {
        return $this->sanitize(preg_split('{[\s\r\t\n\f,.]+}', $sentence));
    }

    /**
     * @param string $word
     *
     * @return bool
     */
    private function processCached(string $word): bool
    {
        $item = $this->cache->getItem($this->getWordCacheKey($word));

        if (!$item->isHit()) {
            $item->set($this->processDirect($word));
            $this->cache->save($item);
        }

        return $item->get();
    }

    /**
     * @param string $word
     *
     * @return bool
     */
    private function processDirect(string $word): bool
    {
        foreach ($this->drivers as $driver) {
            if ($driver->isStopWord($word)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $word
     *
     * @return string
     */
    private function getWordCacheKey(string $word): string
    {
        static $context;

        if ($context === null) {
            $context = sprintf('sr-word-stop_%s-%s', spl_object_id($this), implode('-', array_map(function (DriverInterface $driver) {
                return spl_object_id($driver);
            }, $this->drivers)));
        }

        return sprintf('%s_%s', $context, $word);
    }
}
