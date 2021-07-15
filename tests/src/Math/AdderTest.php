<?php

declare(strict_types=1);

namespace src\Math;

use Math\Adder;
use PHPUnit\Framework\TestCase;

class AdderTest extends TestCase
{
    protected Adder $adder;

    public function setUp(): void
    {
        $this->adder = new Adder();
    }

    public function testAdderWithSetup()
    {
        $sum = $this->adder->add(3, 7);

        $this->assertSame(10.0, $sum);
    }

    public function testAdderThrowsExceptionWhenNotANumber()
    {
        $this->expectException(\TypeError::class);

        $adder = new Adder();
        $adder->add(7, 'Can\'t add this');
    }

    public function testAdderAddsIntegers()
    {
        $adder = new Adder();
        $sum = $adder->add(7, 3, 5, 5, 6, 4, 1, 9);

        $this->assertSame(40.0, $sum);
    }

    public function testAdderAddsDecimals()
    {
        $adder = new Adder();
        $sum = $adder->add(1.5, 0.5);

        $this->assertSame(2.0, $sum);
    }

    /**
     * @dataProvider dataProviderNumbers
     */
    public function testAdderAddsNumbers(
        float $expectedSum,
        ...$numbers
    ) {
        $adder = new Adder();
        $sum = $adder->add(...$numbers);

        $this->assertSame($expectedSum, $sum);
    }

    public function dataProviderNumbers(): array
    {
        return [
            [2, 1, 1],
            [2, 1.5, 0.5],
        ];
    }
}
