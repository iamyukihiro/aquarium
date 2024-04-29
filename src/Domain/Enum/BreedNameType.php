<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Enum;

class BreedNameType
{
    public const HI_MEDAKA = '緋目高';
    public const MIYUKI = 'みゆき';
    public const YOUKIHI = '楊貴妃';
    public const OROCHI = 'オロチ';

    /** @return string[] */
    public static function getBreedNameForMedaka(): array
    {
        return [
            self::HI_MEDAKA,
            self::MIYUKI,
            self::YOUKIHI,
            self::OROCHI,
        ];
    }
}
