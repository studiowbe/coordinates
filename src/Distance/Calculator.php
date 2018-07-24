<?php

namespace Studiow\Coordinates\Distance;

use Studiow\Coordinates\Coordinates;
use Studiow\Coordinates\Distance\Formula\HaversineFormula;
use Studiow\Coordinates\Length;

class Calculator
{
    private $formula;
    private $radius;

    /**
     * Calculator constructor.
     *
     * @param Formula|null $formula Defaults to haversine Formula
     * @param Length|null  $radius  Defaults to earth radius (6371 km)
     */
    public function __construct(
        Formula $formula = null, Length $radius = null
    ) {
        $this->setFormula($formula ?? new HaversineFormula());
        $this->setRadius($radius ?? Length::fromKilometers(6371));
    }

    public function setFormula(Formula $formula): void
    {
        $this->formula = $formula;
    }

    public function setRadius(Length $radius): void
    {
        $this->radius = $radius;
    }

    public function getFormula(): Formula
    {
        return $this->formula;
    }

    public function getRadius(): Length
    {
        return $this->radius;
    }

    public function getDistance(Coordinates $from, Coordinates $to): Length
    {
        return $this->getFormula()->calculate($from, $to, $this->getRadius());
    }
}
