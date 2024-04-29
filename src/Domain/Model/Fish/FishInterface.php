<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use Iamyukihiro\Aquarium\Domain\VO\Breed;

interface FishInterface
{
    public function getNickName(): string;

    public function getBreed(): Breed;

    public function getAct(): string;
}
