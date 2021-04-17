<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium;

use Goreboothero\Aquarium\Domain\Model\Fish\FishInterface;
use Goreboothero\Aquarium\Domain\Model\Tank\Tank;

final class Aquarium
{
    private Tank $tank;

    /**
     * @param Tank $tank
     * @param FishInterface[] $fishers
     */
    public function __construct(Tank $tank, array $fishers = [])
    {
        foreach ($fishers as $fish)
        {
            $tank->addFish($fish);
        }

        $this->tank = $tank;
    }

    public function enjoy() : string
    {
        dd($this->tank);
    }
}
