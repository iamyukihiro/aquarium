<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Logic\Probability;
use Iamyukihiro\Aquarium\Domain\Logic\RandomLargeMouseBassGenerator;
use Iamyukihiro\Aquarium\Domain\Logic\RandomMedakaGenerator;
use Iamyukihiro\Aquarium\Domain\Model\Fish\AbstractFish;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;

class AddMedakaUseCase
{
    public function __construct(
        private TankManager $tankManager,
        private RandomMedakaGenerator $randomMedakaGenerator,
        private RandomLargeMouseBassGenerator $randomLargeMouseBassGenerator,
        private Probability $probability,
    ) {
    }

    public function add(): void
    {
        $tank = $this->tankManager->load();
        $tank->addFish($this->gachaFish());
        $this->tankManager->save($tank);
    }

    private function gachaFish(): AbstractFish
    {
        if ($this->probability->calc(3)) {
            return $this->randomLargeMouseBassGenerator->generate();
        }

        return $this->randomMedakaGenerator->generate();
    }
}
