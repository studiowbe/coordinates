<?php

namespace Studiow\Coordinates\Bounding;

use Studiow\Coordinates\Coordinates;

interface Shape
{
    public function containsPoint(Coordinates $point): bool;
}
