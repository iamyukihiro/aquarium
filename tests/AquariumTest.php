<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium;

use PHPUnit\Framework\TestCase;

class AquariumTest extends TestCase
{
    protected Aquarium $aquarium;

    protected function setUp(): void
    {
        $this->aquarium = new Aquarium();
    }

    public function test(): void
    {
        $actual = $this->aquarium;
        $this->assertInstanceOf(Aquarium::class, $actual);
    }
}
