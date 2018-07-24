<?php

namespace Studiow\Coordinates\Distance\Formula;

use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Distance\Formula;
use Studiow\Coordinates\Length;

/**
 * Class VincentyFormula.
 *
 * @see https://en.wikipedia.org/wiki/Vincenty%27s_formulae
 * Calculate the distance between 2 points on a sphere using the Vincenty's Formula
 * It's not as fast but more precise than haversine.
 */
class VincentyFormula implements Formula
{
    public function calculate(Coordinates $from, Coordinates $to, Length $radius): Length
    {
        $latFromRad = deg2rad($from->getLatitude());
        $lngFromRad = deg2rad($from->getLongitude());
        $latToRad = deg2rad($to->getLatitude());
        $lngToRad = deg2rad($to->getLongitude());

        $delta_lng = $lngToRad - $lngFromRad;
        $a = pow(cos($latToRad) * sin($delta_lng), 2) + pow(cos($latFromRad) * sin($latToRad) - sin($latFromRad) * cos($latToRad) * cos($delta_lng), 2);
        $b = sin($latFromRad) * sin($latToRad) + cos($latFromRad) * cos($latToRad) * cos($delta_lng);

        $angle = atan2(sqrt($a), $b);

        return Length::fromMeters($angle * $radius->getMeters());
    }
}
