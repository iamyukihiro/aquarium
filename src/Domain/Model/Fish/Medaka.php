<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Fish;

use Goreboothero\Aquarium\Domain\VO\Variety;

class Medaka implements FishInterface
{
    private string $nickName;
    private Variety $variety;
    private string $act = '';

    public function __construct(string $name, Variety $variety)
    {
        $this->nickName = $name;
        $this->variety = $variety;
    }

    public function getVariety(): Variety
    {
        return $this->variety;
    }

    public function getNickName(): string
    {
        return $this->nickName;
    }

    public function getAct(): string
    {
        return $this->act;
    }

    public function swim(): string
    {
        $this->act = 'Swim'; // TODO: Enum化を検討中

        return '泳いでるよー';
    }
}
