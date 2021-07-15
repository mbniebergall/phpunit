<?php

declare(strict_types=1);

namespace Math;

class Multiplier
{
    public function multiply(float ...$numbers): float
    {
        $return = 1;

        foreach ($numbers as $value) {
            if (!is_numeric($value)) {
                throw new \InvalidArgumentException('Not a Number: ' . $value);
            }

            $return = bcmul((string) $return, (string) $value, 10);
        }

        return (float) $return;
    }
}
