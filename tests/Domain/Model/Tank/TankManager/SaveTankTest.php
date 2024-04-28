<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;

use Iamyukihiro\Aquarium\Domain\Exception\NotFileOpenException;
use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use PHPUnit\Framework\TestCase;

class SaveTankTest extends TestCase
{
    private string $path;

    protected function setUp(): void
    {
        $this->path = dirname(__FILE__) . '/../../.memory/tank_test.memory';

        $fileHandle = fopen($this->path, 'r+');

        if ($fileHandle === false) {
            $this->assertTrue(true, '単体テスト実行時、指定されたPATHにファイルが見つかりませんでした');

            $this->markTestSkipped();
        }

        fwrite($fileHandle, '');
        fclose($fileHandle);
    }

    public function test_(): void
    {
        $tank = new Tank();

        $SUT = $this->getSUT($this->path);
        $SUT->save($tank);

        $fileHandle = fopen($this->path, 'r+');
        $contents = fread($fileHandle, filesize($this->path));

        $this->assertSame(
            'O:43:"Iamyukihiro\Aquarium\Domain\Model\Tank\Tank":1:{s:8:"fishList";a:0:{}}',
            $contents
        );
    }

    public function test_Tankファイルが開けない場合は例外を返すこと(): void
    {
        $this->expectException(NotFileOpenException::class);
        $tank = new Tank();

        $SUT = $this->getSUT('dummy/PATH');
        $SUT->save($tank);
    }

    public function getSUT(string $path): TankManager
    {
        return new TankManager($path);
    }
}
