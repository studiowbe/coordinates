<?php

namespace Studiow\Coordinates\Distance\Formula;

use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Distance\Formula;
use Studiow\Coordinates\Length;

/**
 * Class HaversineFormula.
 *
 * @see https://en.wikipedia.org/wiki/Haversine_formula
 * Calculate the distance between 2 points on a sphere using the haversine Formula
 * It's fast but not as precise as Vincenty. Good for calculating short distances.
 */
class HaversineFormula implements Formula
{
    public function calculate(Coordinates $from, Coordinates $to, Length $radius): Length
    {
        $latFromRad = deg2rad($from->getLatitude());
        $latToRad = deg2rad($to->getLatitude());

        $delta_lat = deg2rad($from->getLatitude() - $to->getLatitude());
        $delta_lng = deg2rad($from->getLongitude() - $to->getLongitude());

        $angle = 2 * asin(sqrt(pow(sin($delta_lat / 2), 2) + cos($latFromRad) * cos($latToRad) * pow(sin($delta_lng / 2), 2)));

        return Length::fromMeters($angle * $radius->getMeters());
    }
}
