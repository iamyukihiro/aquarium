<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionLevelType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\LargeMouseBass;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

use function Symfony\Component\Clock\now;

class RandomLargeMouseBassGenerator
{
    public function __construct(
        private NicknameGenerator $nicknameGenerator,
    ) {
    }

    public function generate(): LargeMouseBass
    {
        return new LargeMouseBass(
            nickName: $this->nicknameGenerator->generate(),
            breed: new Breed(FishType::LARGE_MOUSE_BASS, BreedNameType::BIWAKO),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );
    }
}
