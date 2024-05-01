<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\ConditionLevelType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Enum\HungerLevelType;
use Iamyukihiro\Aquarium\Domain\Logic\Probability;
use Iamyukihiro\Aquarium\Domain\Logic\RandomBassGenerator;
use Iamyukihiro\Aquarium\Domain\Logic\RandomMedakaGenerator;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Bass;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

use function Symfony\Component\Clock\now;

class AddMedakaUseCaseTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy $tankManagerP;
    private ObjectProphecy $randomMedakaGeneratorP;
    private ObjectProphecy $randomBassGeneratorP;
    private ObjectProphecy $probabilityP;

    protected function setUp(): void
    {
        $this->tankManagerP = $this->prophesize(TankManager::class);
        $this->randomMedakaGeneratorP = $this->prophesize(RandomMedakaGenerator::class);
        $this->randomBassGeneratorP = $this->prophesize(RandomBassGenerator::class);
        $this->probabilityP = $this->prophesize(Probability::class);
    }

    public function test(): void
    {
        $this->probabilityP->calc(3)->willReturn(false)->shouldBeCalled();
        $medaka = new Medaka(
            nickName: 'テストメダカ',
            breed: new Breed(FishType::MEDAKA, BreedNameType::YOUKIHI),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );
        $this->randomMedakaGeneratorP->generate()->willReturn($medaka)->shouldBeCalled();

        $tank = new Tank();
        $this->tankManagerP->load()->willReturn($tank)->shouldBeCalled();
        $this->tankManagerP->save(
            Argument::that(
                function (Tank $tank) {
                    $this->assertCount(1, $tank->getFishList());
                    $this->assertSame('テストメダカ', $tank->getFishList()[0]->getNickName());

                    return $tank;
                }
            )
        )->shouldBeCalled();

        $SUT = $this->getSUT();
        $SUT->add();
    }

    public function test_3％の確率でブラックバスが水槽に入ること(): void
    {
        $this->probabilityP->calc(3)->willReturn(true)->shouldBeCalled();
        $largeMouseBass = new Bass(
            nickName: 'テストブラックバス',
            breed: new Breed(FishType::BASS, BreedNameType::LARGE_MOUSE),
            conditionLevel: ConditionLevelType::FINE,
            hungerLevel: HungerLevelType::STUFFED,
            birthday: now()
        );
        $this->randomBassGeneratorP->generate()->willReturn($largeMouseBass)->shouldBeCalled();

        $tank = new Tank();
        $this->tankManagerP->load()->willReturn($tank)->shouldBeCalled();
        $this->tankManagerP->save(
            Argument::that(
                function (Tank $tank) {
                    $this->assertCount(1, $tank->getFishList());
                    $this->assertSame('テストブラックバス', $tank->getFishList()[0]->getNickName());

                    return $tank;
                }
            )
        )->shouldBeCalled();

        $SUT = $this->getSUT();
        $SUT->add();
    }

    public function getSUT(): AddMedakaUseCase
    {
        return new AddMedakaUseCase(
            $this->tankManagerP->reveal(),
            $this->randomMedakaGeneratorP->reveal(),
            $this->randomBassGeneratorP->reveal(),
            $this->probabilityP->reveal(),
        );
    }
}
