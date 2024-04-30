<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

use function Symfony\Component\Clock\now;

/**
 * The psychopathic class.
 */
class RandomMedakaGenerator
{
    public function __construct(
        private NicknameGenerator $nicknameGenerator,
    ) {
    }

    public function generate(): Medaka
    {
        return new Medaka(
            nickName: $this->nicknameGenerator->generate(),
            breed: new Breed(FishType::MEDAKA, $this->pickBreedName()),
            condition: ConditionType::FINE,
            birthday: now()
        );
    }

    private function pickBreedName(): string
    {
        $medakaBreedNameList = BreedNameType::getBreedNameForMedaka();

        $randomIndex = array_rand($medakaBreedNameList);

        return $medakaBreedNameList[$randomIndex];
    }
}
