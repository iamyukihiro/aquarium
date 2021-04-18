<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use PHPUnit\Framework\TestCase;

class TankCommandTest extends TestCase
{
    public function test(): void
    {
        $this->markTestSkipped('機能テストを追加すること');
    }

    public function getSUT(string $path) : TankCommand
    {
        return new TankCommand($path);
    }
}
