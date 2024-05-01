<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Model\Fish\LargeMouseBass;
use PHPUnit\Framework\TestCase;

class RandomLargeMouseBassGeneratorTest extends TestCase
{
    public function test_ブラックバスが生成されること(): void
    {
        $SUT = $this->getSUT();
        $actual = $SUT->generate();

        $this->assertInstanceOf(LargeMouseBass::class, $actual);
        $this->assertIsString($actual->getNickName());
    }

    public function getSUT(): RandomLargeMouseBassGenerator
    {
        return new RandomLargeMouseBassGenerator(
            new NicknameGenerator()
        );
    }
}
