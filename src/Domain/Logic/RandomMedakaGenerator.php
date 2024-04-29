<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\VO\Breed;

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
            $this->nicknameGenerator->generate() . 'メダカ',
            new Breed('みゆき'),
            'Swim'
        );
    }
}
