<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;

/**
 * The psychopathic class.
 */
class RandomMedakaGenerator
{
    public function __construct(
        private NicknameGenerator $nicknameGenerator
    ) {
    }

    public function generate(): Medaka
    {
        return new Medaka(
            $this->nicknameGenerator->generate(),
            new Breed(FishType::MEDAKA, $this->pickBreedName()),
            'Swim'
        );
    }

    private function pickBreedName(): string
    {
        $medakaBreedNameList = BreedNameType::getBreedNameForMedaka();

        $randomIndex = array_rand($medakaBreedNameList);

        return $medakaBreedNameList[$randomIndex];
    }
}
