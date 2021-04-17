<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Fish;

use PHPUnit\Framework\TestCase;

class MedakaTest extends TestCase
{
    public function test_メダカは泳げること() : void
    {
        $SUT = $this->getSUT();
        $actual = $SUT->swim();

        $this->assertSame('泳いでるよー', $actual);
        $this->assertSame('Swim', $SUT->getAct());
    }

    public function getSUT() : Medaka
    {
        return new Medaka();
    }
}
