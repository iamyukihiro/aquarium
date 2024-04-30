<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use DateTimeImmutable;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

class Medaka implements FishInterface
{
    public function __construct(
        private string $nickName,
        private Breed $breed,
        private string $condition,
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

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getHungerLevel(): string
    {
        return $this->hungerLevel;
    }

    public function getBirthday(): DateTimeImmutable
    {
        return $this->birthday;
    }
}
