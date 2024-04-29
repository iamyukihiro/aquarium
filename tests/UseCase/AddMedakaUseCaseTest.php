<?php

/** @noinspection NonAsciiCharacters */

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Enum\BreedNameType;
use Iamyukihiro\Aquarium\Domain\Enum\FishType;
use Iamyukihiro\Aquarium\Domain\Logic\RandomMedakaGenerator;
use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\Tank;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\ValueObject\Breed;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class AddMedakaUseCaseTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy $tankManagerP;
    private ObjectProphecy $randomMedakaGeneratorP;

    protected function setUp(): void
    {
        $this->tankManagerP = $this->prophesize(TankManager::class);
        $this->randomMedakaGeneratorP = $this->prophesize(RandomMedakaGenerator::class);
    }

    public function test(): void
    {
        $medaka = new Medaka(
            'テストメダカ',
            new Breed(FishType::MEDAKA, BreedNameType::YOUKIHI),
            'Sleeping'
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

    public function getSUT(): AddMedakaUseCase
    {
        return new AddMedakaUseCase(
            $this->tankManagerP->reveal(),
            $this->randomMedakaGeneratorP->reveal(),
        );
    }
}
