<?php

declare(strict_types=1);

use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Service\PsySH\AddMedakaCommand;
use Iamyukihiro\Aquarium\Service\PsySH\InitTankCommand;
use Iamyukihiro\Aquarium\Service\PsySH\ViewTankCommand;
use Iamyukihiro\Aquarium\UseCase\AddMedakaUseCase;

$tankPATH = dirname(__FILE__).'/../../.memory/tank.memory';

$tankManager = new TankManager($tankPATH);
$addMedakaUseCase = new AddMedakaUseCase($tankManager);

return [
    'commands' => [
        new InitTankCommand($tankManager),
        new ViewTankCommand($tankManager),
        new AddMedakaCommand($addMedakaUseCase)
    ],
    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],
    'startupMessage' => '<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>',
];
