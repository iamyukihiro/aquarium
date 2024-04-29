<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank;

use Iamyukihiro\Aquarium\Domain\Exception\NotFileOpenException;
use PHPUnit\Framework\TestCase;

class TankManagerTest extends TestCase
{
    private string $path;

    private function setUpReadableTank(): void
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

    public function test_save(): void
    {
        $this->setUpReadableTank();

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

    public function test_load(): void
    {
        $this->setUpReadableTank();

        $SUT = $this->getSUT($this->path);
        $actual = $SUT->load();

        $this->assertInstanceOf(Tank::class, $actual);
    }

    public function test_Tankファイルが開けない場合は例外を返すこと(): void
    {
        $this->setUpReadableTank();

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
