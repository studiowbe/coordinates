<?php

namespace Studiow\Coordinates\Bounding\Shape;

use Studiow\Coordinates\Bounding\Shape;
use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Distance\Calculator as DistanceCalculator;
use Studiow\Coordinates\Length;

class Circle implements Shape
{
    private $center;
    private $radius;
    private $distanceCalculator;

    public function __construct(Coordinates $center, Length $radius, DistanceCalculator $calculator = null)
    {
        $this->center = $center;
        $this->radius = $radius;
        $this->distanceCalculator = $calculator ?? new DistanceCalculator();
    }

    public function containsPoint(Coordinates $point): bool
    {
        $distance = $this->distanceCalculator->getDistance($this->center, $point);

        return $distance->getMeters() <= $this->radius->getMeters();
    }
}
