<?php

declare(strict_types=1);

namespace Shape;

use Math\Adder;
use Math\Multiplier;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class RectangleTest extends TestCase
{
    use ProphecyTrait;

    public function testRectangleArea()
    {
        $length = 4.5;
        $width = 10;

        $adderMock = $this->prophesize(Adder::class);
        $multiplierMock = $this->prophesize(Multiplier::class);

        $multiplierMock->multiply($length, $width)
            ->shouldBeCalled()
            ->willReturn(45.0);

        $rectangle = new Rectangle(
            $length,
            $width,
            $adderMock->reveal(),
            $multiplierMock->reveal()
        );

        $area = $rectangle->area();

        $this->assertSame(45.0, $area);
    }

    public function testRectanglePerimeter()
    {
        $length = 8.00001;
        $width = 2.34;

        $adderMock = $this->prophesize(Adder::class);
        $multiplierMock = $this->prophesize(Multiplier::class);

        $adderMock->add($length, $width)
            ->shouldBeCalled()
            ->willReturn(10.34001);

        $multiplierMock->multiply(2, 10.34001)
            ->shouldBeCalled()
            ->willReturn(20.68002);

        $rectangle = new Rectangle(
            $length,
            $width,
            $adderMock->reveal(),
            $multiplierMock->reveal()
        );

        $perimeter = $rectangle->perimeter();

        $this->assertSame(20.68002, $perimeter);
    }
}
