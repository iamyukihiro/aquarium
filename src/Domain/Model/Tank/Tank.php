<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank;

use Iamyukihiro\Aquarium\Domain\Model\Fish\AbstractFish;

class Tank
{
    /** @var AbstractFish[] */
    private array $fishList = [];

    public function addFish(AbstractFish $fish): void
    {
        $this->fishList[] = $fish;
    }

    /** @return AbstractFish[] */
    public function getFishList(): array
    {
        return $this->fishList;
    }

    /**
     * @param AbstractFish[] $fishList
     * @return AbstractFish[]
     */
    public function setFishList(array $fishList): array
    {
        return $this->fishList = $fishList;
    }
}
