<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Domain\Logic;

use PHPUnit\Framework\TestCase;

class NicknameGeneratorTest extends TestCase
{
    public function test_ニックネームが生成されること(): void
    {
        $SUT = $this->getSUT();
        $actual = $SUT->generate();

        $this->assertIsString($actual);
    }

    public function getSUT(): NicknameGenerator
    {
        return new NicknameGenerator();
    }
}
