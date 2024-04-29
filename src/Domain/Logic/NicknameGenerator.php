<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

class NicknameGenerator
{
    /** @var string[] */
    private array $fishNicknames = [
        'ジョン',
        'たけし',
        'マイク',
        'マイケル',
        'ジョニー',
        'ボブ',
        'ありさわ',
        'ゆきひろ',
    ];

    public function generate(): string
    {
        $randomIndex = array_rand($this->fishNicknames);

        return $this->fishNicknames[$randomIndex];
    }
}
