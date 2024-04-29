<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Logic\RandomMedakaGenerator;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;

class AddMedakaUseCase
{
    public function __construct(
        private TankManager $tankManager,
        private RandomMedakaGenerator $randomMedakaGenerator,
    ) {
    }

    public function add(): void
    {
        $tank = $this->tankManager->load();
        $tank->addFish($this->randomMedakaGenerator->generate());
        $this->tankManager->save($tank);
    }
}
