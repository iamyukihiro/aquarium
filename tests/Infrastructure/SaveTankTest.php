<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Infrastructure;

use Goreboothero\Aquarium\Domain\Exception\NotFileOpenException;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;
use PHPUnit\Framework\TestCase;

class SaveTankTest extends TestCase
{
    private string $path;

    protected function setUp(): void
    {
        $this->path = dirname(__FILE__).'/../../.memory/tank_test.memory';

        $fileHandle = fopen($this->path, 'r+');

        if ($fileHandle === false) {
            $this->assertTrue(true, '単体テスト実行時、指定されたPATHにファイルが見つかりませんでした');

            $this->markTestSkipped();
        }

        fwrite($fileHandle, '');
        fclose($fileHandle);
    }

    public function test(): void
    {
        $tank = new Tank();

        $SUT = $this->getSUT($this->path);
        $SUT->save($tank);

        $fileHandle = fopen($this->path, 'r+');
        $contents = fread($fileHandle, filesize($this->path));

        $this->assertSame(
            'O:44:"Goreboothero\Aquarium\Domain\Model\Tank\Tank":1:{s:53:" Goreboothero\Aquarium\Domain\Model\Tank\Tank fishers";a:0:{}}',
            $contents
        );
    }

    public function test_(): void
    {
        $this->expectException(NotFileOpenException::class);
        $tank = new Tank();

        $SUT = $this->getSUT('dummy/PATH');
        $SUT->save($tank);
    }

    public function getSUT(string $path) : SaveTank
    {
        return new SaveTank($path);
    }
}
