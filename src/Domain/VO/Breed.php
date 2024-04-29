<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\VO;

class Breed
{
    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
