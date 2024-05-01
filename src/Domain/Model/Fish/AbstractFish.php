<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use DateTimeImmutable;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

abstract class AbstractFish
{
    public function __construct(
        private string $nickName,
        private Breed $breed,
        private string $conditionLevel,
        private string $hungerLevel,
        private DateTimeImmutable $birthday,
    ) {
    }

    public function getNickName(): string
    {
        return $this->nickName;
    }

    public function getBreed(): Breed
    {
        return $this->breed;
    }

    public function getConditionLevel(): string
    {
        return $this->conditionLevel;
    }

    public function getHungerLevel(): string
    {
        return $this->hungerLevel;
    }

    public function setHungerLevel(string $hungerLevel): self
    {
        $this->hungerLevel = $hungerLevel;

        return $this;
    }

    public function getBirthday(): DateTimeImmutable
    {
        return $this->birthday;
    }
}
