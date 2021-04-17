<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\VO;

class Variety
{
    private string $name;

    public function __construct(string $name)
    {
        // TODO : システムで定義されていない品種名が入らないように
        $this->name = $name;
    }

    public function getName() :string
    {
        return $this->name;
    }
}
