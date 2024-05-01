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

    /**
     * @param string|null $fishClassName
     * @return AbstractFish[]
     */
    public function getFishList(?string $fishClassName = null): array
    {
        if ($fishClassName === null) {
            return $this->fishList;
        }

        $returnFishList = [];
        foreach ($this->fishList as $fish) {
            if ($fish::class === $fishClassName) {
                $returnFishList[] = $fish;
            }
        }

        return $returnFishList;
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
