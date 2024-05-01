<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionLevelType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Bass;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

use function Symfony\Component\Clock\now;

class RandomBassGenerator
{
    public function __construct(
        private NicknameGenerator $nicknameGenerator,
    ) {
    }

    public function generate(): Bass
    {
        return new Bass(
            nickName: $this->nicknameGenerator->generate(),
            breed: new Breed(FishType::BASS, BreedNameType::LARGE_MOUSE),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );
    }
}
