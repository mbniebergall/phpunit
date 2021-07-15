<?php

declare(strict_types=1);

namespace Shape;

use Infrastructure\Db;
use Infrastructure\Logger;
use Infrastructure\Sms;

class ShapeService
{
    public function create(string $shape): int
    {
        $db = new Db();
        return $db->insert('shape', ['shape' => $shape]);
    }

    public function smsArea(Rectangle $shape, string $toNumber): bool
    {
        $sms = new Sms([
            'api_uri' => 'https://example.com/sms',
            'api_key' => 'alkdjfoasifj0392lkdsjf',
        ]);

        $sent = $sms->send($toNumber, 'Area is ' . $shape->area());

        (new Logger())
            ->log('Sms sent to ' . $toNumber . ': Area is ' . $shape->area());

        return $sent;
    }
}
