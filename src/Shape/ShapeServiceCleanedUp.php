<?php

declare(strict_types=1);

namespace Shape;

use Infrastructure\Db;
use Infrastructure\Sms;

class ShapeServiceCleanedUp
{
    public function __construct(
        protected Db $db,
        protected Sms $sms
    ) {}

    public function create(string $shape): int
    {
        return $this->db->insert('shape', ['shape' => $shape]);
    }

    public function smsArea(ShapeInterface $shape, string $toNumber): bool
    {
        $area = $shape->area();
        return $this->sms->send($toNumber, 'Area is ' . $area);
    }
}
