<?php declare(strict_types=1);
/**
 * File:    PeriodicTest.php
 * Created: 13-11-20
 */
namespace SwitchCat\Periodic\Tests;

use \PHPUnit\Framework\TestCase;
use HansOtt\RangeRegex\FactoryDefault;
use HansOtt\RangeRegex\Range;

class PeriodicTest  extends TestCase
{
    private $path;

    public function __construct(?string $name = NULL, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->path = $path = 'vendor/switchcat/periodic/src/elements.json';
    }

    public function testJsonElementFileExist()
    {
        $this->assertFileExists($this->path);
    }

    public function testJsonElementFileIsReadable()
    {
        $this->assertFileIsReadable($this->path);
    }

    public function testFileIsValidJson()
    {
        $this->assertTrue(json_decode(file_get_contents($this->path)) !== NULL);
        $this->assertTrue(json_decode(file_get_contents($this->path)) !== FALSE);
    }

    public function testRangeIsValidRegex()
    {
        $ranges =
            [
                [0,0],
                [0,350],
                [350,350]
            ];
        $factory = new FactoryDefault();
        $converter = $factory->getConverter();
        foreach($ranges as $r)
        {
            $range = new Range($r[0], $r[1]);
            $regex = sprintf('/^(%s)$/', $converter->toRegex($range));
            $this->assertTrue(preg_match($regex, (string)$r[0]) === 1);
            $this->assertTrue(preg_match($regex, (string)$r[1]) === 1);
            $this->assertTrue(preg_match($regex, (string)mt_rand($r[0], $r[1])) === 1);
        }
    }




}