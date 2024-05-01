<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionLevelType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Model\Fish\LargeMouseBass;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

use function Symfony\Component\Clock\now;

class FeedingUseCaseTest extends TestCase
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
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STARVING,
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
                    $this->assertSame(HungerLevelType::STUFFED, $tank->getFishList()[0]->getHungerLevel());

                    return $tank;
                }
            )
        )->shouldBeCalled();

        $SUT = $this->getSUT();
        $SUT->up();
    }

    public function test_エサを上げた場合、空腹状態のブラックバスはメダカを1匹食べた後、満腹になること(): void
    {
        $medaka1 = new Medaka(
            nickName: 'テストメダカ1',
            breed: new Breed(FishType::MEDAKA, BreedNameType::YOUKIHI),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STARVING,
            birthday: now()
        );
        $medaka2 = new Medaka(
            nickName: 'テストメダカ2',
            breed: new Breed(FishType::MEDAKA, BreedNameType::YOUKIHI),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::LITTLE_HUNGER,
            birthday: now()
        );
        $largeMouseBass = new LargeMouseBass(
            nickName: 'テストブラックバス',
            breed: new Breed(FishType::LARGE_MOUSE_BASS, BreedNameType::YOUKIHI),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );

        $tank = new Tank();
        $tank->addFish($medaka1);
        $tank->addFish($medaka2);
        $tank->addFish($largeMouseBass);
        $this->tankManagerP->load()->willReturn($tank)->shouldBeCalled();
        $this->tankManagerP->save(
            Argument::that(
                function (Tank $tank) {
                    $this->assertCount(1, $tank->getFishList(Medaka::class));
                    $this->assertCount(1, $tank->getFishList(LargeMouseBass::class));

                    $this->assertSame(HungerLevelType::STUFFED, $tank->getFishList()[0]->getHungerLevel());
                    $this->assertSame(HungerLevelType::STUFFED, $tank->getFishList()[1]->getHungerLevel());

                    return $tank;
                }
            )
        )->shouldBeCalled();

        $SUT = $this->getSUT();
        $SUT->up();
    }

    public function getSUT(): FeedingUseCase
    {
        return new FeedingUseCase(
            $this->tankManagerP->reveal(),
        );
    }
}
