<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Tank;

use Goreboothero\Aquarium\Domain\Model\Fish\FishInterface;
use PHPUnit\Framework\TestCase;

class TankTest extends TestCase
{
    public function test_水槽に魚を追加できること() : void
    {
        $fishP = $this->prophesize(FishInterface::class);
        $fish = $fishP->reveal();

        $SUT = $this->getSUT();
        $SUT->addFish($fish);

        $this->assertSame([$fish], $SUT->getFishers());
    }

    public function getSUT() : Tank
    {
        return new Tank();
    }
}
