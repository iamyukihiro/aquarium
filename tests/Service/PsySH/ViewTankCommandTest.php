<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use PHPUnit\Framework\TestCase;

class ViewTankCommandTest extends TestCase
{
    public function test(): void
    {
        $this->markTestSkipped('機能テストを追加すること');
    }

    public function getSUT(string $path): ViewTankCommand
    {
        return new ViewTankCommand($path);
    }
}
