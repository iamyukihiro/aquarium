<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium;

use PHPUnit\Framework\TestCase;
use Goreboothero\Aquarium\Aquarium;

class AquariumTest extends TestCase
{
    protected Aquarium $spiderMan;

    protected function setUp(): void
    {
        $this->spiderMan = new Aquarium();
    }

    public function testIsInstanceOfSpiderMan(): void
    {
        $actual = $this->spiderMan;
        $this->assertInstanceOf(Aquarium::class, $actual);
    }
}
