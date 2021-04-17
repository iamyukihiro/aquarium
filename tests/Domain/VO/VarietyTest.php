<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Domain\VO;

use PHPUnit\Framework\TestCase;

class VarietyTest extends TestCase
{
    public function test_システムで定義された品種名を扱えること() : void
    {
        $variety = $this->getSUT($name = 'みゆき');

        $this->assertSame($name, $variety->getName());
    }

    public function test_システムで定義されていない品種名は扱わないこと() : void
    {
        $this->markTestSkipped('システムで定義されていない品種名は扱わないようにするロジックが未完成なので');

        $variety = $this->getSUT($name = 'システムで定義されていない品種名');
    }

    public function getSUT(string $name) : Variety
    {
        return new Variety($name);
    }
}
