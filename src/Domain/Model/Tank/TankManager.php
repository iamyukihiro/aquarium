<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank;

use Iamyukihiro\Aquarium\Domain\Exception\NotFileOpenException;

class TankManager
{
    public function __construct(
        private string $tankMemoryFilePath,
    ) {
    }

    public function init(): void
    {
        $fileHandle = fopen($this->tankMemoryFilePath, 'w');
        if (! $fileHandle) {
            throw new NotFileOpenException();
        }

        $tank = new Tank();
        fwrite($fileHandle, serialize($tank));
        fclose($fileHandle);
        clearstatcache();
    }

    public function load(): Tank
    {
        $fileHandle = fopen($this->tankMemoryFilePath, 'r+');
        if (! $fileHandle) {
            throw new NotFileOpenException();
        }

        $contents = fread($fileHandle, (int) filesize($this->tankMemoryFilePath));

        $tank = unserialize($contents, ['allowed_classes' => true]);
        assert($tank instanceof Tank);
        clearstatcache();

        return $tank;
    }

    public function save(Tank $tank): void
    {
        $fileHandle = fopen($this->tankMemoryFilePath, 'r+');
        if (! $fileHandle) {
            throw new NotFileOpenException();
        }

        fwrite($fileHandle, serialize($tank));
        fclose($fileHandle);
        clearstatcache();
    }
}
