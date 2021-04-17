<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Infrastructure;

use Goreboothero\Aquarium\Domain\Exception\NotOpenFileException;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;

class SaveTank
{
    private string $tankMemoryFilePath;

    public function __construct(string $filePathTankMemory)
    {
        $this->tankMemoryFilePath = $filePathTankMemory;
    }

    public function save(Tank $tank) : void
    {
        $fileHandle = fopen($this->tankMemoryFilePath, 'r+');

        if (!$fileHandle) {
            throw new NotOpenFileException();
        }

        fwrite($fileHandle, serialize($tank));
        fclose($fileHandle);
    }
}
