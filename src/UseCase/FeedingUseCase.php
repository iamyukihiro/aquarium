<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Bass;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
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
        $medakaList = $tank->getFishList(Medaka::class);
        $largeMouseBassList = $tank->getFishList(Bass::class);

        $newFishList = [];
        foreach ($largeMouseBassList as $largeMouseBass) {
            if (count($medakaList) === 0) {
                break;
            }

            $randomIndex = array_rand($medakaList);
            unset($medakaList[$randomIndex]);

            $newFishList[] = $largeMouseBass->setHungerLevel(HungerLevelType::STUFFED);
        }

        foreach ($medakaList as $medaka) {
            $newFishList[] = $medaka->setHungerLevel(HungerLevelType::STUFFED);
        }

        $tank->setFishList($newFishList);
        $this->tankManager->save($tank);
    }
}
