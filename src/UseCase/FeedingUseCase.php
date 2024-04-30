<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;

class FeedingUseCase
{
    public function __construct(
        private TankManager $tankManager,
    ) {
    }

    public function up(): void
    {
        $tank = $this->tankManager->load();
        $fishList = $tank->getFishList();

        $newFishList = [];
        foreach ($fishList as $fish) {
            $newFishList[] = $fish->setHungerLevel(HungerLevelType::STUFFED);
        }

        $tank->setFishList($newFishList);

        $this->tankManager->save($tank);
    }
}
