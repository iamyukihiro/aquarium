<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use DateTimeImmutable;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

interface FishInterface
{
    public function getNickName(): string;

    public function getBreed(): Breed;

    public function getAct(): string;

    public function getBirthday(): DateTimeImmutable;
}
