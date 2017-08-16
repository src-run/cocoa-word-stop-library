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

abstract class AbstractDriverTest extends TestCase
{
    /**
     * @var string[]
     */
    protected static $notStopWords = [
        'stephen',
        'colbert',
        'blackberry',
        'welcomes',
        'connecticut',
        'philadelphia',
    ];

    /**
     * @return \Generator
     */
    public static function provideStopwordMatchData(): \Generator
    {
        $driver = static::getDriverInstance();
        $dictionaryMethod = (new \ReflectionObject($driver))->getMethod('getDictionary');
        $dictionaryMethod->setAccessible(true);
        $dictionary = $dictionaryMethod->invoke($driver);

        foreach ($dictionary as $word) {
            yield [$word];
        }
    }

    /**
     * @dataProvider provideStopwordMatchData
     *
     * @param string $word
     */
    public function testStopwordMatch(string $word)
    {
        $driver = static::getDriverInstance();

        $this->assertTrue($driver->isStopWord($word));
        $this->assertTrue($driver->isStopWord(strtoupper($word)));
    }

    /**
     * @return \Generator
     */
    public static function provideStopwordNotMatchData(): \Generator
    {
        foreach (static::$notStopWords as $word) {
            yield [$word];
        }
    }

    /**
     * @dataProvider provideStopwordNotMatchData
     *
     * @param string $word
     */
    public function testStopwordNotMatch(string $word)
    {
        $driver = static::getDriverInstance();

        $this->assertFalse($driver->isStopWord($word));
        $this->assertFalse($driver->isStopWord(strtoupper($word)));
    }

    /**
     * @return DriverInterface
     */
    abstract static protected function getDriverInstance(): DriverInterface;
}
