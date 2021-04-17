<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Fish;

use Goreboothero\Aquarium\Domain\VO\Variety;
use PHPUnit\Framework\TestCase;

class MedakaTest extends TestCase
{
    public function test_メダカは泳げること() : void
    {
        $varietyP = $this->prophesize(Variety::class);
        $varietyP->willBeConstructedWith(['みゆきメダカ']);
        $variety = $varietyP->reveal();

        $SUT = $this->getSUT('メダカ', $variety);
        $actual = $SUT->swim();

        $this->assertSame('泳いでるよー', $actual);
        $this->assertSame('Swim', $SUT->getAct());
    }

    public function getSUT(string $name, Variety $variety) : Medaka
    {
        return new Medaka($name, $variety);
    }
}
