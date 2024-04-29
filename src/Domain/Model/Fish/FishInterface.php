<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Fish;

use Iamyukihiro\Aquarium\Domain\VO\Variety;

interface FishInterface
{
    public function getNickName(): string;

    public function getVariety(): Variety;

    public function getAct(): string;
}
