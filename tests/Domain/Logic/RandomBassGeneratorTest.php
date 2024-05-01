<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Model\Fish\Bass;
use PHPUnit\Framework\TestCase;

class RandomBassGeneratorTest extends TestCase
{
    public function test_ブラックバスが生成されること(): void
    {
        $SUT = $this->getSUT();
        $actual = $SUT->generate();

        $this->assertInstanceOf(Bass::class, $actual);
        $this->assertIsString($actual->getNickName());
    }

    public function getSUT(): RandomBassGenerator
    {
        return new RandomBassGenerator(
            new NicknameGenerator()
        );
    }
}
