<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium;

use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class AquariumTest extends TestCase
{
    use ProphecyTrait;

    public function test(): void
    {
        $this->markTestSkipped();

        $tankP = $this->prophesize(Tank::class);
        $tank = $tankP->reveal();

        $actual = $this->getSUT($tank);
        $actual->view($tank);

        $this->assertInstanceOf(Aquarium::class, $actual);
    }

    public function getSUT(Tank $tank): Aquarium
    {
        return new Aquarium($tank);
    }
}
