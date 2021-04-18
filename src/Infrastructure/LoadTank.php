<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Infrastructure;

use Goreboothero\Aquarium\Domain\Exception\NotFileOpenException;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;

class LoadTank
{
    private string $tankMemoryFilePath;

    public function __construct(string $filePathTankMemory)
    {
        $this->tankMemoryFilePath = $filePathTankMemory;
    }

    public function load() : Tank
    {
        $fileHandle = fopen($this->tankMemoryFilePath, 'r+');

        if (!$fileHandle) {
            throw new NotFileOpenException();
        }

        $contents = fread($fileHandle, (int)filesize($this->tankMemoryFilePath));

        /** @var Tank */
        return $tank = unserialize($contents);
    }
}
