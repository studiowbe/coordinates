<?php

namespace Studiow\Coordinates\Test\Unit;

use PHPUnit\Framework\TestCase;
use Studiow\Coordinates\Bounding\Shape\Circle;
use Studiow\Coordinates\Bounding\Shape\Rectangle;
use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Length;

class BoundingTest extends TestCase
{
    public function testCircleContainsPoint()
    {
        $london = new Coordinates(51.50512, -0.11297);
        $paris = new Coordinates(48.85994, 2.34146);

        $shape = new Circle($london, Length::fromKilometers(100));
        $this->assertFalse($shape->containsPoint($paris));

        $shape = new Circle($london, Length::fromKilometers(400));
        $this->assertTrue($shape->containsPoint($paris));
    }

    public function testRectangleContainsPoint()
    {
        $london = new Coordinates(51.50512, -0.11297);
        $paris = new Coordinates(48.85994, 2.34146);

        $calais = new Coordinates(50.9518803, 1.8339368);

        $shape = new Rectangle($london, $paris);
        $this->assertTrue($shape->containsPoint($calais));

        $shape = new Rectangle($paris, $calais);
        $this->assertFalse($shape->containsPoint($london));
    }
}
