<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use Goreboothero\Aquarium\Infrastructure\LoadTank;
use Goreboothero\Aquarium\Infrastructure\SaveTank;
use PHPUnit\Framework\TestCase;

class AddMedakaCommandTest extends TestCase
{
    public function test(): void
    {
        $this->markTestSkipped('機能テストを追加すること');

        $path = dirname(__FILE__).'/../../.memory/tank_test.memory';

        $saveTank = new SaveTank($path);
        $loadTank = new LoadTank($path);

        $this->getSUT($loadTank, $saveTank);
    }

    public function getSUT(LoadTank $loadTank, SaveTank $saveTank) : AddMedakaCommand
    {
        return new AddMedakaCommand($loadTank, $saveTank);
    }
}
