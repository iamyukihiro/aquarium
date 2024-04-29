<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use Iamyukihiro\Aquarium\Domain\VO\Breed;

class Medaka implements FishInterface
{
    public function __construct(
        private string $nickName,
        private Breed $breed,
        private string $act,
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

    public function getAct(): string
    {
        return $this->act;
    }
}
