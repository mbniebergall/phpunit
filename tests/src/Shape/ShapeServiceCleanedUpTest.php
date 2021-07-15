<?php

declare(strict_types=1);

namespace Shape;

use Faker\Factory;
use Faker\Generator;
use Infrastructure\Db;
use Infrastructure\Sms;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class ShapeServiceCleanedUpTest extends TestCase
{
    use ProphecyTrait;

    protected Generator $faker;

    public function setUp(): void
    {
        $this->faker = Factory::create();
    }

    public function testCreate()
    {
        $dbMock = $this->prophesize(Db::class);
        $smsMock = $this->prophesize(Sms::class);

        $shape = $this->faker->word;
        $dbMock->insert('shape', ['shape' => $shape])
            ->shouldBeCalled()
            ->willReturn(1);

        $shapeServiceCleanedUp = new ShapeServiceCleanedUp(
            $dbMock->reveal(),
            $smsMock->reveal()
        );

        $shapeServiceCleanedUp->create($shape);
    }

    public function testSmsArea()
    {
        $dbMock = $this->prophesize(Db::class);
        $smsMock = $this->prophesize(Sms::class);
        $shapeMock = $this->prophesize(ShapeInterface::class);

        $area = $this->faker->randomFloat();
        $shapeMock->area()
            ->shouldBeCalled()
            ->willReturn($area);

        $toNumber = $this->faker->phoneNumber;
        $smsMock->send($toNumber, 'Area is ' . $area)
            ->shouldBeCalled()
            ->willReturn(1);

        $shapeServiceCleanedUp = new ShapeServiceCleanedUp(
            $dbMock->reveal(),
            $smsMock->reveal()
        );

        $shapeServiceCleanedUp->smsArea(
            $shapeMock->reveal(),
            $toNumber
        );
    }
}
