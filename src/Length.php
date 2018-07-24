<?php

namespace Studiow\Coordinates;

class Length
{
    private $meter;

    private function __construct(float $meter)
    {
        $this->meter = $meter;
    }

    public function getMeters(float $precision = null): float
    {
        return $this->round($this->meter, $precision);
    }

    public function getKilometers(float $precision = null): float
    {
        return $this->round($this->meter / 1000, $precision);
    }

    private function round(float $value, int $precision = null)
    {
        return is_null($precision) ? $value : round($value, $precision, PHP_ROUND_HALF_UP);
    }

    public static function fromMeters(int $meters): self
    {
        return new self(abs($meters));
    }

    public static function fromKilometers(float $kilometers): self
    {
        return self::fromMeters($kilometers * 1000);
    }
}
