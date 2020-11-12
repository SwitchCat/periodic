<?php
/**
 * File:    Periodic.php
 * Created: 12-11-20
 */

namespace SwitchCat\Periodic;

use Jajo\JSONDB;
use HansOtt\RangeRegex\FactoryDefault;
use HansOtt\RangeRegex\Range;

class Periodic
{

    private \Jajo\JSONDB $JSONDB;

    public function __construct()
    {
        $this->JSONDB = new JSONDB(__DIR__);
    }

    public function getAll():array
    {
        return $this->JSONDB->select('*' )->from('elements.json')->get()[0];
    }

    public function getElementByName(string $name):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(['name' => $name])->get()[0];
    }

    public function getElementBySymbol(string $symbol):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(['symbol' => $symbol])->get()[0];
    }

    public function getElementByNumber(int $number):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(['number' => $number])->get()[0];
    }

    public function getElementsByCategory(string $category):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(['category' => $category])->get()[0];
    }

    public function getElementsByAtomicMass(int $min, int $max):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(array( "atomic_mass" => JSONDB::regex( $this->regexRange($min, $max))), JSONDB::AND)->get();
    }

    public function getElementsByPhase(string $phase):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(['phase' => $phase])->get()[0];
    }

    public function getElementsByMeltingPoint(int $min, int $max):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(array( "melt" => JSONDB::regex( $this->regexRange($min, $max))), JSONDB::AND)->get();
    }

    public function getElementsByBoilingPoint(int $min, int $max):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(array( "boil" => JSONDB::regex( $this->regexRange($min, $max))), JSONDB::AND)->get();
    }

    public function getElementsByDensity(int $min, int $max):array
    {
        return $this->JSONDB->select('*')->from( 'elements.json')->where(array( "density" => JSONDB::regex( $this->regexRange($min, $max))), JSONDB::AND)->get();
    }

    private function regexRange(int $min, int $max):string
    {
        $min = intval($min);
        $max = intval($max);
        $factory = new FactoryDefault();
        $converter = $factory->getConverter();
        $range = new Range($min, $max);
        return sprintf('/^(%s)$/', $converter->toRegex($range));
    }
}