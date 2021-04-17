<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Fish;

class Medaka implements FishInterface
{
    private string $act;

    public function swim(): string
    {
        $this->act = 'Swim'; // TODO: Enum化を検討中

        return '泳いでるよー';
    }
}
