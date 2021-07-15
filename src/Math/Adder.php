<?php

declare(strict_types=1);

namespace Math;

class Adder
{
    public function add(float ...$numbers): float
    {
        $return = 0;

        foreach ($numbers as $value) {
            $return = bcadd(
                (string) $return,
                (string) $value,
                10
            );
        }

        return (float) $return;
    }
}
