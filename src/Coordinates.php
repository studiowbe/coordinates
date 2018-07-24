<?php

namespace Studiow\Coordinates;

class Coordinates
{
    private $latitude;
    private $longitude;

    public function __construct(
        float $latitude,
        float $longitude
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    private function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    private function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    public function withLatitude(float $latitude): Coordinates
    {
        $newInstance = clone $this;
        $newInstance->setLatitude($latitude);

        return $newInstance;
    }

    public function withLongitude(float $longitude): Coordinates
    {
        $newInstance = clone $this;
        $newInstance->setLongitude($longitude);

        return $newInstance;
    }
}
