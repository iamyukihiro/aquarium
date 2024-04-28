<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use Iamyukihiro\Aquarium\Domain\VO\Variety;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class MedakaTest extends TestCase
{
    use ProphecyTrait;

    public function test(): void
    {
        $varietyP = $this->prophesize(Variety::class);
        $varietyP->willBeConstructedWith(['みゆきメダカ']);
        $variety = $varietyP->reveal();

        $SUT = $this->getSUT('メダカ', $variety);
        $actual = $SUT->getAct();

        $this->assertSame('Swim', $SUT->getAct());
    }

    public function getSUT(string $name, Variety $variety): Medaka
    {
        return new Medaka($name, $variety, 'Swim');
    }
}
