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

use PHPUnit\Framework\TestCase;
use SR\Cocoa\Word\Stop\Driver\DriverInterface;
use SR\Cocoa\Word\Stop\Driver\MySqlInnoDbDriver;
use SR\Cocoa\Word\Stop\Stopwords;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\CacheItem;

/**
 * @covers \SR\Cocoa\Word\Stop\Stopwords
 */
class StopwordsTest extends TestCase
{
    /**
     * @group stopword
     */
    public function testSanitize()
    {
        $stopwords = new Stopwords(new MySqlInnoDbDriver());

        $this->assertSame(['cool', 'story', 'eager', 'kid', 'mall'],
            array_values($stopwords->sanitize(['a', 'cool', 'story', 'about', 'an', 'eager', 'kid', 'at', 'the', 'mall'])));

        $this->assertSame(['cool', 'story', 'eager', 'kid', 'mall'],
            array_values($stopwords->sanitizeSentence('a cool story about an eager kid at the mall')));
    }

    /**
     * @group stopword-cached
     */
    public function testSanitizeWithCache()
    {
        $cache = $this
            ->getMockBuilder(ArrayAdapter::class)
            ->getMock();

        $cache
            ->expects($this->atLeastOnce())
            ->method('getItem')
            ->willReturn(new CacheItem());

        $cache
            ->expects($this->atLeastOnce())
            ->method('save');

        $stopwords = new Stopwords(new MySqlInnoDbDriver());
        $stopwords->setCache($cache);

        $this->assertSame(['cool', 'story', 'eager', 'kid', 'mall'],
            array_values($stopwords->sanitize(['a', 'cool', 'story', 'about', 'an', 'eager', 'kid', 'at', 'the', 'mall'])));

        $this->assertSame(['cool', 'story', 'eager', 'kid', 'mall'],
            array_values($stopwords->sanitizeSentence('a cool story about an eager kid at the mall')));
    }
}
