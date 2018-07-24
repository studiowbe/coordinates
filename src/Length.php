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

    /**
     * Compare 2 lengths.
     *
     * @param Length $with
     *
     * @return int -1 when $this is shorter, 0 when both lengths are equal, or 1 when $this is longer
     */
    public function compare(Length $with): int
    {
        return $this->getMeters() <=> $with->getMeters();
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
