<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use PHPUnit\Framework\TestCase;

class AddMedakaCommandTest extends TestCase
{
    public function test(): void
    {
        $this->markTestSkipped('機能テストを追加すること');

        $path = dirname(__FILE__) . '/../../.memory/tank_test.memory';

        $this->getSUT(new TankManager($path));
    }

    public function getSUT(TankManager $tm): AddMedakaCommand
    {
        return new AddMedakaCommand($tm);
    }
}
