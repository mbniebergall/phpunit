<?php

declare(strict_types=1);

namespace Shape;

use Math\Adder;
use Math\Multiplier;

class Rectangle implements ShapeInterface
{
    public function __construct(
        protected float $length,
        protected float $width,
        protected Adder $adder,
        protected Multiplier $multiplier
    ) {}

    public function area(): float
    {
        return $this->multiplier->multiply($this->length, $this->width);
    }

    public function perimeter(): float
    {
        return $this->multiplier->multiply(
            2,
            $this->adder->add($this->length, $this->width)
        );
    }
}
