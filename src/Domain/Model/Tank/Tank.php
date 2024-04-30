<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Model\Tank;

use Iamyukihiro\Aquarium\Domain\Model\Fish\FishInterface;

class Tank
{
    /** @var FishInterface[] */
    private array $fishList = [];

    public function addFish(FishInterface $fish): void
    {
        $this->fishList[] = $fish;
    }

    /** @return FishInterface[] */
    public function getFishList(): array
    {
        return $this->fishList;
    }

    /**
     * @param FishInterface[] $fishList
     * @return FishInterface[]
     */
    public function setFishList(array $fishList): array
    {
        return $this->fishList = $fishList;
    }
}
