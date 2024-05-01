<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase\LifeCycle;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionLevelType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

use function Symfony\Component\Clock\now;

class DownHungerLevelUseCaseTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy $tankManagerP;

    protected function setUp(): void
    {
        $this->tankManagerP = $this->prophesize(TankManager::class);
    }

    public function test(): void
    {
        $medaka = new Medaka(
            nickName: 'テストメダカ',
            breed: new Breed(FishType::MEDAKA, BreedNameType::YOUKIHI),
            condition: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );

        $tank = new Tank();
        $tank->addFish($medaka);
        $this->tankManagerP->load()->willReturn($tank)->shouldBeCalled();
        $this->tankManagerP->save(
            Argument::that(
                function (Tank $tank) {
                    $this->assertCount(1, $tank->getFishList());
                    $this->assertSame('テストメダカ', $tank->getFishList()[0]->getNickName());
                    $this->assertSame(HungerLevelType::LITTLE_HUNGER, $tank->getFishList()[0]->getHungerLevel());

                    return $tank;
                }
            )
        )->shouldBeCalled();

        $SUT = $this->getSUT();
        $SUT->down();
    }

    public function getSUT(): DownHungerLevelUseCase
    {
        return new DownHungerLevelUseCase(
            $this->tankManagerP->reveal(),
        );
    }
}
