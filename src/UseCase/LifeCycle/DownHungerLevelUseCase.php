<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase\LifeCycle;

use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Exception\RuntimeException;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;

class DownHungerLevelUseCase
{
    public function __construct(
        private TankManager $tankManager,
    ) {
    }

    public function down(): void
    {
        $tank = $this->tankManager->load();

        $fishList = $tank->getFishList();
        $newFishList = [];
        foreach ($fishList as $fish) {
            $newFishList[] = $fish->setHungerLevel(
                $this->downHungerLevel($fish->getHungerLevel())
            );
        }

        $tank->setFishList($newFishList);

        $this->tankManager->save($tank);
    }

    private function downHungerLevel(string $hungerLevel): string
    {
        switch ($hungerLevel) {
            case HungerLevelType::STUFFED:
                return HungerLevelType::LITTLE_HUNGER;

            case HungerLevelType::LITTLE_HUNGER:
                return HungerLevelType::HUNGRY;

            case HungerLevelType::HUNGRY:
                return HungerLevelType::VERY_HUNGRY;

            case HungerLevelType::STARVING:
            case HungerLevelType::VERY_HUNGRY:
                return HungerLevelType::STARVING;
        }

        throw new RuntimeException('Not support HungerLevel.');
    }
}
