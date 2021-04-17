<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\Model\Tank;

use Goreboothero\Aquarium\Domain\Model\Fish\FishInterface;

class Tank
{
    /**
     * @var FishInterface[]
     */
    private array $fishers = [];

    public function addFish(FishInterface $fish) : void
    {
        $this->fishers[] = $fish;
    }

    /**
     * @return FishInterface[]
     */
    public function getFishers() : array
    {
        return $this->fishers;
    }
}
