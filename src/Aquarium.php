<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium;

use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;

class Aquarium
{
    public function __construct(
        private Tank $tank,
    ) {
    }

    public function view(Tank $tank): void
    {
        dump($tank);
    }
}
