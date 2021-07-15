<?php

declare(strict_types=1);

namespace Shape;

interface ShapeInterface
{
    public function area(): float;

    public function perimeter(): float;
}
