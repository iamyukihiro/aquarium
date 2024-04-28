<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank;

use Iamyukihiro\Aquarium\Domain\Model\Fish\FishInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class TankTest extends TestCase
{
    use ProphecyTrait;

    public function test_水槽に魚を追加できること(): void
    {
        $fishP = $this->prophesize(FishInterface::class);
        $fish = $fishP->reveal();

        $SUT = $this->getSUT();
        $SUT->addFish($fish);

        $this->assertSame([$fish], $SUT->getFishList());
    }

    public function getSUT(): Tank
    {
        return new Tank();
    }
}
