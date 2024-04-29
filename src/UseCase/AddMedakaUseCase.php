<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\UseCase;

use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\VO\Variety;

class AddMedakaUseCase
{
    public function __construct(
        private TankManager $tankManager
    ) {
    }

    public function add(): void
    {
        $tank = $this->tankManager->load();
        $tank->addFish(new Medaka('メダカ', new Variety('みゆき'), 'Swim'));
        $this->tankManager->save($tank);
        clearstatcache();
    }
}
