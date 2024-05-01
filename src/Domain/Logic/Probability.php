<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

class Probability
{
    public function calc(int $percentage): bool
    {
        $randomNumber = mt_rand(1, 100);

        return $randomNumber <= $percentage;
    }
}
