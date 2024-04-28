<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use Iamyukihiro\Aquarium\Domain\VO\Variety;

class Medaka implements FishInterface
{
    public function __construct(
        private string $nickName,
        private Variety $variety,
        private string $act,
    ) {
    }

    public function getNickName(): string
    {
        return $this->nickName;
    }

    public function getVariety(): Variety
    {
        return $this->variety;
    }

    public function getAct(): string
    {
        return $this->act;
    }
}
