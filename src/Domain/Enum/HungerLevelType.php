<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Enum;

class HungerLevelType
{
    public const STARVING = '飢餓';
    public const VERY_HUNGRY = 'とても空腹';
    public const HUNGRY = '空腹';
    public const LITTLE_HUNGER = 'すこし空腹';
    public const STUFFED = '満腹';
}
