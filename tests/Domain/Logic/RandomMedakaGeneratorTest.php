<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use PHPUnit\Framework\TestCase;

class RandomMedakaGeneratorTest extends TestCase
{
    public function test_メダカが生成されること(): void
    {
        $SUT = $this->getSUT();
        $actual = $SUT->generate();

        $this->assertInstanceOf(Medaka::class, $actual);
        $this->assertIsString($actual->getNickName());
    }

    public function getSUT(): RandomMedakaGenerator
    {
        return new RandomMedakaGenerator(
            new NicknameGenerator()
        );
    }
}
