<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Enum;

class BreedNameType
{
    public const HI_MEDAKA = '緋目高';
    public const MIYUKI = '幹之';
    public const YOUKIHI = '楊貴妃';
    public const OROCHI = 'オロチ';
    public const KURO = 'クロ';
    public const SHIRO = 'シロ';
    public const YOZAKURA = '夜桜';

    /** @return string[] */
    public static function getBreedNameForMedaka(): array
    {
        return [
            self::HI_MEDAKA,
            self::MIYUKI,
            self::YOUKIHI,
            self::OROCHI,
            self::KURO,
            self::SHIRO,
            self::YOZAKURA,
        ];
    }
}
