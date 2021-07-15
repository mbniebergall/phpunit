<?php

declare(strict_types=1);

namespace Math;

use PHPUnit\Framework\TestCase;

class SimpleAddTest extends TestCase
{
    public function testSimpleAddCanAdd()
    {
        $this->assertSame(4, SimpleAdd::add(2, 2));
    }
}
