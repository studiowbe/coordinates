<?php

namespace Studiow\Coordinates\Test\Unit;

use PHPUnit\Framework\TestCase;
use Studiow\Coordinates\Length;

class LengthTest extends TestCase
{
    public function testCreatingDistanceFromMeters()
    {
        $distance = Length::fromMeters(100);
        $this->assertEquals(100, $distance->getMeters());
    }

    public function testCreatingDistanceFromKilometers()
    {
        $distance = Length::fromKilometers(100);
        $this->assertEquals(100, $distance->getKilometers());
    }

    public function testConvertingDistanceFromMetersToKilometers()
    {
        $this->assertEquals(1.2, Length::fromMeters(1200)->getKilometers());
    }

    public function testConvertingDistanceFromKilometersToMeters()
    {
        $this->assertEquals(1200, Length::fromKilometers(1.2)->getMeters());
    }

    public function testRoundingDistances()
    {
        $distance = Length::fromMeters(1253);
        $this->assertEquals(1.25, $distance->getKilometers(2));
        $this->assertEquals(1.3, $distance->getKilometers(1));
        $this->assertEquals(1, $distance->getKilometers(0));
    }

    public function testComparingDistances()
    {
        $short = Length::fromKilometers(10);
        $long = Length::fromKilometers(1000);

        $this->assertEquals(0, $short->compare($short));
        $this->assertEquals(-1, $short->compare($long));
        $this->assertEquals(1, $long->compare($short));
    }
}
