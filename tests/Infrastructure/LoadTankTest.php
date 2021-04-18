<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Infrastructure;

use Goreboothero\Aquarium\Domain\Exception\NotFileOpenException;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;
use PHPUnit\Framework\TestCase;

class LoadTankTest extends TestCase
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
        $SUT = $this->getSUT($this->path);
        $actual = $SUT->load();

        $this->assertInstanceOf(Tank::class, $actual);
    }

    public function test_(): void
    {
        $this->expectException(NotFileOpenException::class);

        $SUT = $this->getSUT('dummy/PATH');
        $SUT->load();
    }

    public function getSUT(string $path) : LoadTank
    {
        return new LoadTank($path);
    }
}
