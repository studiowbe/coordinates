<?php

namespace Studiow\Coordinates\Test\Unit;

use PHPUnit\Framework\TestCase;
use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Distance\Calculator;
use Studiow\Coordinates\Distance\Formula\HaversineFormula;
use Studiow\Coordinates\Distance\Formula\VincentyFormula;

class DistanceCalculatorTest extends TestCase
{
    public function testCalculatingDistanceWithHaversine()
    {
        $london = new Coordinates(51.50512, -0.11297);
        $paris = new Coordinates(48.85994, 2.34146);

        $calculator = new Calculator(
            new HaversineFormula()
        );

        $distance = $calculator->getDistance($london, $paris);

        $this->assertEquals(342, $distance->getKilometers(0));
    }

    public function testCalculatingDistanceWithVincenty()
    {
        $london = new Coordinates(51.50512, -0.11297);
        $paris = new Coordinates(48.85994, 2.34146);

        $calculator = new Calculator(
            new VincentyFormula()
        );

        $distance = $calculator->getDistance($london, $paris);

        $this->assertEquals(342, $distance->getKilometers(0));
    }
}
