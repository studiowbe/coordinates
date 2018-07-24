<?php

namespace Studiow\Coordinates\Distance;

use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Length;

interface Formula
{
    public function calculate(Coordinates $from, Coordinates $to, Length $radius): Length;
}
