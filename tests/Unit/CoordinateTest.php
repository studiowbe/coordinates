<?php

namespace Studiow\Coordinates\Test\Unit;

use PHPUnit\Framework\TestCase;
use Studiow\Coordinates\Coordinates;

class CoordinateTest extends TestCase
{
    public function testCreatingCoordinates()
    {
        $coordinates = new Coordinates(50.879047, 4.699857);
        $this->assertEquals(50.879047, $coordinates->getLatitude());
        $this->assertEquals(4.699857, $coordinates->getLongitude());
    }

    public function testModifyingLatitude()
    {
        $coordinates = new Coordinates(50.879047, 4.699857);
        $withModifiedLatitude = $coordinates->withLatitude(51.879047);
        $this->assertEquals(51.879047, $withModifiedLatitude->getLatitude());
        $this->assertEquals($coordinates->getLongitude(), $withModifiedLatitude->getLongitude());
    }

    public function testModifyingLongitude()
    {
        $coordinates = new Coordinates(50.879047, 4.699857);
        $withModifiedLongitude = $coordinates->withLongitude(5.699857);
        $this->assertEquals($coordinates->getLatitude(), $withModifiedLongitude->getLatitude());
        $this->assertEquals(5.699857, $withModifiedLongitude->getLongitude());
    }
}
