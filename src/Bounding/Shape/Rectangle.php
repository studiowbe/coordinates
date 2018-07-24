<?php

namespace Studiow\Coordinates\Bounding\Shape;

use Studiow\Coordinates\Bounding\Shape;
use Studiow\Coordinates\Coordinates;

class Rectangle implements Shape
{
    private $pointA;
    private $pointB;

    private $min;
    private $max;

    public function __construct(Coordinates $pointA, Coordinates $pointB)
    {
        $this->pointA = $pointA;
        $this->pointB = $pointB;

        $this->min = new Coordinates(
            min($pointA->getLatitude(), $pointB->getLatitude()),
            min($pointA->getLongitude(), $pointB->getLongitude())
        );

        $this->max = new Coordinates(
            max($pointA->getLatitude(), $pointB->getLatitude()),
            max($pointA->getLongitude(), $pointB->getLongitude())
        );
    }

    public function containsPoint(Coordinates $point): bool
    {
        if ($point->getLatitude() < $this->min->getLatitude() || $point->getLatitude() > $this->max->getLatitude()) {
            return false;
        }

        if ($point->getLongitude() < $this->min->getLongitude() || $point->getLongitude() > $this->max->getLongitude()) {
            return false;
        }

        return true;
    }
}
