<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium;

use Goreboothero\Aquarium\Domain\Model\Fish\FishInterface;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;
use PHPUnit\Framework\TestCase;

class AquariumTest extends TestCase
{
    public function test(): void
    {
        $this->markTestSkipped('アクアリウムを楽しむという処理の仕様が決定していないのでスキップする');

        $tankP = $this->prophesize(Tank::class);
        $tank = $tankP->reveal();

        $actual = $this->getSUT($tank, $fishers = []);

        $actual->enjoy();

        $this->assertInstanceOf(Aquarium::class, $actual);
    }

    /**
     * @param Tank $tank
     * @param FishInterface[] $fishers
     * @return Aquarium
     */
    public function getSUT(Tank $tank, array $fishers) : Aquarium
    {
        return new Aquarium($tank, $fishers);
    }
}
