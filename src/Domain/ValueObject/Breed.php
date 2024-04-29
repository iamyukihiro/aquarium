<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\ValueObject;

class Breed
{
    public function __construct(
        private string $fishType,
        private string $breedName
    ) {
    }

    public function getFishType(): string
    {
        return $this->fishType;
    }

    public function getBreedName(): string
    {
        return $this->breedName;
    }
}
